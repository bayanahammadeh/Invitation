<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="nav">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('/assets/logo/logo.png')}}"
                        style="max-height: 155px; max-width: 155px" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                لوحة التحكم
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ url('invitation') }}">ارسال الدعوات</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('external') }}">الدعوات العامة</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">الألقاب</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">الفئات</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">تعديل معلومات الدخول</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">اضافة موظفين</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                يوم الحفل
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ url('all') }}">جميع الدعوات</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">الكراسي</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">الكراسي الفارغة فقط</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">تقارير الكراسي</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
