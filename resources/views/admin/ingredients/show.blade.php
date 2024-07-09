@extends('layouts.admin')

@section('title')
    <title>Chi tiết dinh dưỡng</title>
@endsection

@section('content')
    </br>
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dinh dưỡng {{ strtolower($ingredient->name) }} trong <small
                            class="badge bg-warning">100g</small></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">Stt</th>
                                <th>Tên dinh dưỡng</th>
                                <th>Hàm lượng</th>
                                <th>Đơn vị</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredientDetails as $index => $ingredientDetail)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @foreach ($nutris as $nutri)
                                            @if ($nutri->id == $ingredientDetail->nutri_id)
                                                {{ $nutri->name }}
                                                @php
                                                    break;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $ingredientDetail->amount }}
                                    </td>
                                    <td><span class="badge bg-info">
                                            @foreach ($nutris as $nutri)
                                                @if ($nutri->id == $ingredientDetail->nutri_id)
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
    </div>
@endsection
