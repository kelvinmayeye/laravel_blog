@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="col-md-6 col-sm-12 mx-auto">
            <div class="form-card bg-light p-3 rounded">
                {{-- @auth --}}
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
                {{-- @endauth --}}

                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
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
