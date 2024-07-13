@extends('layouts.admin')

@section('title')
    <title>Quản lý thực đơn</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Điều chỉnh đề xuất thực đơn</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('admin.menus.store') }}" method="POST">
                            @csrf
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('images/img/avatarMale.jpg') }}" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Admin</h3>

                                    <p class="text-muted text-center">Admin SGMENU</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <label>
                                                <input type="radio" class="icheck-primary" name="level" value="1">
                                                <span class="ml-2">Mức độ 1 (chính xác)</span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <label>
                                                <input type="radio" class="icheck-primary" name="level" value="2">
                                                <span class="ml-2">Mức độ 2 (vừa đủ)</span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <label>
                                                <input type="radio" class="icheck-primary" name="level" value="3">
                                                <span class="ml-2">Mức độ 3 (nhiều)</span>
                                            </label>
                                        </li>
                                        @if ($errors->has('level'))
                                            <span class="text-danger">{{ $errors->first('level') }}</span>
                                        @endif

                                    </ul>
                                    <div class="form-group">
                                        <label for="inputName">Số bữa ăn trong 1 ngày</label>
                                        <input type="number" id="inputName" class="form-control" name="meal_per_day"
                                            min="1" max="4">
                                    </div>
                                    @if ($errors->has('meal_per_day'))
                                        <span class="text-danger">{{ $errors->first('meal_per_day') }}</span>
                                    @endif
                                    <button type="submit" class="btn btn-primary btn-block"><b>Đề
                                            xuất</b></button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
