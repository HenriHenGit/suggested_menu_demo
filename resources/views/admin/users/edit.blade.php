@extends('layouts.admin')

@section('title')
    <title>Cập nhật người dùng</title>
@endsection

@section('css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection


@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
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
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Cập nhật
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h3 class="card-title">Thông tin người dùng "{{ $user->name }}"</h3> --}}
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
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" id="inputPhone" class="form-control"
                                                            name="phone" placeholder="Số điện thoại"
                                                            value="{{ old('phone', $user->phone) }}">
                                                    </div>
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input min="1" type="number" id="inputAge"
                                                            class="form-control" name="age"
                                                            value="{{ old('age', $user->age) }}">
                                                    </div>
                                                    @if ($errors->has('age'))
                                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <select id="inputGender" name="gender"
                                                            class="form-control custom-select">
                                                            <option value="{{ $user->gender }}" selected>
                                                                @if ($user->gender)
                                                                    Nam
                                                                @else
                                                                    Nữ
                                                                @endif
                                                            </option>
                                                            <option value="1">Nam</option>
                                                            <option value="0">Nữ</option>
                                                        </select>
                                                        @if ($errors->has('gender'))
                                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </form>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin dinh dưỡng <small class="badge bg-warning">tự cập
                                        nhật</small></h3>
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
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">Stt</th>
                                            <th style="width: 20%">Hình ảnh</th>
                                            <th style="width: 20%">Tên món ăn</th>
                                            <th style="width: 12%">Khẩu phần</th>
                                            <th style="width: 8%" class="text-center">Trạng thái</th>
                                            <th style="width: 10%">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($foods as $index => $food)
                                            @php
                                                $menu = $menus->firstWhere('food_id', $food->id);
                                                $rowClass = $menu && !$menu->status ? 'table-danger' : '';
                                            @endphp

                                            <tr class="{{ $rowClass }}">
                                                <td>{{ $index + 1 }}</td>
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
                                                    <a>{{ $food->food_name }}</a>
                                                    <br />
                                                    <small>{{ $food->category_food_id }}</small>
                                                </td>
                                                <td>
                                                    <a>{{ $food->number_eat }}</a>
                                                </td>
                                                <td class="project-state">
                                                    @if ($food->status == 'added ingredient')
                                                        <span class="badge badge-success">Đã thêm nguyên liệu</span>
                                                    @else
                                                        <span class="badge badge-warning">Đang thêm nguyên liệu</span>
                                                    @endif
                                                </td>
                                                <td class="project-actions text-right">
                                                    @if ($menu && !$menu->status)
                                                        <a class="btn btn-warning btn-sm add-food-button" href="#addFood"
                                                            data-food-id="{{ $food->id }}">
                                                            <i class="fas fa-plus"></i> Thêm
                                                        </a>
                                                    @else
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('admin.users.deleteFood', ['foodId' => $food->id, 'userId' => $user->id]) }}">
                                                            <i class="fas fa-trash"></i> Xóa
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{ $foods->links() }}
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" id="addFood">
                                <h3 class="card-title">Bảng thêm món ăn vào đề xuất</h3>
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
                                    {{-- <div class="col-md-6" id="example1_buttons_container">

                                    </div> --}}
                                    <div class="col-md-6" id="example1_filter_container">

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
                                        @foreach ($foodAll as $index => $food)
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
                                                    <a class="btn btn-warning btn-sm get-food-user" href="#"
                                                        data-new-id="{{ $food->id }}"
                                                        data-user-id="{{ $user->id }}">
                                                        <i class="fas fa-plus"></i>
                                                        Thêm
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
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.add-food-button', function(event) {
            event.preventDefault();

            var foodId = $(this).data('food-id');

            $(document).on('click', '.get-food-user', function(event) {
                event.preventDefault();

                var userId = $(this).data('user-id');

                var newId = $(this).data('new-id');
                window.location.href =
                    "{{ route('admin.users.addFood', ['foodId' => ':foodId', 'userId' => ':userId', 'newFood' => ':newFoodId']) }}"
                    .replace(':foodId', foodId)
                    .replace(':userId', userId)
                    .replace(':newFoodId', newId);

            });
        });


        $(document).on('click', '.add-food-button', function(event) {
            event.preventDefault();

            // Loại bỏ lớp btn-success (nếu có) từ tất cả các nút và thêm lại lớp btn-warning
            $('.add-food-button').removeClass('btn-success').addClass('btn-warning');

            // Thêm lớp btn-success cho nút được nhấn
            $(this).removeClass('btn-warning').addClass('btn-success');
        });
    </script>
@endsection
