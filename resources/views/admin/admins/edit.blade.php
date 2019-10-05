@extends('admin.app')
@section('title') Groups @endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
        @include('admin.partials.flash')

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$pageTitle}}</h3>
            </div>
            <form role="form" action="{{ route('admin.admins.update') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username', $admin->username) }}" autocomplete="off">
                  <input type="hidden" name="id" value="{{ $admin->id }}">
                  @error('username') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email', $admin->email) }}" autocomplete="off">
                  @error('email') {{ $message }} @enderror
                </div>                

                <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="First name" value="{{ old('firstname', $admin->firstname) }}" autocomplete="off">
                  @error('firstname') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="lastname">Last name</label>
                  <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Last name" value="{{ old('lastname', $admin->lastname) }}" autocomplete="off">
                  @error('lastname') {{ $message }} @enderror
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1" <?php if($admin->gender == 1) {
                        echo "checked";
                      } ?>>
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2"<?php if($admin->gender == 2) {
                        echo "checked";
                      } ?>>
                      Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($admin->image != null)
                                <figure class="mt-2" style="width: 80px; height: 150px;">
                                    <img src="{{ asset('storage/'.$admin->image) }}" id="adminImage" class="img-fluid" alt="img" style="width:120px;height:150px;">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Admin Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                  </div>
                <!-- <div class="form-group">
                  <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Leave the password field empty if you don't want to change.
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password"  autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div> -->

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.admins.index') }}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
$('#groupTable').DataTable();
$("#mainGroupNav").addClass('active');
$("#manageGroupNav").addClass('active');
});
</script>
