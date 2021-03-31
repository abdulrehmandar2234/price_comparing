@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category Link</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('category_links.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Category
        </a>
        <a href="{{ route('get_products') }}" class="btn btn-primary btn-icon-text ml-5">            
            Scrap Products
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
                <h6 class="card-title">Category</h6>
                <p class="card-description">All the categories are listed here.</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                            
                                <th>
                                    Category Link
                                </th>
                                <th>
                                    Category Website
                                </th>

                                <th>
                                    Product Category
                                </th>
                                <th>
                                    Last Updated
                                </th>

                                    <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $category->category_link }}
                                </td>
                                <td>
                                    {{ $category->website->website_name }}
                                </td>
                                <td>
                                    {{ $category->category->category_name}}
                                </td>
                              
                                <td>
                                    {{ $category->last_updated}}
                                </td>
                              

                                <td>
                                    <form class="d-inline-block" action="{{ route('category_links.destroy',$category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('category_links.edit',$category->id) }}" class="btn btn-warning btn-icon-text">
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