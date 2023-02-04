@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      {{Form::open([
      'route' => ['subscribers.update', $sub->id],
      'method' => 'put'
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем подписчика</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{$sub->email}}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('subscribers.index')}}">Назад</a>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      {{Form::close()}}

    </section>
    <!-- /.content -->
  </div>
@endsection