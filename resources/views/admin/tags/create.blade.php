@extends('admin.layouts.app')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Create New Tag
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.store') }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}"> 
					<label for="tag">Tag Name</label>
					<input type="text" id="tag" value="{{ old('tag') }}" name="tag" class="form-control" autofocus>
					@if($errors->has('tag'))
					<span class="help-block">
						<strong>{{ $errors->first('tag') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Add Tag
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection