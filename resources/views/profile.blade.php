@extends('layouts.app')
<link href="{{ asset('app/css/style.css') }}" type="text/css" rel="stylesheet" >
@section('content')

    @guest
        <p>Go Sign Up!</p>
    @else
        <p id="welcome">Welcome {{Auth::user()->name}}</p>
        {{-- @php print_r( $tweets);@endphp --}}
        @foreach ($tweets as $tweet)
            <p><strong>{{$tweet->author}}</strong></p>
            <p>{{$tweet->content}}</p>
            <p>{{$tweet->created_at}}</p>
            <form action="/editTweetForm" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$tweet->id}}">
                <button type="submit" value="{{$tweet->id}}">Edit</button><br><br>
            </form>
        @endforeach

        <form action="/createTweet" method="get">
            @csrf
            <p>Create New Tweet</p>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="Content">
            @error('content')
                <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                </span>
            @enderror
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="Author">
            @error('author')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            <input type="submit" name="create" value="Create">
        </form>

    @endguest

@endsection
