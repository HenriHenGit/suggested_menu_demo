@extends('layouts.admin')

@section('title')
    <title>Quản lý nguyên liệu</title>
@endsection

@section('content')
    </br>
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bảng nguyên liệu</h3>
                    <a href="{{ route('admin.ingredients.create') }}" class="btn btn-inline btn-success btn-sm ml-3">Thêm
                        nguyên
                        liệu</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
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
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.ingredients.delete', ['id' => $ingredient->id]) }}">
                                            <i class="fas fa-trash"></i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $ingredients->links() }}
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
