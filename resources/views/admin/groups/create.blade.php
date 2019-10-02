@extends('admin.app')
@section('title') Groups @endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">groups</li>
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

              <h3 class="box-title">Add Group</h3>

            </div>
            <form role="form" action="{{ route('admin.groups.store') }}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Group Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter group name">
                </div>
                <div class="form-group">
                  <label for="slug">Slug Name</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter group slug">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createUser" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteUser" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteGroup" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Brands</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteBrand" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteCategory" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Stores</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createStore" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateStore" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewStore" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteStore" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Attributes</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteAttribute" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteProduct" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="createOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="deleteOrder" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Reports</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewReports" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateCompany" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="viewProfile" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Setting</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permissions[]" id="permission" value="updateSetting" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>
                  
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
    $("#mainGroupNav").addClass('active');
    $("#addGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>
  @endpush
