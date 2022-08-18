@extends('layouts.app')
@section('content')

<div class="container mt-5">
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