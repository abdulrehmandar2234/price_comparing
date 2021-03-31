@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recipe Management</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create New Recipe
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if(session()->get('success'))
        <div class="alert alert-fill-success mb-3">
            {{ session()->get('success') }}
        </div><br />
        @endif
    </div>
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Recipe</h6>
                <p class="card-description">All the Recipe are listed here.</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Category Name
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Description
                                </th>
                                {{-- <th>
                                    Status
                                </th> --}}

                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($blogs as $key => $blog)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $blog->title }}</td>
                                <td> <img src="{{ url('images/'.$blog->image) }}"> </td>
                                <td>{{ $blog->recipecategory->name ??""}}</td>
                                <td>{{ $blog->status  }}</td>
                                <td>{!! $blog->description !!}</td>
                                {{-- <td>{{ $blog->status }}</td> --}}
                              

                                <td>
                                    <form class="d-inline-block" action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-warning btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                    </a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection