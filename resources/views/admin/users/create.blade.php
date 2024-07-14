@extends('layouts.admin')

@section('title')
    <title>Thêm người dùng mới</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <br>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin người dùng</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Họ và tên</label>
                                    <input type="text" id="inputName" class="form-control" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input type="email" id="inputName" class="form-control" name="email"
                                        value="{{ old('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Số điện thoại</label>
                                    <input type="text" id="inputName" class="form-control" name="phone"
                                        value="{{ old('phone') }}">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Tuổi</label>
                                    <input type="text" id="inputName" class="form-control" name="age"
                                        value="{{ old('age') }}">
                                </div>
                                @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputStatus">Giới tính</label>
                                    <select id="inputStatus" name="gender" class="form-control custom-select">
                                        <option selected disabled>Chọn giới tinh</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Mật khẩu</label>
                                    <input type="password" id="inputName" class="form-control" name="password"
                                        value="{{ old('password') }}">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                <br>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus-circle"></i> Thêm người dùng
                                </button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
