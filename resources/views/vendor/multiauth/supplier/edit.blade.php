@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header"><strong>Supplier</strong><small> update</small></div>
	<div class="card-body card-block">
		<form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			{{ method_field('PUT') }}
			@include('vendor.multiauth.partials._errors')
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name" class=" form-control-label">Name</label>
						<input type="text" id="name" name="name" placeholder="product name" class="form-control" value="{{ $supplier->name }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email" class=" form-control-label">Email</label>
						<input type="email" id="email" name="email" placeholder="email" class="form-control" value="{{ $supplier->email }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="phone" class=" form-control-label">Phone</label>
						<input type="text" id="phone" name="phone" placeholder="phone" class="form-control" value="{{ $supplier->phone }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="address" class=" form-control-label">Address</label>
						<input type="text" id="address" name="address" placeholder="address" class="form-control" value="{{ $supplier->address }}">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="image" class=" form-control-label">Select Photo</label>
						<input type="file" id="image" name="image" class="form-control-file">
					</div>
				</div>

			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

@endsection