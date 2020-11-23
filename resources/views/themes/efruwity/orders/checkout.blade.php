@extends('themes.efruwity.layout')


@section ("content")


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/produk') }}">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
        {!! Form::model($user, ['url' => 'orders/checkout']) !!}
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name *</label>
                                    <br>
                                    {!! Form::text('first_name', null, ['required' => true]) !!}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name *</label>
                                    <br>
                                    {!! Form::text('last_name', null, ['required' => true]) !!}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <br>
                                {!! Form::text('email', null, ['required' => true]) !!}
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <br>
                                {!! Form::text('address1', null, ['required' => true, 'placeholder' => 'Home number and street name']) !!}
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2 *</label>
                                <br>
                                {!! Form::text('address2', null, ['placeholder' => 'Apartment, suite, unit etc. (optional)']) !!}
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Provinsi *</label>
                                    {!! Form::select('province_id', $provinces, Auth::user()->province_id, ['id' => 'province-id', 'placeholder' => '- Please Select - ', 'required' => true]) !!}
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">Kota/Kabupaten *</label>
                                    {!! Form::select('city_id', $cities, null, ['id' => 'city-id', 'placeholder' => '- Please Select -', 'required' => true])!!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="zip">Kode Pos *</label>
                                    {!! Form::number('postcode', null, ['required' => true, 'placeholder' => 'Postcode']) !!}
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone">Nomor Telepon *</label>
                                    {!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Phone']) !!}
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="note">Catatan Pembeli Untuk Penjual (Opsional)</label>
                                <br>
                                {!! Form::textarea('note', null, ['cols' => 30, 'rows' => 10,'placeholder' => 'Notes about your order, e.g. special notes for delivery.']) !!}
                            </div>
                            <hr class="mb-4">
                            <hr class="mb-4">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Jasa Kirim</h3>
                                </div>
                                <div class="mb-4">
                                <tr class="cart-subtotal">
										<th>Total Berat Keranjang ({{ $totalWeight }} kg)</th>
                                        <td><select class="wide w-100" id="shipping-cost-option" required name="shipping_service" required></select></td>
									</tr>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                @forelse (\Cart::getContent() as $item)
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> {{ $item->name }}</a>
                                            <div class="small text-muted">Price: Rp. {{ number_format($item->price) }}<span class="mx-2">|</span> Qty: {{ $item->quantity }}<span class="mx-2">|</span> Subtotal:Rp. {{ number_format($item->price * $item->quantity)}}</div>
                                        </div>
                                    </div>
                                </div>
                                @empty
									<h4>Keranjang Kosong :( Silahkan Berbelanja <a href="{{ url('produk')}}">disini</a></h4>
								@endforelse
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> {{ number_format(\Cart::getSubTotal()) }}</div>
                                </div>
                                <div class="d-flex">
                                    <h4>PPN 10%</h4>
                                    <div class="ml-auto font-weight-bold"> {{ number_format(\Cart::getCondition('TAX 10%')->getCalculatedValue(\Cart::getSubTotal())) }}</div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> {{ number_format(\Cart::getTotal()) }}</div>
                                </div>
                                <hr> </div>
                        </div>
                        <input type="submit" value="Buat Order Sekarang!" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


@endsection