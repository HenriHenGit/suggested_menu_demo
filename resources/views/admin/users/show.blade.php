@extends('layouts.admin')

@section('title')
    <title>Chi tiết người dùng</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin người dùng "{{ $user->name }}"</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Tuổi</th>
                                            <th>Giới tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->age }}</td>
                                            <td>{{ $user->gender }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin dinh dưỡng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên dinh dưỡng</th>
                                            <th>Hàm lượng</th>
                                            <th>Đơn vị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userDetails as $index => $userNutri)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @foreach ($nutris as $nutri)
                                                        @if ($nutri->id == $userNutri->nutri_id)
                                                            {{ $nutri->name }}
                                                            @php
                                                                break;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $userNutri->amount }}
                                                </td>
                                                <td><span class="badge bg-info">
                                                        @foreach ($nutris as $nutri)
                                                            @if ($nutri->id == $userNutri->nutri_id)
                                                                {{ $nutri->unit }}
                                                                @php
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $userDetails->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bảng món ăn đề xuất</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
