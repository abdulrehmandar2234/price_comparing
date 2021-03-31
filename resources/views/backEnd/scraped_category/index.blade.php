@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Scraped Categories</li>
        </ol>
    </nav>
    
    {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('category_nodes.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Category N
        </a>
    </div>  --}}
    
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
                <h6 class="card-title">Scraped Category</h6>
                <p class="card-description">All the scraped categories are listed here.</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                            
                                <th>
                                    Website Name
                                </th>

                                <th>
                                    Category Name
                                </th>

                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Price
                                </th>
                              
                                <th>
                                    Unit Price
                                </th>
                                <th>
                                    Discount Price
                                </th>
                                <th>
                                    Discount Percentage
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Rating
                                </th>

                                <th>
                                    Product Link
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
                            @foreach($category_nodes as $key => $category_node)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $category_node->website->website_name }}
                                </td>
                                <td>
                                    {{ $category_node->category->category_name }}
                                </td>
                                <td>
                                    {{ $category_node->title }}
                                </td>
                                <td>
                                    {{ $category_node->description }}
                                </td>
                                <td>
                                    {{ $category_node->price }}
                                </td>
                                <td>
                                    {{ $category_node->unit_price }}
                                </td>
                                <td>
                                    {{ $category_node->discount_price }}
                                </td>
                                <td>
                                    {{ $category_node->discount_percentage }}
                                </td>
                                <td>
                                    {{ $category_node->image }}
                                </td>
                                <td>
                                    {{ $category_node->rating }}                         

                                </td>
                               
                                <td>
                                    {{ $category_node->product_link }}
                                </td>
                                <td>
                                    {{ $category_node->last_updated }}
                                </td>
                                <td>
                                    <form class="d-inline-block" action="{{ route('scraped_categories.destroy',$category_node->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('scraped_categories.edit',$category_node->id) }}" class="btn btn-warning btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="offset-3">
                {{ $category_nodes->links() }}
            </div>
            
        </div>
    </div>

</div>
@endsection