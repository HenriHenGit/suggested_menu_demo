@extends('layouts.admin')

@section('title')
    <title>Thêm nguyên liệu vào món ăn</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm nguyên liệu vào món ắn</h1>
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
                            <h3 class="card-title">Nguyên liệu trong món ăn</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
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
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Nguyên liệu</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            {{-- <h3 class="card-title">Fixed Header Table</h3>

                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="table_search"
                                                        class="form-control float-right" placeholder="Search">

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!-- /.card-header -->
                                        <form action="{{ route('foods.addIngredient', ['id' => $id]) }}" method="POST">
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

                                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                                <table class="table table-head-fixed text-nowrap">
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

                                                {{ $ingredients->links() }}
                                            </div>

                                            <!-- Display validation error for ingredient_id -->
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
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                </div>
            </div> --}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
