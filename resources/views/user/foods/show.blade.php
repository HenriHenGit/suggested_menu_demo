@extends('layoutsUser.user')

@section('title')
    <title>Chi tiết món ăn</title>
@endsection

@section('content')
    </br>
    <div class="content-wrapper">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        {{-- $food --}}
                        <h3 class="d-inline-block d-sm-none">{{ $food->food_name }}</h3>
                        <div class="container">
                            <div class="row justify-content-center">
                                @php
                                    $imagePath = public_path('images/foods/' . $food->img); // Get absolute path to image
                                    $imageUrl = asset('images/foods/' . $food->img); // Get URL to image
                                @endphp

                                @if (file_exists($imagePath))
                                    <img src="{{ $imageUrl }}" alt="Product Image" class="img-fluid">
                                @else
                                    <img src="{{ $food->img }}" alt="Product Image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $food->food_name }}
                            <small>{{ '(' . $food->category_food_id . ')' }}</small>
                        </h3>
                        <p>{{ $food->desc }}</p>
                        <hr>
                        <div class="bg-green py-2 px-3 mt-4">
                            <h4 class="mt-0">
                                <small>Khẩu phần: {{ $food->number_eat }} người</small>
                            </h4>
                        </div>
                        {{-- $food --}}
                        <div class="mt-4 product-share">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="col-md">

            <!-- DONUT CHART -->
            <div class="card card-lightblue ">
                <div class="card-header">
                    <h3 class="card-title">Công thức</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="container">
                    <br>
                    <div id="accordion">
                        {{-- $stepRecipes --}}
                        @foreach ($stepRecipes as $stepRecipe)
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse"
                                    href="#collapseTwo{{ $stepRecipe->sort_step }}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            Bước {{ $stepRecipe->sort_step }}:
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseTwo{{ $stepRecipe->sort_step }}" class="" data-parent="#accordion">
                                    <div class="card-body text-left">
                                        {!! nl2br(e($stepRecipe->content)) !!}
                                    </div>
                                    @php
                                        $stepImagePath = public_path('images/step_recipes/' . $stepRecipe->img);
                                        $stepImageUrl = asset('images/step_recipes/' . $stepRecipe->img);
                                    @endphp

                                    @if (file_exists($stepImagePath) && is_file($stepImagePath))
                                        <img style="width: 200px; height: 200px" src="{{ $stepImageUrl }}"
                                            alt="Ảnh công thức">
                                    @elseif (!empty($stepRecipe->img))
                                        <img style="width: 200px; height: 200px" src="{{ $stepRecipe->img }}"
                                            alt="Ảnh công thức">
                                    @endif


                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- end $stepRecipes --}}

            </div>
        </div>
        <!-- /.card -->

        <!-- CHART -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                        <!-- DONUT CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Nguyên liệu</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">Stt</th>
                                                <th>Nguyên liệu</th>
                                                <th style="width: 35%">Hàm lượng</th>
                                                <th style="width: 20%">Đơn vị</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- $recipeDetails --}}
                                            @foreach ($recipeDetails as $index => $recipeDetail)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    @foreach ($ingredients as $ingredient)
                                                        @if ($ingredient->id == $recipeDetail->ingredient_id)
                                                            <td>{{ $ingredient->name }}</td>
                                                            <td>
                                                                {{ $recipeDetail->amount }}
                                                            </td>
                                                            <td><span
                                                                    class="badge bg-info">{{ $recipeDetail->unit }}</span>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                    {{-- end $recipeDetails --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">

                        <!-- DONUT CHART -->
                        <div class="card card-teal">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết dinh dưỡng</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">Stt</th>
                                            <th>Tên dinh dưỡng</th>
                                            <th style="width: 35%">Hàm lượng</th>
                                            <th style="width: 20%">Đơn vị</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- $foodNutris --}}
                                        @foreach ($foodNutris as $index => $foodNutri)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                @foreach ($nutris as $nutri)
                                                    @if ($foodNutri->nutri_id == $nutri->id)
                                                        <td>{{ $nutri->name }}</td>
                                                        <td>
                                                            {{ round($foodNutri->amount, 2) }}
                                                        </td>
                                                        <td><span class="badge bg-teal">{{ $nutri->unit }}</span>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        {{-- end $foodNutris --}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>

                    </div>


                </div>
            </div>
        </section>

    </div>
@endsection

@section('js')
    <script>
        $(function() {
            console.log("Initializing charts...");

            var donutChartCanvas1 = $('#donutChart1').get(0).getContext('2d');

            var donutData = {
                labels: ['Chrome', 'IE', 'FireFox', 'Safari', 'Opera', 'Navigator'],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            };

            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            };

            new Chart(donutChartCanvas1, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });

            console.log("Charts initialized successfully.");
        });
    </script>
@endsection
