@extends('layoutsUser.user')

@section('title')
    <title>
        Danh sách món ăn</title>
@endsection

@section('content')
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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($user->gender)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('images/img/avatarMale.jpg') }}" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('images/img/avatarFemale.jpg') }}" alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->email }}</p>

                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>SĐT</b> <a class="float-right">{{ $user->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tuổi</b> <a class="float-right">{{ $user->age }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Giới tính</b> <a class="float-right">
                                            @if ($user->gender)
                                                Nam
                                            @else
                                                Nữ
                                            @endif
                                        </a>
                                    </li>
                                </ul>

                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Cài
                                            đặt</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Dinh
                                            dưỡng của bạn</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <form class="form-horizontal"
                                            action="{{ route('account.update', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName"
                                                        placeholder="Họ và tên" name="name"
                                                        value="{{ old('name', $user->name) }}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail"
                                                        placeholder="Email" name="email"
                                                        value="{{ old('email', $user->email) }}" disabled>
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Số điện
                                                    thoại</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="Số điện thoại" name="phone"
                                                        value="{{ old('phone', $user->phone) }}">
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Tuổi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2"
                                                        placeholder="Tuổi" name="age"
                                                        value="{{ old('age', $user->age) }}">
                                                    @if ($errors->has('age'))
                                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Giới tính</label>
                                                <div class="col-sm-10">
                                                    <select name="gender" class="form-control">
                                                        <option value="" disabled selected>Giới tính</option>
                                                        <option value="1"
                                                            {{ old('gender', $user->gender) == '1' ? 'selected' : '' }}>
                                                            Nam
                                                        </option>
                                                        <option value="0"
                                                            {{ old('gender', $user->gender) == '0' ? 'selected' : '' }}>
                                                            Nữ
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('gender'))
                                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Đổi thông tin</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="settings">
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


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
