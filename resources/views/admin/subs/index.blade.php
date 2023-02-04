@extends('admin.layout')

@section('content')
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Подписчики</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="form-group">
					<a href="{{route('subscribers.create')}}" class="btn btn-success">Добавить</a>
				</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Email</th>
							<th>Действия</th>
						</tr>
					</thead>
					<tbody>

						@foreach($subs as $sub)

						<tr>
							<td>{{$sub->id}}</td>
							<td>
								{{$sub->email}}
							</td>
							<td>
								<a href="{{route('subscribers.edit', $sub->id)}}" class="fa fa-pencil"></a>

								{!! Form::open([
									'route' => ['subscribers.destroy',
									$sub->id],
									'method' => 'delete'
								]) !!}
								<button onclick="return confirm('are you sure?')" type="submit" class="delete">
									<i class="fa fa-remove"></i>
								</button>
								{!! Form::close() !!}
							</td>
						</tr>

						@endforeach

					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
@endsection