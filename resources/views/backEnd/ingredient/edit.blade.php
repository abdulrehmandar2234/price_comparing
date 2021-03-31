@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
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
                <h6 class="card-title">Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('ingredient.update',$Ingredient->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" autocomplete="off" name="name" value={{$Ingredient -> name}}> 
                    </div>
                    <div class="form-group">
                        <label for="description">Quantity</label>
                        {{-- <textarea class="form-control" id="description" rows="3" name="description"></textarea> --}}

                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $Ingredient -> quantity }}"> 
                       
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection