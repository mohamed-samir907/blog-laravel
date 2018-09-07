@extends('admin.layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading success">
		<strong>Users</strong>
	</div>
	<div class="panel-body">
		<table id="example" class="table hover table-striped cell-borders" style="width:100%">
		    <thead>
		        <tr>
		            <th>Avatar</th>
		            <th>Name</th>
		            <th>Restore</th>
		            <th>Delete</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@if($users->count() > 0)
		    		@foreach($users as $user)
			    	<tr>
			            <td><img src="{{ asset($user->profile->avatar) }}" style="max-height: 50px;"></td>
			            <td>{{ $user->name }}</td>
			            <td>
			            	<a href="{{ route('user.restore', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Restore</a>
			            </td>
			            <td>
			            	<a class="btn btn-xs btn-danger" href="{{ route('user.force', ['id' => $user->id]) }}">
			            		Delete
			            	</a>
			            </td>
			        </tr>
			        @endforeach
			    @else
			    	<tr>
			    		<th colspan="4" class="text-center">No Users</th>
			    	</tr>
			    @endif
		    </tbody>
		</table>
	</div>
</div>

@endsection