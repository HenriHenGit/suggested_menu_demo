@extends('layoutsUser.user')

@section('title')
    <title>Danh sách món ăn</title>
@endsection

@section('content')
    </br>
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
                                            @foreach ($foods as $food)
                                                <div class="col-md-4">
                                                    <div class="card card-primary card-outline">
                                                        <div class="card-body box-profile">
                                                            <div class="text-center">
                                                                @php
                                                                    $imagePath = public_path(
                                                                        'images/foods/' . $food->img,
                                                                    );
                                                                    $imageUrl = asset('images/foods/' . $food->img);
                                                                @endphp

                                                                @if (file_exists($imagePath))
                                                                    <img style="width: 100px; height: 70px"
                                                                        class="profile-user-img img-fluid img-circle"
                                                                        src="{{ $imageUrl }}"
                                                                        alt="User profile picture" />
                                                                @else
                                                                    <img style="width: 100px; height: 70px"
                                                                        class="profile-user-img img-fluid img-circle"
                                                                        src="{{ $food->img }}"
                                                                        alt="User profile picture" />
                                                                @endif

                                                            </div>

                                                            <h3 class="profile-username text-center">{{ $food->food_name }}
                                                            </h3>

                                                            <p class="text-muted text-center">{{ $food->category_food_id }}
                                                            </p>

                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item">
                                                                    <b>Năng lượng (Energy):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($foodNutris as $foodNutri)
                                                                            @if ($foodNutri->food_id == $food->id && $foodNutri->nutri_id == 'MACR001')
                                                                                {{ $foodNutri->amount }}
                                                                                @php break; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                        kcal
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Chất đạm (Protit):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($foodNutris as $foodNutri)
                                                                            @if ($foodNutri->food_id == $food->id && $foodNutri->nutri_id == 'MACR002')
                                                                                {{ $foodNutri->amount }}
                                                                                @php break; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                        g
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <b>Chất bột đường (Gluxit):</b>
                                                                    <a class="float-right">
                                                                        @foreach ($foodNutris as $foodNutri)
                                                                            @if ($foodNutri->food_id == $food->id && $foodNutri->nutri_id == 'MACR004')
                                                                                {{ $foodNutri->amount }}
                                                                                @php break; @endphp
                                                                            @endif
                                                                        @endforeach
                                                                        g
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <a href="{{ route('foods.show', ['id' => $food->id]) }}"
                                                                class="btn btn-primary btn-block"><b>Xem chi
                                                                    tiết</b></a>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- /.card -->
                                        {{ $foods->links() }}
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
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
                                                            <td>
                                                                {{ $userNutri->amount }}
                                                            </td>
                                                            <td><span class="badge bg-success">
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
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.tab-pane -->


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
