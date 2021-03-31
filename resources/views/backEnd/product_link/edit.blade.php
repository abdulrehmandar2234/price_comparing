@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product_links.index') }}">Brand</a></li>
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
                <form class="forms-sample" method="POST" action="{{ route('product_links.update',$product_link->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="website_id">Website</label>
                        <select class="form-control" name="website_id">
                            @foreach ($websites as $link)
                                <option value="{{ $link->id }}" {{$product_link->website_id == $link->id  ? 'selected' : ''}}>{{ $link->website_name}}</option>     
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select class="form-control" name="product_id">
                            @foreach ($products as $item)
                            <option value="{{ $item->id }}" {{$product_link->product_id == $item->id  ? 'selected' : ''}}>{{ $item->product_name}}</option>     
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_link">Product Link</label>
                        <input type="text" class="form-control" id="product_link" autocomplete="off" placeholder="Product Link" name="product_link" value="{{$product_link->product_link}}">
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" class="form-control" id="product_price" autocomplete="off" placeholder="Product Price" name="product_price" value="{{$product_link->product_price}}">
                    </div>
                    <div class="form-group">
                        <label for="product_unit">Product Unit</label>
                        <input type="text" class="form-control" id="product_unit" autocomplete="off" placeholder="Product Unit" name="product_unit" value="{{$product_link->product_unit}}">
                    </div>
                    <div class="form-group">
                        <label for="product_unit_price">Product Unit Price</label>
                        <input type="text" class="form-control" id="product_unit_price" autocomplete="off" placeholder="Product Unit Price" name="product_unit_price" value="{{$product_link->product_unit_price}}">
                    </div>
                    <div class="form-group">
                        <label for="product_discount ">Product Discount</label>
                        <input type="text" class="form-control" id="product_discount" autocomplete="off" placeholder="Product Discount" name="product_discount" value="{{$product_link->product_discount}}">
                    </div>
                    <div class="form-group">
                        <label for="product_updated">Product Updated</label>
                        <input type="text" class="form-control" id="product_updated" autocomplete="off" placeholder="Product Updated" name="product_updated" value="{{$product_link->product_updated}}">
                    </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="text" class="form-control" id="product_image" autocomplete="off" placeholder="Product Image" name="product_image">
                        </div>

                 
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('product_links.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection