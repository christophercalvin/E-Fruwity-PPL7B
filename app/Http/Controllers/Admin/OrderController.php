<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Helpers\General;
use App\Models\DataProduk;
use App\Models\Payment;

use App\Authorizable;
use Session;
use DB;

class OrderController extends Controller
{
	use Authorizable;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->data['currentAdminMenu'] = 'order';
		$this->data['currentAdminSubMenu'] = 'order';
		$this->data['statuses'] = Order::STATUSES;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request request params
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $this->data['order'] = Order::where('payment_status', 'unpaid')->get();
        


		return view('admin.orders.index', $this->data);
    }

    public function sudahbayar()
    {
        $this->data['order'] = Order::where('payment_status', 'paid')->get();


		return view('admin.orders.processing', $this->data); 
    }

    public function edit($id)
    {

        $orders=Order::findOrFail($id);

        $this->data['order']=$orders;
        $this->data['orderID'] = $orders->id;

        return view('admin.orders.edit', $this->data);
    }

    public function store (Request $request)
    {
        $params=$request->except('_token');

        $simpan= false;
        $simpan= DB::Transaction(function() use ($params){

            $product=Order::create($params);

            return true;
        });
    }

	/**
	 * Display the trashed orders.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function trashed()
	{
		$this->data['orders'] = Order::onlyTrashed()->orderBy('created_at', 'DESC')->paginate(10);

		return view('admin.orders.trashed', $this->data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

		$this->data['order'] = $order;

		return view('admin.orders.show', $this->data);
	}

	/**
	 * Display cancel order form
	 *
	 * @param int $id order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function cancel($id)
	{
		$order = Order::where('id', $id)
			->whereIn('status', [Order::CREATED, Order::CONFIRMED])
			->firstOrFail();

		$this->data['order'] = $order;

		return view('admin.orders.cancel', $this->data);
	}

	/**
	 * Doing the cancel process
	 *
	 * @param Request $request request params
	 * @param int     $id      order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function doCancel(Request $request, $id)
	{
		$request->validate(
			[
				'cancellation_note' => 'required|max:255',
			]
		);

		$order = Order::findOrFail($id);
		
		$cancelOrder = \DB::transaction(
			function () use ($order, $request) {
				$params = [
					'status' => Order::CANCELLED,
					'cancelled_by' => \Auth::user()->id,
					'cancelled_at' => now(),
					'cancellation_note' => $request->input('cancellation_note'),
				];

				if ($cancelOrder = $order->update($params) && $order->orderItems->count() > 0) {
					foreach ($order->orderItems as $item) {
						ProductInventory::increaseStock($item->product_id, $item->qty);
					}
				}
				
				return $cancelOrder;
			}
		);

		\Session::flash('success', 'The order has been cancelled');

		return redirect('admin/orders');
	}

	/**
	 * Marking order as completed
	 *
	 * @param Request $request request params
	 * @param int     $id      order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function doComplete(Request $request, $id)
	{
		$order = Order::findOrFail($id);
		
		if (!$order->isDelivered()) {
			\Session::flash('error', 'Mark as complete the order can be done if the latest status is delivered');
			return redirect('admin/orders');
		}

		$order->status = Order::COMPLETED;
		$order->approved_by = \Auth::user()->id;
		$order->approved_at = now();
		
		if ($order->save()) {
			\Session::flash('success', 'The order has been marked as completed!');
			return redirect('admin/orders');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$order = Order::withTrashed()->findOrFail($id);

		if ($order->trashed()) {
			$canDestroy = \DB::transaction(
				function () use ($order) {
					OrderItem::where('order_id', $order->id)->delete();
					$order->shipment->delete();
					$order->forceDelete();

					return true;
				}
			);

			if ($canDestroy) {
				\Session::flash('success', 'The order has been removed permanently');
			} else {
				\Session::flash('success', 'The order could not be removed permanently');
			}

			return redirect('admin/orders/trashed');
		} else {
			$canDestroy = \DB::transaction(
				function () use ($order) {
					if (!$order->isCancelled()) {
						foreach ($order->orderItems as $item) {
							ProductInventory::increaseStock($item->product_id, $item->qty);
						}
					};

					$order->delete();

					return true;
				}
			);
			
			if ($canDestroy) {
				\Session::flash('success', 'The order has been removed');
			} else {
				\Session::flash('success', 'The order could not be removed');
			}

			return redirect('admin/orders');
		}
	}

	/**
	 * Restoring the soft deleted order
	 *
	 * @param int $id order ID
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function restore($id)
	{
		$order = Order::onlyTrashed()->findOrFail($id);

		$canRestore = \DB::transaction(
			function () use ($order) {
				$isOutOfStock = false;
				if (!$order->isCancelled()) {
					foreach ($order->orderItems as $item) {
						try {
							ProductInventory::reduceStock($item->product_id, $item->qty);
						} catch (OutOfStockException $e) {
							$isOutOfStock = true;
							\Session::flash('error', $e->getMessage());
						}
					}
				};

				if ($isOutOfStock) {
					return false;
				} else {
					return $order->restore();
				}
			}
		);

		if ($canRestore) {
			\Session::flash('success', 'The order has been restored');
			return redirect('admin/orders');
		} else {
			if (!\Session::has('error')) {
				\Session::flash('error', 'The order could not be restored');
			}
			return redirect('admin/orders/trashed');
		}
	}
}
