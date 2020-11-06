@extends('admin.layout')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2> Buat Data Produk Baru</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($product))
                        {!! Form::model($product, ['url' => ['admin/products', $product->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/products']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('NamaProduk', 'Nama Produk') !!}
                            {!! Form::text('NamaProduk', null, ['class' => 'form-control', 'placeholder' => 'Apel Malang']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('StokProduk', 'Stok Produk') !!}
                            {!! Form::number('StokProduk', null, ['class' => 'form-control', 'placeholder' => '12']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('DeskripsiProduk', 'Deskripsi Produk') !!}
                            {!! Form::textarea('DeskripsiProduk', null, ['class' => 'form-control', 'placeholder' => 'Apel Malang panen tgl 5 Nov 2020']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('HargaProduk', 'Harga Produk') !!}
                            {!! Form::number('HargaProduk', null, ['class' => 'form-control', 'placeholder' => '50000']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Tambahkan Produk</button>
                            <a href="{{ url('admin/products') }}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection