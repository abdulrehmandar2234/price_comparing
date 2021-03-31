@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('websites.index') }}">Website</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Website</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        @foreach ($errors->all() as $error)
        <div class="alert alert-fill-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Website Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('websites.update',$website->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" class="form-control" id="website_name" autocomplete="off" placeholder="Website Name" name="website_name" value="{{$website->website_name}}">
                    </div>

                    <div class="form-group">
                        <label for="website_url">Website Url</label>
                        <input type="text" class="form-control" id="website_url" autocomplete="off" placeholder="Website URL" name="website_url" value="{{$website->website_url}}">
                    </div>

                    <div class="form-group">
                        <label for="website_logo">Website Logo</label>
                        <input type="file" class="form-control" id="website_logo" autocomplete="off" placeholder="Website Logo" name="website_logo" value="{{$website->website_logo}}">
                    </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection