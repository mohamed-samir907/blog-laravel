@extends('admin.layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      Edit Blog Settings
    </div>
    <div class="panel-body">
      <form action="{{ route('settings.update') }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
          <label for="site_name">Site Name</label>
          <input id="site_name" type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}" required autofocus>
          @if ($errors->has('site_name'))
            <span class="help-block">
              <strong>{{ $errors->first('site_name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
          <label for="contact_number">Contact Number</label>
          <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ $settings->contact_number }}" required>
          @if ($errors->has('contact_number'))
            <span class="help-block">
              <strong>{{ $errors->first('contact_number') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('contact_time') ? ' has-error' : '' }}">
          <label for="contact_time">Time Avilable</label>
          <input id="contact_time" type="text" class="form-control" name="contact_time" value="{{ $settings->contact_time }}" required>
          @if ($errors->has('contact_time'))
            <span class="help-block">
              <strong>{{ $errors->first('contact_time') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
          <label for="contact_email">Contact Email</label>
          <input id="contact_email" type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}" required>
          @if ($errors->has('contact_email'))
            <span class="help-block">
              <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('contact_status') ? ' has-error' : '' }}">
          <label for="contact_status">Contact Status</label>
          <input id="contact_status" type="text" class="form-control" name="contact_status" value="{{ $settings->contact_status }}" required>
          @if ($errors->has('contact_status'))
            <span class="help-block">
              <strong>{{ $errors->first('contact_status') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
          <label for="address">Address</label>
          <input id="address" type="text" class="form-control" name="address" value="{{ $settings->address }}" required>
          @if ($errors->has('address'))
            <span class="help-block">
              <strong>{{ $errors->first('address') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('address_info') ? ' has-error' : '' }}">
          <label for="address_info">Address Info</label>
          <input id="address_info" type="text" class="form-control" name="address_info" value="{{ $settings->address_info }}" required>
          @if ($errors->has('address_info'))
            <span class="help-block">
              <strong>{{ $errors->first('address_info') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('site_info') ? ' has-error' : '' }}">
          <label for="site_info">Site Info</label>
          <textarea id="content" class="form-control" name="site_info" required>{{ $settings->site_info }}</textarea>
          @if ($errors->has('site_info'))
            <span class="help-block">
              <strong>{{ $errors->first('site_info') }}</strong>
            </span>
          @endif
        </div>

        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-info" type="submit">
              Save Changes
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection