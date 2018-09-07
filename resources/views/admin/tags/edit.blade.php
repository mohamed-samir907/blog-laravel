@extends('admin.layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Update the Tag
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.update',['id' => $tag->id]) }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}"> 
					<label for="tag">Tag Name</label>
					<input type="text" id="tag" value="{{ $tag->tag }}" name="tag" class="form-control">
					@if($errors->has('tag'))
					<span class="help-block">
						<strong>{{ $errors->first('tag') }}</strong>
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