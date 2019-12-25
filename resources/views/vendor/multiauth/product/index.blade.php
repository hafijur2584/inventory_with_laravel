@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header">
		<strong class="card-title">Product list</strong>
		<a href="{{ route('product.create') }}" class="btn btn-success btn-sm float-right">Add new</a>
	</div>
	<div class="table-stats order-table ov-h">
		<table class="table " id="datatable">
			<thead>
				<tr>
					<th class="serial">#</th>
					<th>ID</th>
					<th>Name</th>
					<th>Code</th>
					<th class="avatar">Avatar</th>
					<th>Category</th>
					<th>Stock</th>

					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse($products as $product)
				<tr>
					<td class="serial">{{ $loop->index+1 }}</td>
					<td>{{$product->id}}</td>
					<td> {{ $product->name }} </td>
					<td> {{ $product->code }} </td>
					<td class="avatar">
						<div class="round-img">
							<a href="#"><img class="rounded-circle" src="{{ URL::to($product->image) }}" alt=""></a>
						</div>
					</td>
					<td> {{ $product->category->name }} </td>
					<td> {{ $product->stock }} </td>
					<td>
						<a href="{{ route('product.show',$product->id) }}" class="btn btn-info btn-sm">view</a>
						<a href="{{ route('product.edit',$product->id) }}" class="btn btn-success btn-sm">edit</a>
						<a href="{{ URL::to('admin/product/delete/'.$product->id) }}" class="btn btn-danger btn-sm" id="delete">delete</a>
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