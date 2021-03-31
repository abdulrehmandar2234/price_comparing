@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Brand</a></li>
           
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
                <h6 class="card-title">Advertisement Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('advertisement.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="brand_name">Banner Title</label>
                        <input type="text" class="form-control" id="brand_name" autocomplete="off" placeholder="Name" name="title" required
                    </div>
                    <div class="form-group">
                        <label for="brand_name">Price</label>
                        <input type="number" class="form-control" id="brand_name" autocomplete="off" placeholder="Price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_name">Link</label>
                        <input type="number" class="form-control" id="brand_name" autocomplete="off" placeholder="link" name="link" required>
                    </div>
                    <div class="form-group">
                        <label for="brand_name">Banner (Size 1400X200)</label>
                        <input type="file" name="banner" id="" class="form-control" required>
                    </div>

                         <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('advertisement.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection