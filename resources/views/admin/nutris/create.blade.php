@extends('layouts.admin')

@section('title')
    <title>Thêm TP.dinh dưỡng</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        </br>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm thành phần dinh dưỡng mới</h1>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('admin.nutris.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin TP.dinh dưỡng</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên dinh dưỡng</label>
                                    <input type="text" id="inputName" class="form-control" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputDescription">Mô tả</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="desc"></textarea>
                                </div>
                                @if ($errors->has('desc'))
                                    <span class="text-danger">{{ $errors->first('desc') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputStatus">Đơn vị</label>
                                    <select id="inputStatus" class="form-control custom-select" name="unit">
                                        <option selected disabled>Chọn</option>
                                        <option>kcal</option>
                                        <option>g</option>
                                        <option>mg</option>
                                        <option>µg</option>
                                    </select>
                                </div>
                                @if ($errors->has('unit'))
                                    <span class="text-danger">{{ $errors->first('unit') }}</span>
                                @endif
                                <div class="form-group">
                                    <label for="inputName">Mã dinh dưỡng (nếu có)</label>
                                    <input type="text" id="inputName" class="form-control" name="id">
                                </div>
                                @if ($errors->has('id'))
                                    <span class="text-danger">{{ $errors->first('id') }}</span>
                                @endif
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus-circle"></i> Thêm TP.dinh dưỡng
                                </button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
