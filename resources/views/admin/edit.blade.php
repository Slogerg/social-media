@extends('layouts.app')
@section('content')
    <div class="content">
{{--        @include('blog.admin.posts.includes.result_message')--}}
        @if($item->exists)
            <form method="POST" action="{{ route('posts.update',$item->id) }}">
                @method('PATCH')
                @else
                    <form method="POST" action="{{ route('posts.store') }}">
                        @endif
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('admin.includes.post_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('admin.includes.post_edit_add_col')
                            </div>
                        </div>
                    </form>

                    @if($item->exists)
                        <br>
                        <form method="POST" action= "{{ route('posts.destroy' , $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Видалити</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
        @endif
    </div>
@endsection
