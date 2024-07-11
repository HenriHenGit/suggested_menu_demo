@extends('layouts.admin')

@section('title')
    <title>Cập nhật nguyên liệu</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route('admin.ingredients.update', ['id' => $ingredient->id]) }}" method="POST">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cập nhật nguyên liệu</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <div class="form-group text-left">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus-circle"></i> Cập nhật nguyên liệu
                                    </button>
                                </div>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Nguyên liệu {{ $ingredient->name }}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên nguyên liệu</label>
                                    <input type="text" id="inputName" class="form-control"
                                        value="{{ old('name', $ingredient->name ?? '') }}" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Khối lượng tính dinh dưỡng <small class="badge bg-info">g</small>
                                        (Sẽ tự
                                        chuyển
                                        thành <small class="badge bg-warning">100g</small>)</label>
                                    <input type="number" id="inputName" class="form-control"
                                        value="{{ old('amount', 100) }}" name="amount" min="1">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Loại nguyên liệu</label>
                                    <select id="inputStatus" class="form-control custom-select" name="category_ingre_id">
                                        @foreach ($categoryIngres as $categoryIngre)
                                            <option value="{{ $categoryIngre->id }}"
                                                @if ($ingredient->category_ingre_id == $categoryIngre->id) selected @endif>{{ $categoryIngre->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_ingre_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin dinh dưỡng trong <small
                                        class="badge bg-warning">100g</small>
                                    nguyên liệu</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-12" id="accordion">
                                    @foreach ($nutris as $index => $nutri)
                                        <div class="card card-primary card-outline">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                <div class="card-header">
                                                    <h4 class="card-title w-100">
                                                        {{ $index + 1 }}. Hàm lượng dinh dưỡng trong {{ $nutri->name }}
                                                    </h4>
                                                </div>
                                            </a>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputName">Đơn vị là <small
                                                                class="badge bg-info">{{ $nutri->unit }}</small>:</label>
                                                        @php
                                                            $found = false;
                                                        @endphp
                                                        @foreach ($ingredientDetails as $ingredientDetail)
                                                            @if ($nutri->id == $ingredientDetail->nutri_id)
                                                                <input type="number" id="inputName" class="form-control"
                                                                    name="nutri[{{ $nutri->id }}]" min="0"
                                                                    step="any" value="{{ $ingredientDetail->amount }}">
                                                                @php
                                                                    $found = true;
                                                                    break;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @if (!$found)
                                                            <input type="number" id="inputName" class="form-control"
                                                                name="nutri[{{ $nutri->id }}]" min="0"
                                                                step="any">
                                                        @endif
                                                        @error('nutri.' . $nutri->id)
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
    </form>
    <!-- /.content-wrapper -->
@endsection
