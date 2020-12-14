@extends('admin.layout')

@section('content')
<div class='content'>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class= "card-header card-header-border-botton">
                        <h1>Payment Activity</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>Aktivitas</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($payment as $data)
                                    <tr>
                                        <td>{{ ($data->number) }} dengan metode pembayaran {{ ($data->method) }} sebanyak Rp {{ ($data->amount)}} [STATUS: {{ ($data->status) }}] </td>
                                        <td>
                                        <a href="{{ url('admin/orders/'. $data->id) }}" class="btn btn-warning btn-sm">Lihat Rincian</a>
                                            
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
                </div>
            </div>
        </div>
    </div>
@endsection