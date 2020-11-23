@extends('admin.layout')

@section('content')
    <div class='content'>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class= "card-header card-header-border-botton">
                        <h1>Data Order</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>Invoice Number</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Jasa Kirim</th>
                                <th>Harga Seluruhnya</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($order as $data)
                                    <tr>
                                        <td>{{ $data->code }}</td>
                                        <td>{{ $data->customer_first_name }} {{ $data->customer_last_name }}</td>
                                        <td>{{ $data->customer_email }}</td>
                                        <td>{{ $data->shipping_service_name }}</td>
                                        <td>Rp. {{ ($data->grand_total) }} </td>
                                        <td>
                                        <a href="{{ url('admin/orders/'. $data->id .'/edit') }}" class="btn btn-warning btn-sm">Lihat Rincian</a>
                                            
                                            {!! Form::open(['url' => 'admin/orders/'. $data->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            <!--{!! Form::submit('HAPUS', ['class' => 'btn btn-danger btn-sm']) !!}-->
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7"><center>Yahhh, Tidak Ada Data :( </center></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text right">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection