@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category_nodes.index') }}">Category Nodes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Category Nodes</li>
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
                <h6 class="card-title">Product Link Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('category_nodes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="website_id">Website</label>
                        <select class="form-control" name="website_id">
                            @foreach ($websites as $link)
                                <option value="{{$link->id}}">{{$link->website_name}} </option>       
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="category_id">Product Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}} </option>       
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="main_listing_node">Main Listing Node</label>
                        <input type="text" class="form-control" id="main_listing_node" autocomplete="off" placeholder="Main Listing Node" name="main_listing_node" >
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" autocomplete="off" placeholder="Description" name="description" >
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" autocomplete="off" placeholder="Price" name="price" >
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input type="text" class="form-control" id="unit_price" autocomplete="off" placeholder="Unit Price" name="unit_price" >
                    </div>
                    <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        <input type="text" class="form-control" id="discount_price" autocomplete="off" placeholder="Discount Price" name="discount_price" >
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage">Discount Percentage</label>
                        <input type="text" class="form-control" id="discount_percentage" autocomplete="off" placeholder="Discount Percentage" name="discount_percentage" >
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="text" class="form-control" id="image" autocomplete="off" placeholder="Image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="text" class="form-control" id="image_url" autocomplete="off" placeholder="Image URL" name="image_url">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="text" class="form-control" id="rating" autocomplete="off" placeholder="Rating" name="rating">
                    </div>
                    <div class="form-group">
                        <label for="product_link">Product Link</label>
                        <input type="text" class="form-control" id="product_link" autocomplete="off" placeholder="Product Link" name="product_link">
                    </div>
                   
                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                         <a href="{{route('category_nodes.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection