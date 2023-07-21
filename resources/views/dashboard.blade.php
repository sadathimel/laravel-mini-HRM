@extends('admin.layout')
@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mini-HRM Dashboard</h1>
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
                <h3 class="card-title">ALL DATA</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            {{-- <div class="card-body"> --}}

            <div class="card-body px-4 py-4-5">
                <div class="row">

                    <div class="col-md-4 col-lg-4 col-xl-6">
                        <h6 class="text-muted font-weight-bold"><a href="{{ route('company') }}">Company:</a></h6>
                        <h6 class="font-extrabold mb-0">{{ $companiesCount }}</h6>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <h6 class="text-muted font-weight-bold"><a href="{{ route('employee') }}">Employee:</a></h6>
                        <h6 class="font-extrabold mb-0">{{ $employeesCount }}</h6>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Company and Employee List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Employees</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>

                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->employee_count ?? 0 }} </td>



                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    {{-- </div> --}}
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

    </section>
@endsection
