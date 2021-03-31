@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Link</li>
        </ol>
    </nav>
    
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('product_links.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Product Link
        </a>
    </div> 
    <form class="forms-sample" method="GET" action="{{ route('update_price.index') }}">
        <button type="submit" class="btn btn-primary mr-2">Refresh</button>
    </form>
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
                <h6 class="card-title">Product Link</h6>
                <p class="card-description">All the product_links are listed here.</p>
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
                                    Product Name
                                </th>

                                <th>
                                    Product Link
                                </th>

                                <th>
                                    Product Price
                                </th>
                              
                                <th>
                                    Product Unit
                                </th>

                                <th>
                                    Product Unit Price
                                </th>
                                <th>
                                    Product Discount
                                </th>

                                <th>
                                    Product Updated
                                </th>

                                <th>
                                    Product Image
                                </th>

                            
                                    <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_links as $key => $product_link)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $product_link->website->website_name }}
                                </td>
                                <td>
                                    {{ $product_link->product->product_name }}
                                </td>
                                <td>
                                    {{ $product_link->product_link }}
                                </td>
                                <td>
                                    {{ $product_link->product_price }}
                                </td>
                                <td>
                                    {{ $product_link->product_unit }}
                                </td>
                                <td>
                                    {{ $product_link->product_unit_price }}
                                </td>
                                <td>
                                    {{ $product_link->product_discount }}
                                </td>
                                <td>
                                    {{ $product_link->product_updated }}
                                </td>
                                <td>
                                <img src="{{'product/'.$product_link->product_image}}" alt="">
                                </td>
                          
                                <td>
                                    <form class="d-inline-block" action="{{ route('product_links.destroy',$product_link->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('product_links.edit',$product_link->id) }}" class="btn btn-warning btn-icon-text">
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