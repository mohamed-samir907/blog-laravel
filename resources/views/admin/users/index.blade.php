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
		            <th>Permisions</th>
		            <th>Profile</th>
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
			            	@if($user->admin == 1)
			            		<a href="{{ route('user.not_admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove Permisions</a>
			            	@else
			            		<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
			            	@endif
			            </td>
			            <td>
			            	<a class="btn btn-xs btn-info" href="{{ route('profile', ['id' => $user->id]) }}">
			            		Profile
			            	</a>
			            </td>
			            <td>
			            	@if (Auth()->id() !== $user->id)
			            	<a class="btn btn-xs btn-danger" href="{{ route('user.delete', ['id' => $user->id]) }}">
			            		Delete
			            	</a>
			            	@endif
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