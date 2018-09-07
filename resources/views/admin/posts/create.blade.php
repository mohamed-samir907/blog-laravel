@extends('admin.layouts.app')

@section('style')

@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Create New Post
		</div>
		<div class="panel-body">
			<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"> 
					<label for="title">Title</label>
					<input type="text" id="title" value="{{ old('title') }}" name="title" class="form-control" required="true">
					@if($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('file')?' has-error':'' }}">
					<label for="file">Featured Image</label>
					<input type="file" id="file" value="{{ old('file') }}" name="file" class="form-control" required="true">
					@if($errors->has('file'))
					<span class="help-block">
						<strong>{{ $errors->first('file') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('category_id')?' has-error':'' }}">
					<label for="category_id">Select Category</label>
					<select name="category_id" class="form-control" id="category_id">
						@foreach($cats as $cat)
						<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>
					@if($errors->has('category_id'))
					<span class="help-block">
						<strong>{{ $errors->first('category_id') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('tags')?' has-error':'' }}">
					<label for="tags">Select Tags</label>
					@foreach($tags as $tag)
					<div class="checkbox">
						<label><input value="{{ $tag->id }}" type="checkbox" name="tags[]">{{ $tag->tag }}</label>
					</div>
					@endforeach
					@if($errors->has('tags'))
					<span class="help-block">
						<strong>{{ $errors->first('tags') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('content')?' has-error':'' }}">
					<label for="content">Content</label>
					<textarea id="content" name="content" class="form-control" rows="6" required="true">{{ old('content') }}</textarea>
					@if($errors->has('content'))
					<span class="help-block">
						<strong>{{ $errors->first('content') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Add Post
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection