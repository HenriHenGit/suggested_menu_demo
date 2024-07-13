@extends('layouts.admin')

@section('title')
    <title>Chi tiết TP.dinh dưỡng</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <h3 class="d-inline-block d-sm-none">tên dinh dưỡng</h3>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $nutri->name }} <small>({{ $nutri->unit }})</small></h3>
                            <p>{{ $nutri->desc }}
                            </p>

                            <hr>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
    </div>
@endsection
