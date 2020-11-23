@extends('admin.layout')


@section('content')

   <!-- Start Cart  -->
<div class="container">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('admin.partials.flash', ['$errors' => $errors])
                    <br>
                    <br>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Phone: {{ $order->customer_phone }}
								<br> Postcode: {{ $order->customer_postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
							<address>
								{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
								<br> {{ $order->shipment->address1 }}
								<br> {{ $order->shipment->address2 }}
								<br> Email: {{ $order->shipment->email }}
								<br> Phone: {{ $order->shipment->phone }}
								<br> Postcode: {{ $order->shipment->postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ ($order->order_date) }}
								<br> Shipped by: {{ $order->shipping_service_name }}
							</address>
						</div>
                    </div>
                </div>


   <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                {!! Form::open(['url' => 'keranjang/update']) !!}
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th>ID Produk</th>
									<th>Nama Barang</th>
									<th>Quantity (Kg)</th>
									<th>Harga per Kg</th>
									<th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->qty }}</td>
										<td>{{ ($item->base_total) }}</td>
										<td>{{ ($item->sub_total) }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Order item not found!</td>
									</tr>
								@endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <br>
                        <br>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rp. {{ ($order->base_total_price) }} </div>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex">
                            <h4>PPN 10%</h4>
                            <div class="ml-auto font-weight-bold">Rp. {{ ($order->tax_amount) }} </div>
                        </div>
                        <br>
                        <br>
                        <div class="d-flex">
                            <h4>Ongkos Kirim</h4>
                            <div class="ml-auto font-weight-bold">Rp. {{ ($order->shipping_cost) }} </div>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rp. {{ ($order->grand_total) }} </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="form-group">
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <a href="{{ url('admin/orders') }}" class="btn btn-secondary btn-default">Kembali</a>
                            <!-- <button type="submit" class="btn btn-danger btn-default">Batalkan Pesanan</button> -->
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection