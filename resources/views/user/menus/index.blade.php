@extends('layoutsUser.user')

@section('title')
    <title>Danh sách món ăn</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Món
                                            ăn</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Thông tin
                                            dinh dưỡng của bạn</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Profile Image -->
                                        <div class="row">
                                            @foreach ($meals as $index => $meal)
                                                <div class="col-md-4">
                                                    <div class="card card-primary card-outline">
                                                        <div class="card-body box-profile">
                                                            <div class="text-center">
                                                                @if (isset($meal['meal']['main_dishes']))
                                                                    @php
                                                                        $imagePath = public_path(
                                                                            'images/foods/' .
                                                                                $meal['meal']['main_dishes']->img,
                                                                        );
                                                                        $imageUrl = asset(
                                                                            'images/foods/' .
                                                                                $meal['meal']['main_dishes']->img,
                                                                        );
                                                                    @endphp

                                                                    @if (file_exists($imagePath))
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $imageUrl }}"
                                                                            alt="User profile picture" />
                                                                    @else
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $meal['meal']['main_dishes']->img }}"
                                                                            alt="User profile picture" />
                                                                    @endif
                                                                @endif
                                                                @if (isset($meal['meal']['appetizer']))
                                                                    @php
                                                                        $imagePath = public_path(
                                                                            'images/foods/' .
                                                                                $meal['meal']['appetizer']->img,
                                                                        );
                                                                        $imageUrl = asset(
                                                                            'images/foods/' .
                                                                                $meal['meal']['appetizer']->img,
                                                                        );
                                                                    @endphp

                                                                    @if (file_exists($imagePath))
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $imageUrl }}"
                                                                            alt="User profile picture" />
                                                                    @else
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $meal['meal']['appetizer']->img }}"
                                                                            alt="User profile picture" />
                                                                    @endif
                                                                @endif
                                                                @if (isset($meal['meal']['desserts']))
                                                                    @php
                                                                        $imagePath = public_path(
                                                                            'images/foods/' .
                                                                                $meal['meal']['desserts']->img,
                                                                        );
                                                                        $imageUrl = asset(
                                                                            'images/foods/' .
                                                                                $meal['meal']['desserts']->img,
                                                                        );
                                                                    @endphp

                                                                    @if (file_exists($imagePath))
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $imageUrl }}"
                                                                            alt="User profile picture" />
                                                                    @else
                                                                        <img style="width: 100px; height: 70px"
                                                                            class="profile-user-img img-fluid img-circle"
                                                                            src="{{ $meal['meal']['desserts']->img }}"
                                                                            alt="User profile picture" />
                                                                    @endif
                                                                @endif

                                                            </div>

                                                            <p class="text-muted text-center">Bữa ăn {{ $index + 1 }}
                                                            </p>

                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item">
                                                                    <b>Năng lượng (Energy):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($meal['nutri'] as $nutri_id => $amount)
                                                                            @if ($amount == 0)
                                                                                <div style="display: none;">
                                                                                    {{ $nutri_id }}:
                                                                                    {{ round($amount, 2) }}</div>
                                                                            @else
                                                                                @if ($nutri_id == 'MACR001')
                                                                                    {{ round($amount, 2) }} kcal
                                                                                    @php
                                                                                        break;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Chất đạm (Protein):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($meal['nutri'] as $nutri_id => $amount)
                                                                            @if ($amount == 0)
                                                                                <div style="display: none;">
                                                                                    {{ $nutri_id }}:
                                                                                    {{ round($amount, 2) }}</div>
                                                                            @else
                                                                                @if ($nutri_id == 'MACR002')
                                                                                    {{ round($amount, 2) }} g
                                                                                    @php
                                                                                        break;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Chất béo (Fat):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($meal['nutri'] as $nutri_id => $amount)
                                                                            @if ($amount == 0)
                                                                                <div style="display: none;">
                                                                                    {{ $nutri_id }}:
                                                                                    {{ round($amount, 2) }}</div>
                                                                            @else
                                                                                @if ($nutri_id == 'MACR003')
                                                                                    {{ round($amount, 2) }} g
                                                                                    @php
                                                                                        break;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Chất bột đường (Carbohydrate):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($meal['nutri'] as $nutri_id => $amount)
                                                                            @if ($amount == 0)
                                                                                <div style="display: none;">
                                                                                    {{ $nutri_id }}:
                                                                                    {{ round($amount, 2) }}</div>
                                                                            @else
                                                                                @if ($nutri_id == 'MACR004')
                                                                                    {{ round($amount, 2) }} g
                                                                                    @php
                                                                                        break;
                                                                                    @endphp
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <a href="{{ route('foods.index') }}"
                                                                onclick="checkMealCount({{ $index }})"
                                                                class="btn btn-success btn-block"><b>Thêm vào thực
                                                                    đơn</b></a>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- /.card-header -->
                                        <form action="{{ route('menus.update') }}" method="POST">
                                            @csrf
                                            <div class="card-body p-0">
                                                <div class="form-group">
                                                    <label for="mealCount">Một ngày ăn mấy bữa:</label>
                                                    <input type="number" id="mealCount" name="meals_per_day"
                                                        class="form-control" placeholder="Tối đa 4 bữa" min="1"
                                                        max="4" required
                                                        value="{{ old('meals_per_day', auth()->user()->meals_per_day ?? '') }}">
                                                </div>

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">Stt</th>
                                                            <th>Dinh dưỡng</th>
                                                            <th>Hàm lượng</th>
                                                            <th style="width: 40px">Đơn vị</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($needsUser as $index => $need)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>
                                                                    @foreach ($nutris as $nutri)
                                                                        @if ($nutri->id == $need->nutri_id)
                                                                            {{ $nutri->name }}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control"
                                                                            name="nutri_needs[{{ $need->nutri_id }}][amount]"
                                                                            value="{{ $need->amount }}" min="0"
                                                                            step="any">
                                                                    </div>
                                                                </td>
                                                                <td><span class="badge bg-success">
                                                                        @foreach ($nutris as $nutri)
                                                                            @if ($nutri->id == $need->nutri_id)
                                                                                {{ $nutri->unit }}
                                                                            @endif
                                                                        @endforeach
                                                                    </span></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.querySelector('.btn.btn-success.btn-block').addEventListener('click', function(e) {
            e.preventDefault();
            var mealId = this.dataset.mealId;
            document.getElementById('meal_id').value = mealId;
            document.getElementById('addMealForm').submit();
        });

        function checkMealCount(index) {
            var mealCount = document.getElementById('mealCount').value;
            if (mealCount == '' || mealCount == 0) {
                alert('Vui lòng nhập số lượng bữa ăn trước khi thêm vào thực đơn.');
                window.location.href = '#timeline';
            } else {
                document.getElementById('addMealForm-' + index).submit();
            }
        }
    </script>
@endsection
