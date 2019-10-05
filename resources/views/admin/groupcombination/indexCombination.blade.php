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
        
        <a href="{{ route('admin.combination.combination') }}" class="btn btn-primary">Add Admin</a>
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
                  <th>Group Name</th>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($admin as $admins)
                <tr>
                <td>{{ $admins->id}}</td>
                <td>{{ $admins->listGroups->name }}</td>
                <td>{{ $admins->listUser->username }}</td>
               
               <td>
                    <a href="{{ route('admin.combination.editCombination', $admins->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('admin.combination.deleteCombination', $admins->id) }}" class="btn btn-default"><i class="fa fa-trash"></i></a>
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