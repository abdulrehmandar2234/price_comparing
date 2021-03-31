@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advertisement</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('advertisement.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create New Advertisement
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
                <h6 class="card-title">Advertisement</h6>
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
                                    Price
                                </th>
                                <th>
                                    Banner
                                </th>
                                <th>
                                    Link
                                </th>
                             
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($advertisements as $advertisement)
                            <tr>
                               <td>{{ $advertisement->id }}</td> 
                               <td>{{ $advertisement->title }}</td> 
                               <td>{{  $advertisement->price }}</td> 
                               <td> <img src="{{ url('images/'.$advertisement->banner) }}"> </td>
                               <td>{{  $advertisement->link}}</td> 
                                <td>
                                    <form class="d-inline-block" action="{{ route('advertisement.destroy',$advertisement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-warning btn-icon-text">
                                        <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                    </a> --}}

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