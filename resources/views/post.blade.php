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
                    <a href="#" class="nav_link">
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
                    @if(\Illuminate\Support\Facades\Auth::id())
                        <a href="{{route('getByUser.single',\Illuminate\Support\Facades\Auth::id())}}" class="nav_link">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_name">Мої пости</span> </a>
                    @endif
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
                    <a class="nav_link"> <i class='bx bx-log-out nav_icon'></i>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <span class="nav_name"><button class="btn btn-light" type="submit">Вийти</button></span>
                        </form>
                    </a>
            </div>
            </li>
            @endguest
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h2>Friends</h2>
        <div class="card-deck">

            @foreach($users as $item)
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->email}}</p>
                        <p class="card-text"><small class="text-muted">Зареєстрований {{$item->created_at}}</small></p>
                        <form action="{{route('removeFriend')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="text" name="user_id" hidden value="{{$item->id}}">
                            <button class="btn btn-danger" type = 'submit'>Видалити</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach

        </div>


        <br>
        <hr>
        <h2>Suggested</h2>
        <div class="card-deck">

            @foreach($suggested as $item)
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->email}}</p>
                        <p class="card-text"><small class="text-muted">Зареєстрований {{$item->created_at}}</small></p>
                        <form action="{{route('addFriend')}}" method="POST">
                            @csrf
                            <input type="text" name="user_id" hidden value="{{$item->id}}">
                            <button type = 'submit'>Додати</button>
                        </form>
                    </div>
                </div>
                <br>
            @endforeach

        </div>
    </div>
    <!--Container Main end-->
@endsection
