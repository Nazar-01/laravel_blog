@extends('front.layout')

@section('content')
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="leave-comment mr0"><!--leave comment-->

                    <h3 class="text-uppercase">Профиль</h3>
                    <br>
                    <img src="{{$user->getAvatar()}}" alt="" class="profile-image">
                    
                    <form class="form-horizontal contact-form" role="form" method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" required value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                placeholder="Пароль">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="file" type="file" class="form-control" name="avatar">    
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Обновит</button>

                    </form>
                </div><!--end leave comment-->
            </div>
            @include('front.pages.sidebar')
        </div>
    </div>
</div>
<style>
    #file {
        padding: 3px 0;
    }
</style>
@endsection