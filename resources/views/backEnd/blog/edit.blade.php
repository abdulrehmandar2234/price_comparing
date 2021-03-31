@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog Management</a></li>
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
                <h6 class="card-title">Blog Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('blog.update',$blog->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" autocomplete="off" name="title" value="{{$blog->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="summary-ckeditor" rows="3" name="description">{{$blog->description}}</textarea>
                    </div>
                    {{-- <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" >

                            <option >Draft</option>
                            <option >Pending</option>
                            <option >Publish</option>

                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="my-select">Status</label>
                        <select id="my-select" class="custom-select" name="status" value="{{ $blog->status }}">
                            <option>Publish</option>
                            <option>Draft</option>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="inputState">Category</label>
                        <select id="category" class="form-control" name="category_id" >
                            
                             @foreach ($categories as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                                 {{-- {{ dd($item->id)  }} --}}
                             @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table-data">
                            <tr>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Add</td>
                            </tr>
                            <tr class="tr_clone">
                                <td> <select name="product_id[]">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select></td>
                                <td><input type="number" autofocus placeholder="Quantity" name="quantity[]"  value="{{$blog->quantity}}"></td>
                                <td><input type="button" name="add" value="Add" class="tr_clone_add"></td>
                            </tr>
                        </table><!-- /table#table-data -->
                    </div>



                    <div class="form-group">
                        <label for="title">Serving</label>
                        <input type="number" class="form-control"  autocomplete="off" name="serving">
                    </div>



                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" autocomplete="off" name="image" value="{{$blog->image}}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('blog.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        $('#table-data').on('click', '.tr_clone_add', function() {
    var $tr    = $(this).closest('.tr_clone');
    var $clone = $tr.clone();
    $clone.find(':text').val('');
    $tr.after($clone);
});
    </script>
@endsection