@extends('themes.efruwity.layout')
@section('content')
   
   <!-- Start Cart  -->
   <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                {!! Form::open(['url' => 'keranjang/update']) !!}
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse (\Cart::getContent() as $item)
				            @php
					             $product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
					             $image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
				            @endphp
                                <tr>
                                    <td class="thumbnail-img">
                                    <a href="{{ url('produk/'. $item->id) }}">
									<img class="img-fluid" src="{{ $image }}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                <a href="{{ url('produk/'. $item->id) }}">
                                    {{ $item->name }}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rp. {{ number_format($item->price) }}</p>
                                    </td>
                                    <td class="quantity-box">
                                        {{-- <input name="" value="{{ $item->quantity }}" type="number" min="1"> --}}
									    {!! Form::number('items['. $item->id .'][quantity]', $item->quantity, ['min' => 1, 'required' => true]) !!}
                                    <td class="total-pr">
                                        <p>Rp. {{ number_format($item->price * $item->quantity)}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{ url('keranjang/remove/'. $item->id)}}">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                @empty
                                    <tr>
											<td colspan="6" style="text-align:center">Keranjang Kosong :( Silahkan Berbelanja <a href="{{ url('produk')}}">disini</a></td>
                                    </tr>
								@endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                         <input class="button" name="update_cart" value="Update cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rp. {{ number_format(\Cart::getSubTotal()) }} </div>
                        </div>
                        <!-- <div class="d-flex"> -->
                            <!-- <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div> -->
                        <!-- <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div> -->
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rp. {{ number_format(\Cart::getTotal()) }} </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{url('orders/checkout') }}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <!-- End Cart -->
@endsection