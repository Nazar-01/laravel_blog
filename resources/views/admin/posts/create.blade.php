@extends('admin.layout')

@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

   {!! Form::open([
   'route' => 'posts.store',
   'files' => true
   ]) !!}

   <!-- Default box -->
   <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Добавляем пост</h3>
      @include('admin.errors')
    </div>
    <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputEmail1">Название</label>
          <input name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('totle')}}">
        </div>
        
        <div class="form-group">
          <label for="exampleInputFile">Лицевая картинка</label>
          <input name="image" type="file" id="exampleInputFile">

        </div>
        <div class="form-group">
          <label>Категория</label>
          {{Form::select(
          'category_id',
          $categories,
          null,
          ['class' => 'form-control select2']
          )}}
        </div>
        <div class="form-group">
          <label>Теги</label>

          {{Form::select(
          'tags[]',
          $tags,
          null,
          [
          'class' => 'form-control select2',
          'multiple' => 'multiple',
          'data-placeholder' => 'Выберите теги',
          'style' => 'width: 100%;',
          ]
          )}}
          
        </div>
        <!-- Date -->
        <div class="form-group">
          <label>Дата:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="date" name="date" type="text" class="form-control pull-right" id="datepicker" value="{{old('date')}}">
          </div>
          <!-- /.input group -->
        </div>

        <!-- checkbox -->
        <div class="form-group">
          <label>
            <input name="is_featured" type="checkbox" class="minimal">
          </label>
          <label>
            Рекомендовать
          </label>
        </div>

        <!-- checkbox -->
        <div class="form-group">
          <label>
            <input name="status" type="checkbox" class="minimal">
          </label>
          <label>
            Черновик
          </label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Описание</label>
          <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Полный текст</label>
          <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button class="btn btn-default">Назад</button>
      <button class="btn btn-success pull-right">Добавить</button>
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

  {!! Form::close() !!}

</section>
<!-- /.content -->
</div>
@endsection