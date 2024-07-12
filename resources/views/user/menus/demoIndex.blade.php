@extends('layoutsUser.user')

@section('title')
    <title>
        Danh sách món ăn</title>
    <link rel="stylesheet" href="{{ asset('css/style-cardHeader.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;

    @endphp
    <!-- Main content -->
    <div class="content-wrapper">
        </br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills" id="mealTabs">
                                    <?php
                                    $daysOfWeek = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
                                    $days = [];
                                    // Lấy thứ hiện tại (1 = Thứ Hai, ..., 7 = Chủ Nhật)
                                    $currentDayOfWeek = date('N');
                                    
                                    // Tính toán các ngày trong tuần bắt đầu từ Thứ Hai
                                    for ($i = 1; $i <= 7; $i++) {
                                        // Tính ngày tương ứng cho từng ô (1 = Thứ Hai)
                                        $date = strtotime('last Monday +' . ($i - 1) . ' days');
                                        $days[] = [
                                            'date' => date('d/m', $date),
                                            'dayOfWeek' => $daysOfWeek[date('w', $date)],
                                            'isToday' => date('d/m') == date('d/m', $date),
                                        ];
                                    }
                                    ?>
                                    @foreach ($days as $index => $day)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $day['isToday'] ? 'active' : '' }}"
                                                href="#{{ $index == 0 ? 'activity' : 'newTag' . $index }}"
                                                data-toggle="tab">
                                                <span class="date">{{ $day['date'] }}</span><br>
                                                <span class="dayOfWeek">{{ $day['dayOfWeek'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content">
                                    @foreach ($meals as $i => $meal)
                                        @if ($i == 0)
                                            <div class="active tab-pane" id="activity">
                                                <!-- Thông tin bữa ăn và dinh dưỡng -->
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin bữa ăn và dinh dưỡng của bạn
                                                            </h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body p-0">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">Stt</th>
                                                                        <th>Tên dinh dưỡng</th>
                                                                        <th>Hàm lượng</th>
                                                                        <th>Bữa ăn</th>
                                                                        <th>Chệnh lệch</th>
                                                                        <th>Đơn vị</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($userDetail as $index => $userNutri)
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
                                                                            <td>{{ $userNutri->amount }}</td>
                                                                            <td>
                                                                                @foreach ($meal['nutris'] as $key => $mealAmount)
                                                                                    @if ($key == $userNutri->nutri_id)
                                                                                        {{ $mealAmount }}
                                                                                        @php
                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>
                                                                            <td>
                                                                                @foreach ($meal['diff'] as $keyNutri => $diff)
                                                                                    @if ($keyNutri == $userNutri->nutri_id)
                                                                                        @if ($diff < 0)
                                                                                            <span class="badge bg-danger">
                                                                                                {{ $diff }}%
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="badge bg-warning">
                                                                                                {{ $diff }}%
                                                                                            </span>
                                                                                        @endif
                                                                                        @php
                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach

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
                                                                                </span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <!-- Thông tin người dùng -->
                                                <div class="row">
                                                    @foreach ($meal['meal'] as $number => $mealFood)
                                                        @if ($number == 0)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-warning" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-coffee"></i> Bữa ăn sáng
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($number == 3)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-warning" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-sun"></i> Bữa ăn trưa
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($number == 6)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-info" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-moon"></i> Bữa ăn tối
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-4">
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-body box-profile">
                                                                    <div class="text-center">
                                                                        @php
                                                                            $imagePath = public_path(
                                                                                'images/foods/' . $mealFood->img,
                                                                            );
                                                                            $imageUrl = asset(
                                                                                'images/foods/' . $mealFood->img,
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
                                                                                src="{{ $mealFood->img }}"
                                                                                alt="User profile picture" />
                                                                        @endif
                                                                    </div>
                                                                    <h3 class="profile-username text-center">
                                                                        {{ $mealFood->food_name }}
                                                                    </h3>
                                                                    <p class="text-muted text-center">
                                                                        @if ($mealFood->category_food_id == 'main_dishes')
                                                                            Món chính
                                                                        @endif
                                                                        @if ($mealFood->category_food_id == 'appetizer')
                                                                            Món phụ
                                                                        @endif
                                                                        @if ($mealFood->category_food_id == 'desserts')
                                                                            Món Tráng miệng
                                                                        @endif

                                                                    <ul class="list-group list-group-unbordered mb-3">
                                                                        {{ Str::limit($mealFood->desc, 50) }}
                                                                    </ul>

                                                                    <a href="{{ route('foods.show', ['id' => $mealFood->id]) }}"
                                                                        class="btn btn-primary btn-block"><b>Xem chi
                                                                            tiết</b></a>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- /.row -->
                                            </div>
                                        @else
                                            <div class="tab-pane" id="newTag{{ $i }}">
                                                <!-- Thông tin bữa ăn và dinh dưỡng -->
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Thông tin bữa ăn và dinh dưỡng của bạn
                                                            </h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body p-0">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">Stt</th>
                                                                        <th>Tên dinh dưỡng</th>
                                                                        <th>Hàm lượng</th>
                                                                        <th>Bữa ăn</th>
                                                                        <th>Chệnh lệch</th>
                                                                        <th>Đơn vị</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($userDetail as $index => $userNutri)
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
                                                                            <td>{{ $userNutri->amount }}</td>
                                                                            <td>
                                                                                @foreach ($meal['nutris'] as $key => $mealAmount)
                                                                                    @if ($key == $userNutri->nutri_id)
                                                                                        {{ $mealAmount }}
                                                                                        @php
                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>
                                                                            <td>
                                                                                @foreach ($meal['diff'] as $keyNutri => $diff)
                                                                                    @if ($keyNutri == $userNutri->nutri_id)
                                                                                        @if ($diff < 0)
                                                                                            <span class="badge bg-danger">
                                                                                                {{ $diff }}%
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="badge bg-warning">
                                                                                                {{ $diff }}%
                                                                                            </span>
                                                                                        @endif
                                                                                        @php
                                                                                            break;
                                                                                        @endphp
                                                                                    @endif
                                                                                @endforeach

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
                                                                                </span></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <!-- Thông tin người dùng -->
                                                <div class="row">
                                                    @foreach ($meal['meal'] as $number => $mealFood)
                                                        @if ($number == 0)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-warning" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-coffee"></i> Bữa ăn sáng
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($number == 3)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-warning" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-sun"></i> Bữa ăn trưa
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($number == 6)
                                                            <div class="col-md-12">
                                                                <div class="badge bg-info" style="font-size: 1.5rem;">
                                                                    <i class="fas fa-moon"></i> Bữa ăn tối
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-4">
                                                            <div class="card card-primary card-outline">
                                                                <div class="card-body box-profile">
                                                                    <div class="text-center">
                                                                        @php
                                                                            $imagePath = public_path(
                                                                                'images/foods/' . $mealFood->img,
                                                                            );
                                                                            $imageUrl = asset(
                                                                                'images/foods/' . $mealFood->img,
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
                                                                                src="{{ $mealFood->img }}"
                                                                                alt="User profile picture" />
                                                                        @endif
                                                                    </div>
                                                                    <h3 class="profile-username text-center">
                                                                        {{ $mealFood->food_name }}
                                                                    </h3>
                                                                    <p class="text-muted text-center">
                                                                        @if ($mealFood->category_food_id == 'main_dishes')
                                                                            Món chính
                                                                        @endif
                                                                        @if ($mealFood->category_food_id == 'appetizer')
                                                                            Món phụ
                                                                        @endif
                                                                        @if ($mealFood->category_food_id == 'desserts')
                                                                            Món Tráng miệng
                                                                        @endif
                                                                    </p>
                                                                    <ul class="list-group list-group-unbordered mb-3">
                                                                        {{ Str::limit($mealFood->desc, 50) }}
                                                                    </ul>

                                                                    <a href="{{ route('foods.show', ['id' => $mealFood->id]) }}"
                                                                        class="btn btn-primary btn-block"><b>Xem chi
                                                                            tiết</b></a>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        @endif
                                        @if ($i == 6)
                                            @php
                                                break;
                                            @endphp
                                        @endif
                                        <!-- /.tab-pane -->
                                    @endforeach
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
