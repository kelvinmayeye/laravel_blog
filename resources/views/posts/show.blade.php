@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>


      <div class="form-card bg-light p-3 rounded">
        <div class="row">
          <div class="col-md-6 col-sm-12 mx-auto">
            <x-post :post="$post" />
          </div>
        </div>
      </div>
</div>
@endsection