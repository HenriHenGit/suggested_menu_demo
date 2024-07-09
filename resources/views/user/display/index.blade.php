@extends('layoutsUser.user')

@section('title', 'Thực đơn')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#timeline" data-toggle="tab">Thông tin dinh dưỡng
                                            của bạn</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="timeline">
                                        <!-- Thông tin dinh dưỡng của bạn -->
                                        <div class="card-body p-0">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%">Stt</th>
                                                        <th>Dinh dưỡng</th>
                                                        <th>Hàm lượng</th>
                                                        <th style="width: 20%">Đơn vị</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($userDetail as $index => $userNutri)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                @foreach ($nutris as $nutri)
                                                                    @if ($nutri->id == $userNutri['nutri_id'])
                                                                        {{ $nutri->name }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{ $userNutri['amount'] }}
                                                            </td>
                                                            <td>
                                                                @foreach ($nutris as $nutri)
                                                                    @if ($nutri->id == $userNutri['nutri_id'])
                                                                        <span
                                                                            class="badge bg-success">{{ $nutri->unit }}</span>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        @if ($index == 2)
                                                        @break
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div id="extraNutris" style="display: none;">
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    @foreach ($userDetail as $index => $userNutri)
                                                        @if ($index > 2)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>
                                                                    @foreach ($nutris as $nutri)
                                                                        @if ($nutri->id == $userNutri['nutri_id'])
                                                                            {{ $nutri->name }}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td>
                                                                    {{ $userNutri['amount'] }}
                                                                </td>
                                                                <td>
                                                                    @foreach ($nutris as $nutri)
                                                                        @if ($nutri->id == $userNutri['nutri_id'])
                                                                            <span
                                                                                class="badge bg-success">{{ $nutri->unit }}</span>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3">
                                            @if (count($userDetail) > 3)
                                                <button id="showMore" class="btn btn-link">Ẩn bớt</button>
                                            @endif
                                        </div>
                                    </div><!-- /.card-body -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    document.getElementById('showMore').addEventListener('click', function() {
        var extraNutris = document.getElementById('extraNutris');
        if (extraNutris.style.display === 'none') {
            extraNutris.style.display = 'block';
            this.textContent = 'Ẩn bớt';
        } else {
            extraNutris.style.display = 'none';
            this.textContent = 'Xem thêm';
        }
    });
</script>
@endsection
