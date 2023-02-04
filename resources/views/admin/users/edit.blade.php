@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем пользователя</h3>
          @include('admin.errors')
        </div>
        {!! Form::open([
        'route' => ['users.update', $user->id], 'method' => 'put', 'files' => true
        ]) !!}
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Пароль</label>
              <input name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getAvatar()}}" alt="" width="200" class="img-responsive">
              <label for="exampleInputFile">Аватар</label>
              <input name="avatar" type="file" id="exampleInputFile">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('users.index')}}">Назад</a>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {!!Form::close()!!}
    </section>
    <!-- /.content -->
  </div>
@endsection