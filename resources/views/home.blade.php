@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if(session()->get('success'))
    <div class="alert alert-fill-success mb-3">
        {{ session()->get('success') }}
    </div><br />
    @endif
</div>
@if(Auth::user()->hasRole('admin'))
<div class="container">
    <div class="row">
        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Users</h5>
                <p></p>{{$users}}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Products</h5>
                <p></p>{{ $products }}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Category</h5>
                <p></p>{{ $categories }}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Brands</h5>
                <p></p>{{ $brands }}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Websites</h5>
                <p></p>{{ $websites }}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Blogs</h5>
                <p></p>{{$blogs}}</p>
            </div>
        </div>
        {{-- <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Subscriptions</h5>
                <p>{{$subscriptions}}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Mix Matched</h5>
                <p>{{$mix_matches}}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title ">Total Single Matched</h5>
                <p>{{$single_matches}}</p>
            </div>
        </div>

        <div class="card" style="width: 15rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Total Tips</h5>
                <p>{{$tips}}</p>
            </div>
        </div> --}}
    </div>
</div>
@endif
@endsection