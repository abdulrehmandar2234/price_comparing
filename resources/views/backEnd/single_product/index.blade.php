@extends('layouts.app')

@section('styles')
    <style>
        .table td img {
        width: 50px !important;
        height: 30px !important;  
        border-radius: 0px;  
}
    </style>
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Websites</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('single-product.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Single Product
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
                <h6 class="card-title">Single Product</h6>
                <p class="card-description">All the websites are listed here.</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Website Url
                                </th>
                              
                                <th>
                                    Product Name
                                </th>
                                <th>
                                    Product Price
                                </th>
                                <th>
                                    Product Unit Price
                                </th>
                                <th>
                                    Product Discount
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
                            @foreach($websites as $key => $website)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $website->website->website_url}}
                                </td>
                                
                                <td>
                                    {{ $website->product_name_node }}
                                </td>
                                <td>
                                    {{ $website->product_price_node }}
                                </td>
                                <td>
                                    {{ $website->product_unit_price_node }}
                                </td>
                                <td>
                                    {{ $website->product_discount_node }}
                                </td>
                                <td>
                                    {{ $website->product_image_node }}
                                </td>

                                <td>
                                    <form class="d-inline-block" action="{{ route('single-product.destroy',$website->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('single-product.edit',$website->id) }}" class="btn btn-warning btn-icon-text">
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