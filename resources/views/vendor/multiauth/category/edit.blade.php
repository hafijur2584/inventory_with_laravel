@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header"><strong>Category</strong><small> Update</small></div>
	<div class="card-body card-block">
		<form action="{{ route('category.update',$category->id) }}" method="POST">
			@csrf
			{{ method_field('PUT') }}
			@include('vendor.multiauth.partials._errors')
			<div class="form-group">
				<label for="name" class=" form-control-label">Category name</label>
				<input type="text" id="name" name="name" placeholder="Enter your category name" class="form-control" value="{{ $category->name }}">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

@endsection