<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đề xuất thực đơn</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="color-theme-green mont-font demo-style">

    <div class="preloader"></div>
    <!-- main wrapper  -->
    <div class="main-wrapper">

        @include('partialsHome.header')

        <div class="demo-banner" id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 text-center mt-lg-5 content-text">
                        <h1 class="text-white">THỰC ĐƠN DÀNH CHO BẠN</h1>
                        <p class="fw-500 text-grey-500 pt-2 pb-2">Bạn đang muốn thay đổi cân nặng bản thân, bạn đang
                            muốn tìm kiếm thực đơn phù hợp cho mình gia đình của bạn</p>
                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <a href="{{ route('login.index') }}"
                                class="bg-success btn btn-lg p-3 rounded-6 font-xsssss fw-700 ls-3 text-white w-175 text-uppercase">Bắt
                                đầu nào!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('partialsHome.footer')
    </div>

    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
