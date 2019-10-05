@extends('admin.app')
@section('title') Groups @endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @include('admin.partials.flash')
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $pageTitle }} {{ $admin->username }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-condensed table-hovered">
              <tr>
              <th colspan="2" style="text-align:center"><img class="card-img-top" src="{{ asset('storage/'.$admin->image) }}" alt="Card image cap" style="height:200px;width:200px;border:2px solid #000;border-radius:50%"></th>
              </tr>
                <tr>
                  <th>Username</th>
                  <td>{{ $admin->username }}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{ $admin->email }}</td>
                </tr>
                <tr>
                  <th>First Name</th>
                  <td>{{ $admin->firstname }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ $admin->lastname }}</td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td>{{ ($admin->gender == 1) ? 'Male' : 'Female' }}</td>
                </tr>
                <tr>
                  <th>Group</th>
                  <td><span style="color:#ff0000;font-size:18px;">{{-- $admin->listGroups->name --}}</span></td>
                </tr>
              </table>
              <a href="{{ route('admin.admins.index') }}" class="btn btn-primary" style="width:100%;">Go Back</a>
            </div>
            <!-- /.box-body -->
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
 
