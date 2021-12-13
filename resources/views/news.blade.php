@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div><a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Українські друзі</span>
                </a>
                <div class="nav_list">
                    <a href="{{route('news')}}" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Новини</span> </a>
                    <a href="{{route('friends')}}" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Друзі</span> </a>
                    {{--                <a href="#" class="nav_link">--}}
                    {{--                    <i class='bx bx-message-square-detail nav_icon'></i>--}}
                    {{--                    <span class="nav_name">Messages</span> </a>--}}
                    {{--                <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span--}}
                    {{--                        class="nav_name">Bookmark</span> </a>--}}
                    <a href="#" class="nav_link"> <i
                            class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Мої пости</span> </a>
                    {{--                <a href="#" class="nav_link">--}}
                    {{--                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a></div>--}}
                </div>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Увійти</span> </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('login') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Зареєструватись</span> </a>
                    @endif
                @else
                    <a href="{{ route('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Вийти</span> </a>
            </div>
            </li>
            @endguest
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-md-8">
                    <h1 class="my-4">
                        Статті блогу

                    </h1>

                    @foreach($items as $item)

                        <div class="card mb-4">
                            @if($item->image)
                                <img class="img-fluid rounded" src="{{$item->img}}" alt="">
                            @else
                                <img class="card-img-top" src="https://via.placeholder.com/750x300" alt="Card image cap" />
                            @endif
                            <div class="card-body">
                                <h2 class="card-title">{{$item->title}}</h2>
                                <p class="card-title">by {{$item->user->name}}</p>

                                <a class="btn btn-primary" href="{{route('posts.show',$item->id)}}">Переглянути →</a>
                            </div>
                            <div class="card-footer text-muted">
                                {{$item->created_at}}

                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="col-md-4">
                    <!-- Side widget-->
                    <h5 class="card-header"><a href="{{route('posts.index')}}"><button class="btn btn-primary">Створити пост</button></a></h5>
{{--                    <h5 class="card-header"><a href="{{route('posts.index')}}"><button class="btn btn-primary">Створити пост</button></a></h5>--}}
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
@endsection
