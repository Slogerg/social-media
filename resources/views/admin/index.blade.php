@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Написати</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Заголовок</th>
                                <th>Дата публікації</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit',$post->id) }}">{{ $post->title }}</a>
                                    </td>
                                    <td>{{ $post->created_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i'):'' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
