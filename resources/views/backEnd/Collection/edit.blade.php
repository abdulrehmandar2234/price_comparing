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
 

</div>
@endsection