@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="form-card bg-light p-2 mb-3 rounded">
        <p><h3>{{$user->name}}</h3></p>
        <label>Posted {{$posts->count()}} {{ Str::plural('post', $posts->count())}} and Received {{ $user->likes->count() }} {{ Str::plural('like', $user->likes->count()) }}</label>
    </div>

    @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>
                    <h5 class="text-dark">Does Not Have Any Post</h5>
                    </p>
                @endif
</div>
@endsection