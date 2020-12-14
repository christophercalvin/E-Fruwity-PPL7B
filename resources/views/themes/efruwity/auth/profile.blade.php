@extends('themes.efruwity.layout')
@section('content')
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpg') }})">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
            <br>
            <br>
            <br>
				<h2>Akun Saya</h2>
                <br>
                <br>
                <br>    
				<ul>
				</ul>
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-9">
					<div class="login">
						<div class="login-form-container">
							<div class="login-form">
									{!! Form::model($user, ['url' => ['profile']]) !!}
									@csrf
									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => true]) !!}
											@error('first_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
											{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'required' => true]) !!}
											@error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::text('address1', null, ['required' => true, 'placeholder' => 'Alamat']) !!}
											@error('address1')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::text('phone', null, ['required' => true, 'placeholder' => 'Phone']) !!}
											@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => true]) !!}
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="button-box">
										<button type="submit" class="default-btn floatright">Simpan</button>
                                        <br>
                                        <br>
                                        <br>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
@endsection