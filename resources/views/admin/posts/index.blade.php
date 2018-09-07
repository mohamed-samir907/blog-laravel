@extends('admin.layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading success">
		<strong>Posts</strong>
	</div>
	<div class="panel-body">
		<table id="example" class="table hover table-striped cell-borders" style="width:100%">
		    <thead>
		        <tr>
		            <th>Image</th>
		            <th>Title</th>
		            <th>Edit</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if($posts->count() > 0)
		    		@foreach($posts as $post)
			    	<tr>
			            <td><img src="{{ asset($post->featured) }}" style="max-height: 50px;"></td>
			            <td>{{ $post->title }}</td>
			            <td>
			            	<a class="btn btn-xs btn-success" href="{{ route('post.edit', ['id' => $post->id ]) }}">
			            		Edit
			            	</a>
			            </td>
			            <td>
			            	<a class="btn btn-xs btn-danger" href="{{ route('post.delete', ['id' => $post->id]) }}">
			            		Delete
			            	</a>
			            </td>
			        </tr>
			        @endforeach
			    @else
			    	<tr>
			    		<th colspan="4" class="text-center">No Posts</th>
			    	</tr>
			    @endif
		    </tbody>
		</table>
	</div>
</div>

@endsection