@extends('front.layout')

@section('content')
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<div class="leave-comment mr0"><!--leave comment-->

					<h3 class="text-uppercase">Регистрация</h3>
					<br>
					<form class="form-horizontal contact-form" role="form" method="post" action="{{route('register')}}">
						{{csrf_field()}}
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" class="form-control" id="name" name="name"
								placeholder="Имя" value="{{old('name')}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<input type="email" class="form-control" id="email" name="email"
								placeholder="Email" value="{{old('email')}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" class="form-control" id="password" name="password"
								placeholder="Пароль">
							</div>
						</div>
						<button type="submit" name="submit" class="btn send-btn">Register</button>

					</form>
				</div><!--end leave comment-->
			</div>
			@include('front.pages.sidebar')
		</div>
	</div>
</div>
@endsection