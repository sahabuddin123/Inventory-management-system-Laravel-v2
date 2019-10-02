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
        
        <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">Add Group</a>
        <br /> <br />
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{$pageTitle}}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="groupTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>#</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Image</th>
                  <th>Action</th>
      
                </tr>
              </thead>
              <tbody>
              @foreach($admin as $admins)
                <tr>
                <td>{{$admins->id}}</td>
                <td>{{$admins->username}}</td>
                <td>{{$admins->email}}</td>
                <td>{{$admins->firstname}} {{$admins->lastname}}</td>
                
                <td>@if ($admins->gender == 1)
                    <span class="badge badge-success">Male</span>
                    @else
                    <span class="badge badge-success">Female</span>
                    @endif
                </td>
                <td><img src="{{$admins->picture}}" alt="img"></td>

                <td>
                    <a href="{{ route('admin.admins.edit', $admins->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('admin.admins.delete', $admins->id) }}" class="btn btn-default"><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
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