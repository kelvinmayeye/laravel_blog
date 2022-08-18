@extends('layouts.app')
@section('content')

<div class="container mt-5">
    @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="mb-2 text-dark">
                            <a href="{{route('users.posts',$post->user)}}" class=""><label class="font-weight-bold">{{ $post->user->name }}</label></a>
                            <span class="text-secondary">{{ $post->user->created_at->diffForHumans() }}</span>
                            <p>{{ $post->body }}</p>

                            {{-- @if ($post->ownedBy(auth()->user())) --}}
                            @can('delete', $post)
                                <form action="{{ url('post/' . $post->id . '/delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mb-3 btn-sm">delete</button>
                                </form>
                            @endcan
                            {{-- @endif --}}

                            <div class="d-flex flex-row">
                                @auth
                                    @if (!$post->likedBy(auth()->user()))
                                        <form action="{{ url('posts/' . $post->id . '/like') }}" method="POST" class="">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">like</button>
                                        </form>
                                    @else
                                        <form action="{{ url('posts/' . $post->id . '/unlike') }}" method="POST"
                                            class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-primary btn-sm">unlike</button>
                                        </form>
                                    @endif
                                @endauth
                                <span><button type="button"
                                        class="btn btn-light btn-sm rounded">{{ $post->likes->count() }}
                                        {{ Str::plural('like', $post->likes->count()) }}</button></span>

                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>
                    <h5 class="text-dark">There is no post yet</h5>
                    </p>
                @endif
</div>
@endsection