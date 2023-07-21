@extends('admin.layout')
@section('title')
Company Create
@endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Company Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Company List</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a class="btn btn-success " href="{{route('company')}}"> Company List</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title"></h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form method="post" enctype="multipart/form-data" action="{{route('company.edit',['company'=>$company->id])}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" name="name" value="{{ empty(old('name')) ? ($errors->has('name') ? '' : $company->name) : old('name') }}" id="name" placeholder="Enter  Name">
                                @error('name')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div>
                          <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ empty(old('email')) ? ($errors->has('email') ? '' : $company->email) : old('email') }}" id="email" placeholder="Enter email">
                            @error('email')
                            <span class="help-block">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                            <label for="logo">Logo</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo" id="logo" value="{{ empty(old('logo')) ? ($errors->has('logo') ? '' : $company->logo) : old('logo') }}">
                                <label class="custom-file-label" for="logo">Choose file</label>
                                @error('logo')
                                <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                          </div>
                
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
     
        
                  </div>
            </div>
            <!-- /.card-body -->
          </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection
@section('script')

<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script>
       $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
@endsection