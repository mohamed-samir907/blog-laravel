@extends('admin.layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!--state overview start-->
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol terques">
              <i class="fa fa-users"></i>
          </div>
          <div class="value">
              <h1 class="count">
				{{ $users->count() }}
              </h1>
              <p>Users</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol yellow">
              <i class="fa fa-user-times"></i>
          </div>
          <div class="value">
              <h1 class="count1">
        {{ $trashedUsers->count() }}
              </h1>
              <p>Trashed Users</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol red">
              <i class="fa fa-newspaper-o"></i>
          </div>
          <div class="value">
              <h1 class="count2">
                  {{ $posts->count() }}
              </h1>
              <p>Posts</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol blue">
              <i class="fa fa-trash"></i>
          </div>
          <div class="value">
              <h1 class=" count3">
                  {{ $trashedPosts->count() }}
              </h1>
              <p>Trashed Posts</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol terques">
              <i class="fa fa-list-alt"></i>
          </div>
          <div class="value">
              <h1 class=" count4">
                  {{ $cats->count() }}
              </h1>
              <p>Categories</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          <div class="symbol yellow">
              <i class="fa fa-tags"></i>
          </div>
          <div class="value">
              <h1 class="count">
                  {{ $tags->count() }}
              </h1>
              <p>Tags</p>
          </div>
      </section>
  </div>
</div>
<!--state overview end-->
@endsection
