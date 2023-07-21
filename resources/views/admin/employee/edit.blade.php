@extends('admin.layout')
@section('title')
    Employee Edit
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Edit</h1>
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
                <h3 class="card-title">Employee Edit</h3>

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
                            <a class="btn btn-success " href="{{ route('employee') }}">Employee List</a>
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
                                <form method="post" enctype="multipart/form-data" action="{{ route('employee.edit',['employee'=>$employee->id]) }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
                                            <label>Company Name <span style="color: red;">*</span> </label>
                                            <select class="form-control select2" name="company_id" id="company_id"
                                                style="width: 100%;">
                                                <option value="">Select Client</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" {{ empty(old('company_id')) ? ($errors->has('company_id') ? '' : ($employee->company_id == $company->id ? 'selected' : '')) :
                                                      (old('company_id') == $company->id ? 'selected' : '') }}>{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_id')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                            <label>First Name <span style="color: red;">*</span> </label>

                                            <input type="text" class="form-control" name="first_name"
                                            value="{{ empty(old('first_name')) ? ($errors->has('first_name') ? '' : $employee->first_name) : old('first_name') }}" id="first_name"
                                                placeholder="Enter First Name">
                                            @error('first_name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                            <label>Last Name <span style="color: red;">*</span> </label>

                                            <input type="text" class="form-control" name="last_name"
                                            value="{{ empty(old('last_name')) ? ($errors->has('last_name') ? '' : $employee->last_name) : old('last_name') }}" id="last_name" placeholder="Enter Last Name">
                                            @error('last_name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                      
                                 
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email"
                                            value="{{ empty(old('email')) ? ($errors->has('email') ? '' : $employee->email) : old('email') }}" id="email" placeholder="Enter email">
                                            @error('email')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                            <label for="phone">Phone</label>
                                            <input type="phone" class="form-control" name="phone"
                                            value="{{ empty(old('phone')) ? ($errors->has('phone') ? '' : $employee->phone) : old('phone') }}" id="phone" placeholder="Enter phone">
                                            @error('phone')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
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

