@extends('admin.layouts.layout')

@section('style')
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="roleName" id="roleName" placeholder="Role Name">
                    </div>
                  </div>
                </h3>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>Module</td>
                    <td>Permission</td>
                   
                </tr>
                </thead>
                <tbody>
                @foreach($modules as $module)
                  <tr>
                    <td>{{$module->name}}</td>
                    <td>
                      <div class="form-group">
                        @foreach($module->permissions as $permission)
                          <div class="form-check">
                            <input class="form-check-input" name="permissions[]" value="{{$permission->id}}" type="checkbox">
                            <label class="form-check-label">{{$permission->name}}</label>
                          </div>
                          @endforeach
                        </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="card-footer">
                <button type="submit"  id="createRole" class="btn btn-primary">Submit</button>
              </div>  
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
  $(function(){
    $('#createRole').click(function() {
      const roleName = $("input[name=roleName]").val();
      var val = [];
      $(':checkbox:checked').each(function(i) {
        val[i] = $(this).val();
      });
    });
  });
</script>
@endsection