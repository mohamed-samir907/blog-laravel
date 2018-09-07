@extends('admin.layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading success">
		<strong>Tags</strong>
	</div>
	<div class="panel-body">
		<table id="example" class="table hover table-striped cell-borders" style="width:100%">
		    <thead>
		        <tr>
		            <th>Tag Name</th>
		            <th>Edit</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if($tags->count() > 0)
			    	@foreach($tags as $tag)
			    	<tr>
			            <td>{{ $tag->tag }}</td>
			            <td>
			            	<a class="btn btn-xs btn-success" href="{{ route('tag.edit', ['id' => $tag->id ]) }}">
			            		Edit
			            	</a>
			            </td>
			            <td>
			            	<a class="btn btn-xs btn-danger" href="{{ route('tag.delete', ['id' => $tag->id]) }}">
			            		Delete
			            	</a>
			            </td>
			        </tr>
			        @endforeach
			    @else
			    	<tr>
			    		<th colspan="4" class="text-center">No Tags Yet!</th>
			    	</tr>
			    @endif
		    </tbody>
		</table>
	</div>
</div>

@endsection