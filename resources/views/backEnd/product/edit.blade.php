@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Brand</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
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
                <h6 class="card-title">Brand Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('products.update',$product->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" autocomplete="off" placeholder="Product Name" name="product_name" value="{{$product->product_name}}">
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
                        <label for="brand_id">Product Brand</label>
                        <select class="form-control" name="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}} </option>       
                            @endforeach
                        </select>
                    </div>

                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection