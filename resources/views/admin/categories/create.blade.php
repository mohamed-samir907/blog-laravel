@extends('admin.layouts.app')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Create New Category
		</div>
		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
					<label for="name">Name</label>
					<input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control">
					@if($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Add Category
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection