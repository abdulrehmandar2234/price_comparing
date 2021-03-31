@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('search-websites.index') }}">Search Website</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Search Website</li>
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
                <h6 class="card-title">Search Website Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('search-websites.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="role_name">Website Url</label>
                        <input type="text" class="form-control" id="website_url" autocomplete="off" placeholder="Website URL" name="website_url">
                    </div>

                    <div class="form-group">
                        <label for="role_name">Website Search Url</label>
                        <input type="text" class="form-control" id="search_url_node" autocomplete="off" placeholder="Website Search URL" name="search_url_node">
                    </div>

                    <div class="form-group">
                        <label for="role_name">Website Logo</label>
                        <input type="file" class="form-control" id="website_logo" autocomplete="off" placeholder="Website Logo" name="website_logo">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name_node" autocomplete="off" placeholder="Product Name" name="product_name_node">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Price</label>
                        <input type="text" class="form-control" id="product_price_node" autocomplete="off" placeholder="Product Price" name="product_price_node">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Unit Price</label>
                        <input type="text" class="form-control" id="product_unit_price_node" autocomplete="off" placeholder="Product Unit Price" name="product_unit_price_node">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Discount</label>
                        <input type="text" class="form-control" id="product_discount_node" autocomplete="off" placeholder="Product Discount" name="product_discount_node">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Image</label>
                        <input type="file" class="form-control" id="product_image_node" autocomplete="off" placeholder="Product Image" name="product_image_node">
                    </div>
                    <div class="form-group">
                        <label for="role_name">Product Link</label>
                        <input type="text" class="form-control" id="product_link_node" autocomplete="off" placeholder="Product Link" name="product_link_node">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection