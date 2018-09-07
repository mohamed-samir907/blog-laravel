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
          </div>

          <ul class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="{{ route('profile', ['id', $user->id]) }}">
                <i class="icon-user"></i> Profile Activity
              </a>
            </li>
          </ul>

      </section>
  </aside>
  <aside class="profile-info col-lg-9">
      
      <section class="panel">
          <div class="bio-graph-heading">{{ $user->profile->about }}</div>
          <div class="panel-body bio-graph-info">
              <h1>Biography</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>Name </span>: 
                        {{ $user->name }}
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: 
                        {{ $user->email }}
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: 
                        {{ $user->profile->occupation }}
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mobile </span>: 
                        {{ $user->profile->mobile }}
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Facebook </span>: 
                        <a href="{{ $user->profile->facebook }}" target="_blank">
                          <?php $facebook = explode('/', $user->profile->facebook) ?>
                          {{ end($facebook) }}
                        </a>
                      </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Linked In </span>: 
                        <a href="{{ $user->profile->linkedin }}" target="_blank">
                          <?php $linkedin = explode('/', $user->profile->linkedin) ?>
                          {{ end($linkedin) }}
                        </a>
                      </p>
                  </div>
              </div>
          </div>
      </section>
      <section class="panel">
        <div class="panel-body profile-activity">
            <h5 class="pull-right">12 August 2013</h5>
            <div class="activity terques">
                <span>
                    <i class="icon-shopping-cart"></i>
                </span>
                <div class="activity-desk">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="arrow"></div>
                            <i class=" icon-time"></i>
                            <h4>10:45 AM</h4>
                            <p>Purchased new equipments for zonal office setup and stationaries.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="activity alt purple">
                <span>
                    <i class="icon-rocket"></i>
                </span>
                <div class="activity-desk">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="arrow-alt"></div>
                            <i class=" icon-time"></i>
                            <h4>12:30 AM</h4>
                            <p>Lorem ipsum dolor sit amet consiquest dio</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="activity blue">
                <span>
                    <i class="icon-bullhorn"></i>
                </span>
                <div class="activity-desk">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="arrow"></div>
                            <i class=" icon-time"></i>
                            <h4>10:45 AM</h4>
                            <p>Please note which location you will consider, or both. Reporting to the VP <br> of Compliance and CSR, you will be responsible for managing.. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="activity alt green">
                <span>
                    <i class="icon-beer"></i>
                </span>
                <div class="activity-desk">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="arrow-alt"></div>
                            <i class=" icon-time"></i>
                            <h4>12:30 AM</h4>
                            <p>Please note which location you will consider, or both.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
  </aside>
</div>
@endsection