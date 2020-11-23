<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataProduk;

use Str;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['q']=null;

        $this->data['minPrice']=DataProduk::min('HargaProduk');
        $this->data['maxPrice']=DataProduk::max('HargaProduk');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products =DataProduk::active();


        if($q = $request->query('q')){
            $q=str_replace('-', ' ',Str::slug($q));

            $products=$products->whereRaw("MATCH(NamaProduk, DeskripsiProduk)AGAINST(? IN NATURAL LANGUAGE MODE)", [$q]);

            $this->data['q'];
        }

        $this->data['data_produks']=$products->paginate(9);

        return $this->load_theme('produk.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @param string $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product=DataProduk::active()->where('id', $id)->first();

        if(!$product){
            return redirect('produk');
        }

        $this->data['produk']=$product;

        return $this->load_theme('produk.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}