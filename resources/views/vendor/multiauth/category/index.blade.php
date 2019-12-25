@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header">
		<strong class="card-title">Category list</strong>
		<a href="{{ route('category.create') }}" class="btn btn-success btn-sm float-right">Add new</a>
	</div>
	<div class="table-stats order-table ov-h">
		<table class="table " id="datatable">
			<thead>
				<tr>
					<th class="serial">#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($categories as $category)
				<tr>
					<td class="serial">{{ $loop->index+1 }}</td>
					<td>{{$category->id}}</td>
					<td> {{ $category->name }} </td>>
					<td>
						<a href="{{ route('category.show',$category->id) }}" class="btn btn-info btn-sm">view</a>
						<a href="{{ route('category.edit',$category->id) }}" class="btn btn-success btn-sm">edit</a>
						<a href="{{ URL::to('admin/category/delete/'.$category->id) }}" class="btn btn-danger btn-sm" id="delete">delete</a>
					</td>
				</tr>
				@empty
				<tr>
					no data
				</tr>
				@endforelse
			</tbody>
		</table>
	</div> <!-- /.table-stats -->
</div>

@endsection