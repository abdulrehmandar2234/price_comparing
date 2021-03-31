@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Slider</li>
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
                <h6 class="card-title">Slider Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('slider.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="role_name">Slider</label>
                        <input type="file" class="form-control" id="banner" autocomplete="off"  name="banner">
                    </div>

                    <div class="form-group">
                        <label for="role_name">Image</label>
                        <input type="file" class="form-control" id="image" autocomplete="off"  name="image">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Sub Title</label>
                        <input type="text" class="form-control" id="sub_title" autocomplete="off" placeholder="Sub Title" name="sub_title">
                    </div>
                   
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" autocomplete="off" placeholder="Price" name="price" value="">
                    </div>
                   
                    <div class="form-group">
                        <label for="btn_text">Button Text</label>
                        <input type="text" class="form-control" id="btn_text" autocomplete="off" placeholder="Button Text" name="btn_text" value="">
                    </div>

                    <div class="form-group">
                        <label for="role_name">Product Link</label>
                        <input type="text" class="form-control" id="link" autocomplete="off" placeholder="Product link" name="link">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('slider.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection