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
            <form role="form" action="{{ route('admin.combination.storeCombination') }}" method="post">
            @csrf
              <div class="box-body">
              <div class="form-group">
                  <label for="user">User</label>
                  <select class="form-control" id="user" name="admin_id">
                    <option value="">Select User</option>
                   @foreach ($admin as  $v) 
                      <option value="{{ $v->id }}">{{ $v->username }}</option>
                    @endforeach 
                  </select>
                </div>
              
              <div class="form-group">
                  <label for="groups">Groups</label>
                  
                  <select class="form-control" id="groups" name="group_id">
                    <option value="">Select Groups</option>
                   @foreach ($groups as  $v) 
                      <option value="{{ $v->id }}">{{ $v->name }}</option>
                    @endforeach 
                  </select>
                </div>
               </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
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
