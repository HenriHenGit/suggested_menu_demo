@extends('layouts.admin')

@section('title')
    <title>Thêm món ăn</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm món ăn</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('admin.foods.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Thông tin món ăn</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên món</label>
                                    <input type="text" id="inputName" name="food_name" class="form-control"
                                        value="{{ old('food_name') }}">
                                    @if ($errors->has('food_name'))
                                        <span class="text-danger">{{ $errors->first('food_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Loại món ăn</label>
                                    <select id="inputStatus" name="category_food_id" class="form-control custom-select">
                                        <option selected disabled>Chọn loại</option>
                                        <option value="main_dishes"
                                            {{ old('category_food_id') == 'main_dishes' ? 'selected' : '' }}>Món chính
                                        </option>
                                        <option value="appetizer"
                                            {{ old('category_food_id') == 'appetizer' ? 'selected' : '' }}>Món phụ
                                        </option>
                                        <option value="desserts"
                                            {{ old('category_food_id') == 'desserts' ? 'selected' : '' }}>Tráng miệng
                                        </option>
                                    </select>
                                    @if ($errors->has('category_food_id'))
                                        <span class="text-danger">{{ $errors->first('category_food_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Mô tả</label>
                                    <textarea id="inputDescription" name="desc" class="form-control" rows="4">{{ old('desc') }}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputFile">Hình ảnh</label>
                                    <input type="file" id="inputFile" name="img" class="form-control form-file">
                                    @if ($errors->has('img'))
                                        <span class="text-danger">{{ $errors->first('img') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputNumber">Khẩu phần ăn</label>
                                    <input type="number" id="inputNumber" name="number_eat" min="1"
                                        class="form-control" value="{{ old('number_eat') }}">
                                    @if ($errors->has('number_eat'))
                                        <span class="text-danger">{{ $errors->first('number_eat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group text-left">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus-circle"></i> Thêm món ăn
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Danh sách công thức</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Container để chứa các card công thức -->
                                    <div id="recipe-list">
                                        <!-- Các card công thức sẵn có -->
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-1">
                                                        1. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-1" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[1][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages1">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages1" name="recipes[1][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-2">
                                                        2. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-2" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[2][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages2" name="recipes[2][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-3">
                                                        3. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-3" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[3][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages3" name="recipes[3][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-4">
                                                        4. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-4" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[4][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages4" name="recipes[4][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-4">
                                                        5. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-4" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[5][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages5" name="recipes[5][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-4">
                                                        6. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-4" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[6][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages6" name="recipes[6][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-4">
                                                        7. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-4" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[7][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages7" name="recipes[7][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-primary card-outline" data-index="1">
                                            <div class="card-header">
                                                <h4 class="card-title">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse-1">
                                                        8. Công thức
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-1" class="collapse show" data-parent=".card-secondary">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="inputDescriptions">Mô tả</label>
                                                        <textarea class="form-control" id="inputDescriptions" name="recipes[8][content]" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputImages">Hình ảnh</label>
                                                        <input type="file" class="form-control form-file"
                                                            id="inputImages8" name="recipes[8][img]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </br>
@endsection
