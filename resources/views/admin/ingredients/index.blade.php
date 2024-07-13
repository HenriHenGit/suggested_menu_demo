@extends('layouts.admin')

@section('title')
    <title>Quản lý nguyên liệu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bảng nguyên liệu</h3>
                                <a href="{{ route('admin.ingredients.create') }}"
                                    class="btn btn-inline btn-success btn-sm ml-3">Thêm
                                    nguyên
                                    liệu</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6" id="example1_buttons_container">

                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end" id="example1_filter_container">

                                    </div>
                                </div>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">Stt</th>
                                            <th>Tên nguyên liệu</th>
                                            <th>Nhóm nguyên liệu</th>
                                            <th>Trạng thái</th>
                                            <th class="text-right">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ingredients as $index => $ingredient)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $ingredient->name }}</td>
                                                <td>
                                                    @foreach ($categoryIngres as $categoryIngre)
                                                        @if ($categoryIngre->id == $ingredient->category_ingre_id)
                                                            {{ $categoryIngre->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td><span class="badge bg-success">Đã có dinh dưỡng</span></td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.ingredients.show', ['id' => $ingredient->id]) }}">
                                                        <i class="fas fa-folder"></i>
                                                        Xem
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.ingredients.edit', ['id' => $ingredient->id]) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Sửa
                                                    </a>
                                                    {{-- <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.ingredients.delete', ['id' => $ingredient->id]) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Xóa
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
