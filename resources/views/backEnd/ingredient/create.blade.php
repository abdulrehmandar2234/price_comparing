@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Ingredient Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Ingredient</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">

        @foreach ($errors->all() as $error)
        <div class="alert alert-fill-danger" role="alert">
            <strong>Whoops!</strong>{{ $error }}
        </div>
        @endforeach
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Ingredient Form</h6>
                <form class="forms-sample" method="POST" action="{{route('ingredient.store')}}" >
                    @csrf

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" autocomplete="off" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Quantity</label>
                        {{-- <textarea class="form-control" id="description" rows="3" name="description"></textarea> --}}

                        <input type="number" class="form-control" id="quantity" name="quantity">
                       
                    </div>
                    {{-- <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">

                            <option >Draft</option>
                            <option >Pending</option>
                            <option >Publish</option>

                        </select>
                    </div> --}}

                    

              
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection