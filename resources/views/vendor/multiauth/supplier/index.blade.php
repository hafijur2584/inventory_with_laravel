@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header">
		<strong class="card-title">Supplier list</strong>
		<a href="{{ route('supplier.create') }}" class="btn btn-success btn-sm float-right">Add new</a>
	</div>
	<div class="table-stats order-table ov-h">
		<table class="table " id="datatable">
			<thead>
				<tr>
					<th class="serial">#</th>
					<th>Name</th>
					<th>Email</th>
					<th class="avatar">Avatar</th>
					<th>Address</th>
					<th>Phone</th>

					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($suppliers as $supplier)
				<tr>
					<td class="serial">{{ $loop->index+1 }}</td>
					<td> {{ $supplier->name }} </td>
					<td> {{ $supplier->email }} </td>
					<td class="avatar">
						<div class="round-img">
							<a href="#"><img class="rounded-circle" src="{{ URL::to($supplier->image) }}" alt=""></a>
						</div>
					</td>
					<td> {{ $supplier->address }} </td>
					<td> {{ $supplier->phone }} </td>
					<td>
						<a href="{{ route('supplier.show',$supplier->id) }}" class="btn btn-info btn-sm">view</a>
						<a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-success btn-sm">edit</a>
						<a href="{{ URL::to('admin/supplier/delete/'.$supplier->id) }}" class="btn btn-danger btn-sm" id="delete">delete</a>
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