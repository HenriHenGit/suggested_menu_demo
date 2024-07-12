<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đề xuất thực đơn</title>

    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">

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
                        <h1 class="text-green">THỰC ĐƠN DÀNH CHO BẠN</h1>
                        <p class="fw-500 text-grey-500 pt-2 pb-2 text-green">Bạn đang muốn thay đổi cân nặng bản thân,
                            bạn đang
                            muốn tìm kiếm thực đơn phù hợp cho mình gia đình của bạn</p>
                        <button onclick="showUserTypeModal()"
                            class="bg-success btn btn-lg p-3 rounded-6 font-xsssss fw-700 ls-3 text-white w-175 text-uppercase">Bắt
                            đầu nào!
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('partialsHome.footer')
    </div>

    <!-- Modal -->
    <div id="userTypeModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeUserTypeModal()">&times;</span>
            <h2>Bạn là ai?</h2>
            <button onclick="redirectTo('{{ route('login.index') }}')" class="btn btn-primary">Khách hàng</button>
            <button onclick="redirectTo('{{ route('adminLogin.index') }}')" class="btn btn-primary">Quản lý</button>
        </div>
    </div>

    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        function showUserTypeModal() {
            document.getElementById('userTypeModal').style.display = 'block';
        }

        function closeUserTypeModal() {
            document.getElementById('userTypeModal').style.display = 'none';
        }

        function redirectTo(route) {
            window.location.href = route;
        }
    </script>

    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn {
            margin: 10px;
        }
    </style>

</body>

</html>
