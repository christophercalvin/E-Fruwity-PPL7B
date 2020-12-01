@extends('admin.layout')

@section('content')
    <div class='content'>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class= "card-header card-header-border-botton">
                        <h1>Data Produk</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Stok</th>
                                <th>Deskripsi Produk</th>
                                <th>Harga Produk</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($data_produks as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->NamaProduk }}</td>
                                        <td>{{ $product->StokProduk }}</td>
                                        <td>{{ $product->DeskripsiProduk }}</td>
                                        <td>{{ $product->HargaProduk }}</td>
                                        <td>
                                        <a href="{{ url('admin/products/'. $product->id .'/edit') }}" class="btn btn-warning btn-sm">Ubah Data</a>
                                            
                                        @can('delete_products')
                                            {!! Form::open(['url' => 'admin/products/'. $product->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            <!--{!! Form::submit('HAPUS', ['class' => 'btn btn-danger btn-sm']) !!}-->
                                            {!! Form::close() !!}
                                        @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"><center>Yahhh, Tidak Ada Data :( </center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $data_produks->links() }}
                    </div>
                    @can('add_products')
                    <div class="card-footer text right">
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary">Tambah Barang Baru</a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>

@endsection