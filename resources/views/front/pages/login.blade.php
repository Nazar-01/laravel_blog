@extends('front.layout')

@section('content')
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<div class="leave-comment mr0"><!--leave comment-->

					<h3 class="text-uppercase">Вход</h3>
					@include('admin.errors')
					<br>
					<form class="form-horizontal contact-form" role="form" method="post" action="{{route('login')}}">
						{{csrf_field()}}
						<div class="form-group">
							<div class="col-md-12">
								<!-- <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}"> -->
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="super@admin.mail">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<input type="password" type="text" class="form-control" id="password" name="password"
								placeholder="Пароль" value="admin">
							</div>
						</div>
						<button type="submit" class="btn send-btn">Войти</button>

					</form>
				</div><!--end leave comment-->
			</div>
			@include('front.pages.sidebar')
		</div>
	</div>
</div>
@endsection