@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('single-product.index') }}">Single Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Single Product</li>
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
                <h6 class="card-title">Single Product Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('single-product.update',$website->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="websites">Websites</label>
                        <select class="form-control" id="website_id" name="website_id">
                            @foreach($websites as $web)
                            <option value="{{$web->id}}" {{$website->website_id == $web->id ? 'selected' : ''}}>{{$web->website_url}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name_node" autocomplete="off" placeholder="Product Name" name="product_name_node" value="{{$website->product_name_node}}">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Price</label>
                        <input type="text" class="form-control" id="product_price_node" autocomplete="off" placeholder="Product Price" name="product_price_node" value="{{$website->product_price_node}}">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Unit Price</label>
                        <input type="text" class="form-control" id="product_unit_price_node" autocomplete="off" placeholder="Product Unit Price" name="product_unit_price_node" value="{{$website->product_unit_price_node}}">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Discount</label>
                        <input type="text" class="form-control" id="product_discount_node" autocomplete="off" placeholder="Product Discount" name="product_discount_node" value="{{$website->product_discount_node}}">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Image</label>
                        <input type="text" class="form-control" id="product_image_node" autocomplete="off" placeholder="Product Image" name="product_image_node" value="{{$website->product_image_node}}">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('single-product.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection