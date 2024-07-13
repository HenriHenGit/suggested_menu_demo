@extends('layouts.admin')

@section('title')
    <title>Danh sách món ăn</title>
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
                                <h3 class="card-title">Bảng món ăn</h3>
                                <a href="{{ route('admin.foods.create') }}"
                                    class="btn btn-inline btn-success btn-sm ml-3">Thêm món
                                    ăn</a>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
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
                                            <th style="width: 1%">
                                                Stt
                                            </th>
                                            <th style="width: 20%">
                                                Hình ành
                                            </th>
                                            <th style="width: 20%">
                                                Tên món ăn
                                            </th>
                                            <th style="width: 29%">
                                                Mô tả
                                            </th>
                                            <th style="width: 12%">
                                                Khẩu phần
                                            </th>
                                            <th style="width: 8%" class="text-center">
                                                Trạng thái
                                            </th>
                                            <th style="width: 10%">
                                                Chức năng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($foods as $index => $food)
                                            <tr>
                                                <td>
                                                    {{ $index + 1 }}
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            @php
                                                                $imagePath = public_path('images/foods/' . $food->img);
                                                                $imageUrl = asset('images/foods/' . $food->img);
                                                            @endphp

                                                            @if (file_exists($imagePath))
                                                                <img src="{{ $imageUrl }}" alt="Avatar"
                                                                    class="table-avatar"
                                                                    style="width: 150px; height: 100px;">
                                                            @else
                                                                <img src="{{ $food->img }}" alt="Avatar"
                                                                    class="table-avatar"
                                                                    style="width: 150px; height: 100px;">
                                                            @endif

                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $food->food_name }}
                                                    </a>
                                                    <br />
                                                    <small>
                                                        {{ $food->category_food_id }}
                                                    </small>
                                                </td>
                                                <td style="max-width: 200px;">
                                                    <a class="d-block text-truncate">
                                                        {{ $food->desc }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $food->number_eat }}
                                                    </a>

                                                </td>
                                                <td class="project-state">
                                                    @if ($food->status == 'added ingredient')
                                                        <span class="badge badge-success">Đã thêm nguyên liệu</span>
                                                    @else
                                                        <span class="badge badge-warning">Đang thêm nguyên liệu</span>
                                                    @endif
                                                </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.foods.show', ['id' => $food->id]) }}">
                                                        <i class="fas fa-folder"></i>
                                                        Xem
                                                    </a>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('admin.foods.edit', ['id' => $food->id]) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Sửa
                                                    </a>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.foods.delete', ['id' => $food->id]) }}">
                                                        <i class="fas fa-trash"></i>
                                                        Xóa
                                                    </a>
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
