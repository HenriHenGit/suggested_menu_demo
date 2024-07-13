@extends('layouts.admin')

@section('title')
    <title>Cập nhật món ăn</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                        <h1>Thêm món ăn</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('admin.foods.update', ['id' => $food->id]) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Cập nhật món ăn {{ $food->food_name }}</h3>

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
                                        value="{{ old('food_name') ? old('food_name') : $food->food_name }}">
                                    @if ($errors->has('food_name'))
                                        <span class="text-danger">{{ $errors->first('food_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Loại món ăn</label>
                                    <select id="inputStatus" name="category_food_id" class="form-control custom-select">
                                        <option value="main_dishes"
                                            {{ $food->category_food_id == 'main_dishes' ? 'selected' : '' }}>Món chính
                                        </option>
                                        <option value="appetizer"
                                            {{ $food->category_food_id == 'appetizer' ? 'selected' : '' }}>Món phụ
                                        </option>
                                        <option value="desserts"
                                            {{ $food->category_food_id == 'desserts' ? 'selected' : '' }}>
                                            Tráng miệng
                                        </option>
                                        <option value="main_dishes"
                                            {{ old('category_food_id') == 'main_dishes' ? 'selected' : '' }}>Món chính
                                        </option>
                                        <option value="appetizer"
                                            {{ old('category_food_id') == 'appetizer' ? 'selected' : '' }}>Món phụ
                                        </option>
                                        <option value="desserts"
                                            {{ old('category_food_id') == 'desserts' ? 'selected' : '' }}>
                                            Tráng miệng
                                        </option>
                                    </select>
                                    @if ($errors->has('category_food_id'))
                                        <span class="text-danger">{{ $errors->first('category_food_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Mô tả</label>
                                    <textarea id="inputDescription" name="desc" class="form-control" rows="4">{{ old('desc') ? old('desc') : $food->desc }}</textarea>
                                    @if ($errors->has('desc'))
                                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputFile">Hình ảnh</label>
                                    <input type="file" id="inputFile" name="img" class="form-control form-file">

                                    @php
                                        $imagePath = public_path('images/foods/' . $food->img);
                                        $imageUrl = asset('images/foods/' . $food->img);
                                    @endphp

                                    @if (file_exists($imagePath))
                                        <div>Hình ảnh củ</div>
                                        <img src="{{ $imageUrl }}" alt="Avatar" class="table-avatar"
                                            style="width: 100px; height: auto;" name="img_old">
                                    @else
                                        <div>Hình ảnh củ</div>
                                        <img src="{{ $food->img }}" alt="Avatar" class="table-avatar"
                                            style="width: 100px; height: auto;" name="img_old">
                                    @endif
                                    @if ($errors->has('img'))
                                        <span class="text-danger">{{ $errors->first('img') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputNumber">Khẩu phần ăn</label>
                                    <input type="number" id="inputNumber" name="number_eat" class="form-control"
                                        value="{{ old('number_eat') ? old('number_eat') : $food->number_eat }}">
                                    @if ($errors->has('number_eat'))
                                        <span class="text-danger">{{ $errors->first('number_eat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group text-left">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus-circle"></i> Cập nhật món ăn
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

                                    <div id="recipe-list">
                                        @foreach ($stepRecipes as $index => $stepRecipe)
                                            <div class="card card-primary card-outline" data-index="{{ $index }}">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a class="d-block w-100" data-toggle="collapse"
                                                            href="#collapse-{{ $index }}">
                                                            {{ $index + 1 }}. Công thức
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-{{ $index }}" class="collapse show"
                                                    data-parent=".card-secondary">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="inputDescriptions">Mô tả</label>
                                                            <textarea class="form-control" id="inputDescriptions" name="recipes[{{ $index }}][content]" rows="3">{{ $stepRecipe->content }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputImages{{ $index }}">Hình ảnh</label>
                                                            <input type="file" class="form-control form-file"
                                                                id="inputImages{{ $index }}"
                                                                name="recipes[{{ $index }}][img]">

                                                            @php
                                                                $imagePath = null;
                                                                $imageUrl = null;

                                                                if ($stepRecipe->img) {
                                                                    $imagePath = public_path(
                                                                        'images/step_recipes/' . $stepRecipe->img,
                                                                    );
                                                                    $imageUrl = asset(
                                                                        'images/step_recipes/' . $stepRecipe->img,
                                                                    );
                                                                }
                                                            @endphp

                                                            @if (file_exists($imagePath))
                                                                <div>{{ $index + 1 }}. Ảnh mô tả củ</div>
                                                                <img src="{{ $imageUrl }}" alt="Step Image"
                                                                    class="table-avatar"
                                                                    style="width: 100px; height: auto;"
                                                                    name="recipes[{{ $index }}][img_old]">
                                                            @else
                                                                @if ($stepRecipe->img)
                                                                    <div>{{ $index + 1 }}. Ảnh mô tả củ</div>
                                                                    <img src="{{ $stepRecipe->img }}" alt="Step Image"
                                                                        class="table-avatar"
                                                                        style="width: 100px; height: auto;"
                                                                        name="recipes[{{ $index }}][img_old]">
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @for ($i = count($stepRecipes); $i < 8; $i++)
                                            <div class="card card-primary card-outline" data-index="{{ $i }}">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a class="d-block w-100" data-toggle="collapse"
                                                            href="#collapse-{{ $i }}">
                                                            {{ $i + 1 }}. Công thức (thu gọn)
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse-{{ count($stepRecipes) }}" class="collapse show"
                                                    data-parent=".card-secondary">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="inputDescriptions">Mô tả</label>
                                                            <textarea class="form-control" id="inputDescriptions" name="recipes[{{ $i }}][content]" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputImages{{ $i }}">Hình ảnh</label>
                                                            <input type="file" class="form-control form-file"
                                                                id="inputImages{{ $i }}"
                                                                name="recipes[{{ $i }}][img]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </section>
        <!-- /.content -->

        <section class="content">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Nguyên liệu trong món ăn</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Món {{ $food->food_name }} gồm:</label>
                                    </div>
                                    <!-- Main content -->
                                    <section class="content">

                                        <!-- Default box -->
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <table class="table table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%">
                                                                Stt
                                                            </th>
                                                            <th style="width: 50%">
                                                                Tên nguyên liệu
                                                            </th>
                                                            <th style="width: 20%">
                                                                Hàm lượng
                                                            </th>
                                                            <th style="width: 20%">
                                                                Đơn vị
                                                            </th>
                                                            <th style="width: 20%">
                                                                Chức năng
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ingredientFood as $index => $ingredient)
                                                            <tr>
                                                                <td>
                                                                    {{ $index + 1 }}
                                                                </td>
                                                                <td>
                                                                    <a>
                                                                        {{ $ingredient->name }}
                                                                    </a>
                                                                    <br />
                                                                </td>
                                                                <td>
                                                                    <a>
                                                                        @foreach ($recipeDetails as $recipeDetail)
                                                                            @if ($recipeDetail->ingredient_id == $ingredient->id)
                                                                                {{ $recipeDetail->amount }}
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                    <br />
                                                                </td>
                                                                <td>
                                                                    <a>
                                                                        g
                                                                    </a>
                                                                    <br />
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $foodId = $food->id;
                                                                        $ingreId = $ingredient->id;
                                                                    @endphp
                                                                    <a class="btn btn-danger btn-sm"
                                                                        href="{{ route('admin.foods.deleteIngre', ['foodId' => $foodId, 'ingreId' => $ingreId]) }}">
                                                                        <i class="fas fa-trash"></i>
                                                                        Xóa
                                                                    </a>
                                                                    <br />
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

                                    </section>
                                    <!-- /.content -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Nguyên liệu</h3>

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
                                        <div class="col-md-6 d-flex" id="example1_filter_container">
                                        </div>
                                    </div>
                                    <form action="{{ route('foods.addIngredient', ['id' => $food->id]) }}"
                                        method="POST">
                                        @csrf
                                        <!-- Display error messages -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Chọn</th>
                                                    <th>Nguyên liệu</th>
                                                    <th>Loại nguyên liệu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ingredients as $ingredient)
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="ingredient_id"
                                                                value="{{ $ingredient->id }}"
                                                                {{ old('ingredient_id') == $ingredient->id ? 'checked' : '' }}>
                                                        </td>
                                                        <td>{{ $ingredient->name }}</td>
                                                        <td>
                                                            @foreach ($categoryIngres as $categoryIngre)
                                                                @if ($categoryIngre->id == $ingredient->category_ingre_id)
                                                                    {{ $categoryIngre->name }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        @if ($errors->has('ingredient_id'))
                                            <div class="alert alert-danger">{{ $errors->first('ingredient_id') }}</div>
                                        @endif

                                        <div>Nhập hàm lượng:</div>
                                        <div class="input-group">
                                            <input type="number" name="amount" class="form-control"
                                                value="{{ old('amount') }}" required>
                                            <span class="input-group-text">g</span>
                                        </div>

                                        <!-- Display validation error for amount -->
                                        @if ($errors->has('amount'))
                                            <div class="alert alert-danger">{{ $errors->first('amount') }}</div>
                                        @endif

                                        <br>
                                        <input type="submit" class="btn btn-danger" value="Thêm">
                                    </form>
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
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
