@extends('admin.layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Category
		</div>
		<div class="panel-body">
			@if($errors->has('empty'))
			<span>{{ $errors->get('empty') }}</span>
			@endif
			<form action="{{ route('category.update', ['id'=>$cat->id]) }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
					<label for="name">Name</label>
					<input type="text" id="name" value="{{ $cat->name }}" name="name" class="form-control">
					@if($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Save Changes
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection