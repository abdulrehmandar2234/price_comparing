@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product_links.index') }}">Product Link</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Product Link</li>
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
                <form class="forms-sample" method="POST" action="{{ route('product_links.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="website_id">Website</label>
                        <select class="form-control" name="website_id">
                            @foreach ($websites as $link)
                                <option value="{{$link->id}}">{{$link->website_name}} </option>       
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Product</label>
                        <select class="form-control" name="product_id">
                            @foreach ($products as $item)
                            <option value="{{$item->id}}">{{$item->product_name}}</option>       
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_link">Product Link</label>
                        <input type="text" class="form-control" id="product_link" autocomplete="off" placeholder="Product Link" name="product_link">
                    </div>

               
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" class="form-control" id="product_price" autocomplete="off" placeholder="Product Price" name="product_price" disabled>
                    </div>
                    <div class="form-group">
                        <label for="product_unit">Product Unit</label>
                        <input type="text" class="form-control" id="product_unit" autocomplete="off" placeholder="Product Unit" name="product_unit" disabled>
                    </div>
                    <div class="form-group">
                        <label for="product_unit_price">Product Unit Price</label>
                        <input type="text" class="form-control" id="product_unit_price" autocomplete="off" placeholder="Product Unit Price" name="product_unit_price" disabled>
                    </div>
                    <div class="form-group">
                        <label for="product_discount ">Product Discount</label>
                        <input type="text" class="form-control" id="product_discount" autocomplete="off" placeholder="Product Discount" name="product_discount" disabled>
                    </div>
                    <div class="form-group">
                        <label for="product_updated">Product Updated</label>
                        <input type="text" class="form-control" id="product_updated" autocomplete="off" placeholder="Product Updated" name="product_updated" readonly>
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