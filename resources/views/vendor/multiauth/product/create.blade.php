@extends('multiauth::layouts.app') 
@section('content')

<div class="card">
	<div class="card-header"><strong>Product</strong><small> Create</small></div>
	<div class="card-body card-block">
		<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			@include('vendor.multiauth.partials._errors')
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name" class=" form-control-label">Product name</label>
						<input type="text" id="name" name="name" placeholder="product name" class="form-control" value="{{ old('name') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="code" class=" form-control-label">Product code</label>
						<input type="text" id="code" name="code" placeholder="product code" class="form-control" value="{{ old('code') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="buying_price" class=" form-control-label">Buying price</label>
						<input type="number" id="buying_price" name="buying_price" placeholder="buying_price" class="form-control" value="{{ old('buying_price') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="selling_price" class=" form-control-label">Selling price</label>
						<input type="number" id="selling_price" name="selling_price" placeholder="selling_price" class="form-control" value="{{ old('selling_price') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="supplier" class=" form-control-label">Supplier</label>
						<input type="text" id="supplier" name="supplier" placeholder="supplier" class="form-control" value="{{ old('supplier') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="godaun" class=" form-control-label">Godaun</label>
						<input type="text" id="godaun" name="godaun" placeholder="godaun" class="form-control" value="{{ old('godaun') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="buying_date" class=" form-control-label">Buying date</label>
						<input id="cc-exp" name="buying_date" type="tel" class="form-control cc-exp" value="{{ old('buying_date') }}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="DD / MM / YY">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="selling_date" class=" form-control-label">Selling date</label>
						<input id="cc-exp" name="selling_date" type="tel" class="form-control cc-exp" value="{{ old('selling_date') }}" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="DD / MM / YY">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="stock" class=" form-control-label">Stock</label>
						<input type="text" id="stock" name="stock" placeholder="stock" class="form-control" value="{{ old('stock') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="category" class=" form-control-label">Category</label>
						<select name="category_id" id="category" class="form-control-sm form-control">
							<option value="">Please select</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{$category->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="quantity" class=" form-control-label">Quantity</label>
						<input type="number" id="quantity" name="quantity" placeholder="quantity" class="form-control" value="{{ old('quantity') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="discount" class=" form-control-label">Discount</label>
						<input type="number" id="discount" name="discount" placeholder="discount" class="form-control" value="{{ old('discount') }}">
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