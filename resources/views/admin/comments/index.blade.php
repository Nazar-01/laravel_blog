@extends('admin.layout')

@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Комментарии</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Текст</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>

            @foreach($comments as $comment)

            <tr>
              <td>
                {{$comment->id}}
              </td>
              <td>
                {{$comment->text}}
              </td>
              <td>

                @if($comment->status)
                <a href="{{route('status-toggle', $comment->id)}}" class="fa fa-thumbs-o-up"></a>
                @else
                <a href="{{route('status-toggle', $comment->id)}}" class="fa fa-lock"></a>
                @endif

                {{ Form::open([
                'route' => ['comments.destroy', $comment->id], 'method' => 'delete'
                ]) }}
                <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                  <i class="fa fa-remove"></i>
                </button>
                {{ Form::close() }}
              </td>
            </tr>

            @endforeach
          </tbody>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
</div>
@endsection('content')