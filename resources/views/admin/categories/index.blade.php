@extends('admin.layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading success">
		<strong>Categories</strong>
	</div>
	<div class="panel-body">
		<table id="example" class="table hover table-striped cell-borders" style="width:100%">
		    <thead>
		        <tr>
		            <th>Name</th>
		            <th>Edit</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if($cats->count() > 0)
			    	@foreach($cats as $cat)
			    	<tr>
			            <td>{{ $cat->name }}</td>
			            <td>
			            	<a class="btn btn-xs btn-success" href="{{ route('category.edit', ['id' => $cat->id ]) }}">
			            		Edit
			            	</a>
			            </td>
			            <td>
			            	<a class="btn btn-xs btn-danger" href="{{ route('category.delete', ['id' => $cat->id]) }}">
			            		Delete
			            	</a>
			            </td>
			        </tr>
			        @endforeach
			    @else
			    	<tr>
			    		<th colspan="4" class="text-center">No Categories</th>
			    	</tr>
			    @endif
		    </tbody>
		</table>
	</div>
</div>

@endsection