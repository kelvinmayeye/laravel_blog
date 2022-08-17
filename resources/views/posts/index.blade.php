@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="col-md-6 col-sm-12 mx-auto">
            <div class="form-card bg-light p-3 rounded">
                <form action="{{ url('post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="text-dark">Whats in your mind</label>
                        <textarea class="form-control" name="body" rows="3" placeholder="Post Something"></textarea>
                        @error('body')
                            <small class="form-text text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>

                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="mb-2 text-dark">
                            <a href="" class=""><label
                                    class="font-weight-bold">{{ $post->user->name }}</label></a>
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
        </div>
    </div>
@endsection
