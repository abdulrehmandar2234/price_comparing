@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
                <h6 class="card-title">Category Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('category_links.store') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="category_link">Category Link</label>
                        <input type="text" class="form-control" id="category_link" autocomplete="off" placeholder="Category Link" name="category_link"> 
                    </div>
                    <div class="form-group">
                        <label for="website_id">Website</label>
                        <select class="form-control" name="website_id">
                            @foreach ($websites as $link)
                                <option value="{{$link->id}}">{{$link->website_name}} </option>       
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Product Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}} </option>       
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="request_type">Request Type</label>
                        <select class="form-control" name="request_type">                           
                                <option value="GET">GET</option>       
                                <option value="POST">POST</option>                               
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="request_type">Scrape Method</label>
                        <select class="form-control" name="scrap_method">                           
                            <option value="HTML">HTML</option>                                   
                            <option value="API">APi</option>                               
                        </select>
                    </div>
                    
                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('category_links.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection