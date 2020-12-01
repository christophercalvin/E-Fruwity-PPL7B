<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImageRequest;

use App\Models\DataProduk;
use App\Models\ProductImage;

use Str;
use Auth;
use DB;
use Session;

use App\Authorizable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use Authorizable;
    public function index()
    {
        $this->data['data_produks']=DataProduk::orderBy('id','ASC')->paginate(10);
        
        
        return view('admin.products.index', $this->data);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['product']=null;
        $this->data['productID']=0;
        return view ('Admin.products.form1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $params=$request->except('_token');

        $simpan= false;
        $simpan= DB::Transaction(function() use ($params){

            $product=DataProduk::create($params);

            return true;
        });

        if ($simpan){
            Session::flash('success', 'Berhasil Menyimpan Data Produk!');
        }
        else{
            Session::flash('error', 'Terdapat Kesalahan dalam Menyimpan, Silahkan Coba Lagi!');
        }

        return redirect('admin/products');


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
    public function edit($id)
    {
        if (empty($id)){
            return redirect('admin/products/create');
        }

        $product=DataProduk::findOrFail($id);

        $this->data['product']=$product;
        $this->data['productID'] = $product->id;

        return view('admin.products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
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

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DataProduk::findOrFail($id);

        if($product->delete()){
            Session::flash('BERHASIL!, Produk Berhasil di Hapus!');
            
        }

        return redirect('admin/products');
    }

    public function images($id){
        
        if (empty($id)){
            return redirect('admin/products/create');
        }
        
        $product = DataProduk::findOrFail($id);

        $this->data['productID']=$product->id;
        $this->data['productImages']=$product->productImages;
        return view('admin.products.images', $this->data);
    }

    public function add_image($id){
        if (empty($id)){
            return redirect('admin/products/create');
        }

        $product=DataProduk::findOrFail($id);
        $this->data['productID']=$product->id;
        $this->data['product']=$product;

        return view('admin.products.image_form', $this->data);
    }

    public function upload_image(ProductImageRequest $request, $id)
    {
        $product=DataProduk::findOrFail($id);

        if($request->has('image')){
            $image=$request->file('image');
            $name=$product->slug.'_'.time();
            $fileName=$name.'.'.$image->getClientOriginalExtension();

            $folder='/uploads/images';
            $filePath=$image->storeAs($folder, $fileName, 'public');

            $params=[
                'product_id'=>$product->id,
                'data_produk_id'=>$product->id,
                'path'=>$filePath,
            ];

            if(ProductImage::create($params)){
                Session::flash('success', 'Gambar Berhasil di Upload!');
            }
            else{
                Session::flash('error', 'Maaf Terjadi Gangguan, Silahkan Coba lagi :)');
            }

            return redirect('admin/products/'.$id.'/images');
        }

    }

    public function remove_image($id){
        $image=ProductImage::findOrfail($id);

        if ($image->delete()){
            Session::flash("success","Gambar Berhasil Di Hapus!");
        }

        return redirect('admin/products/'. $image->product->id.'/images');
    }
}
