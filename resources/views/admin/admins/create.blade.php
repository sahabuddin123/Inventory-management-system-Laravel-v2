@extends('admin.app')
@section('title') Groups @endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    {{$pageTitle}}
    <small>{{$subTitle}}</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$pageTitle}}</li>
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
            <form role="form" action="{{ route('admin.admins.store') }}" method="post">
            @csrf
              <div class="box-body">

                
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" >
                  @error('username') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" >
                  @error('password') {{ $message }} @enderror
                </div>

                <!-- <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div> -->

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" >
                  @error('email') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" placeholder="First name" >
                  @error('firstname') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" placeholder="Last name" >
                  @error('lastname') {{ $message }} @enderror
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="0">
                      Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Admin Image</label>
                  <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                    @error('image') {{ $message }} @enderror
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="" class="btn btn-warning">Back</a>
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
@endpush
