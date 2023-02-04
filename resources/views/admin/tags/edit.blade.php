@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Редактируем тег</h3>
        </div>
        {!! Form::open([
        'route' => ['tags.update', $tag->id], 'method' => 'put'
        ]) !!}
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              @include('admin.errors')
              <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$tag->title}}">
              
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('tags.index')}}">Назад</a>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        {!! Form::close() !!}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection