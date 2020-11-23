<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipment;
use App\Helpers\General;
use App\Models\DataProduk;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['order'] = Order::orderBy('id','ASC')->paginate(50);


		return view('admin.orders.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($orderId)
    {
        $this->data['order'] = Order::where('id', $orderId)
        ->firstOrFail();

        return view('admin.orders.show', $this->data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params=$request->except('_token');

        $product=DataProduk::findOrFail($id);

        $simpan=false;
        $simpan=DB::transaction(function() use ($product, $params){
            $product->update($params);

        
            return true;
        });

        if ($simpan){
            Session::flash('success', 'Berhasil Mengubah Data Produk!');
        }
        else{
            Session::flash('error', 'Terdapat Kesalahan dalam Mengubah Data Produk, Silahkan Coba Lagi!');
        }

        return redirect('admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
