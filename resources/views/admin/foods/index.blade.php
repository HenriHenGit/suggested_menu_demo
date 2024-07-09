@extends('layouts.admin')

@section('title')
    <title>Danh sách món ăn</title>
@endsection


@section('content')
    </br>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bảng món ăn</h3>
                    <a href="{{ route('admin.foods.create') }}" class="btn btn-inline btn-success btn-sm ml-3">Thêm món ăn</a>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    ID
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
                                                    <img src="{{ $imageUrl }}" alt="Avatar" class="table-avatar"
                                                        style="width: 100px; height: auto;">
                                                @else
                                                    <img src="{{ $food->img }}" alt="Avatar" class="table-avatar"
                                                        style="width: 100px; height: auto;">
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
                                            <a class="btn btn-danger font-weight-bold text-white"
                                                href="{{ route('foods.showIngredient', ['id' => $food->id]) }}">Thêm
                                                nhanh</a>
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
                    {{ $foods->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
