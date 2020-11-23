<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use\App\Models\DataProduk;

class KeranjangController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=\Cart::getContent();

        $this->data['items']=$items;

        return $this->load_theme('keranjang.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    {
		$params = $request->except('_token');
		
		$product = DataProduk::findOrFail($params['id']);
		$slug = $product->id;

        $item=[
            'id'=>($product->id),
            'name'=>($product->NamaProduk),
            'price'=>($product->HargaProduk),
            'quantity'=>$params['qty'],
            'associatedModel' => $product,


        ];
        \Cart::add($item);

        \Session::flash('success', 'Product'.$item['name'].'telah ditambahkan ke keranjang');
        return redirect ('/produk/'. $slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    public function update(Request $request)
	{
		$params = $request->except('_token');

		if ($items = $params['items']) {
			foreach ($items as $cartID => $item) {
				\Cart::update($cartID, [
					'quantity' => [
						'relative' => false,
						'value' => $item['quantity'],
					],
				]);
			}

			\Session::flash('success', 'Keranjang Berhasil di update');
			return redirect('keranjang');
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
	{
		\Cart::remove($id);

		return redirect('keranjang');
	}
}
