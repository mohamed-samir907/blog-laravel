@extends('admin.layouts.app')

@section('content')
<div class="row">
  <aside class="profile-nav col-lg-3">
      <section class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="{{ asset($user->profile->avatar) }}" alt="">
              </a>
              <h1>{{ $user->name }}</h1>
              <p>{{ $user->email }}</p>
              <div class="form-group">
              	<input type="submit" data-toggle="modal" data-target="#cahngeAvatar" class="btn btn-block btn-default" value="Change Avatar">
              </div>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active">
              	<a href="{{ route('profile', ['id' => $user->id]) }}">
              		<i class="icon-user"></i> Profile Activity
              	</a>
              </li>
          </ul>
      </section>
  </aside>
  <aside class="profile-info col-lg-9">
      <section class="panel panel-primary">
          <div class="panel-heading">
              <span> Profile Info</span>
          </div>
          <div class="panel-body bio-graph-info">
              <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-2 control-label">About Me</label>
                    <div class="col-lg-10">
                        <textarea name="about" class="form-control" cols="30" rows="10" required="true">{{ $user->profile->about }}</textarea>
                    </div>
                    @if($errors->has('about'))
                      {{ $errors->first('about') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required="true">
                    </div>
                    @if($errors->has('name'))
                      {{ $errors->first('name') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"  required="true">
                    </div>
                    @if($errors->has('email'))
                      {{ $errors->first('email') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>
                    <div class="col-lg-6">
                        <input type="text" name="mobile" class="form-control" value="{{ $user->profile->mobile }}"  required="true">
                        <small>mobile must be such as: <strong>(20) 01012345678</strong></small>
                    </div>
                    @if($errors->has('mobile'))
                      {{ $errors->first('mobile') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Occupation</label>
                    <div class="col-lg-6">
                        <input type="text" name="occupation" class="form-control" value="{{ $user->profile->occupation }}"  required="true">
                    </div>
                    @if($errors->has('occupation'))
                      {{ $errors->first('occupation') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Facebook</label>
                    <div class="col-lg-6">
                        <input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}"  required="true">
                    </div>
                    @if($errors->has('facebook'))
                      {{ $errors->first('facebook') }}
                    @endif
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Linked In</label>
                    <div class="col-lg-6">
                        <input type="text" name="linkedin" class="form-control" value="{{ $user->profile->linkedin }}"  required="true">
                    </div>
                    @if($errors->has('linkedin'))
                      {{ $errors->first('linkedin') }}
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
              </form>
          </div>
      </section>
      <section>
          <div class="panel panel-primary">
              <div class="panel-heading"> Sets New Password & Avatar</div>
              <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.password', ['id' => $user->id]) }}">
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label class="col-lg-2 control-label">Current Password</label>
                          <div class="col-lg-6">
                              <input type="password" name="oldPassword" class="form-control" required="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label">New Password</label>
                          <div class="col-lg-6">
                              <input type="password" name="password" class="form-control" required="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 control-label">Confirm New Password</label>
                          <div class="col-lg-6">
                              <input type="password" name="password_confirm" class="form-control" required="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-info">Save</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </section>
  </aside>
</div>

<!-- Change Avatar Modal -->
<div id="cahngeAvatar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form method="POST" action="{{ route('profile.avatar', ['id' => $user->id]) }}" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="modal-content text-center">
				<div class="modal-header">
					<h1>Change Avatar</h1>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<img src="{{ asset($user->profile->avatar) }}" alt="" />
					</div>
					<label>Change Image</label>
					<input type="file" name="avatar" class="form-control">
					@if($errors->has('avatar'))
						{{ $errors->first('avatar') }}
					@endif
				</div>

				<div class="modal-footer">
					<button class="btn btn-success">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection