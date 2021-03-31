@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="role">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sliders</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('slider.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Slider
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
                <h6 class="card-title">Slider</h6>
                <p class="card-description">All the sliders are listed here.</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Banner
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Sub Title
                                </th>
                                <th>
                                    Product Link
                                </th>
                                
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $key => $slider)
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $slider->banner }}
                                </td>
                                <td>
                                    {{ $slider->image }}
                                </td>
                                <td>
                                    {{ $slider->title }}
                                </td>
                                <td>
                                    {{ $slider->sub_title }}
                                </td>
                                <td>
                                    {{ $slider->link }}
                                </td>
                             

                                <td>
                                    <form class="d-inline-block" action="{{ route('slider.destroy',$slider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-warning btn-icon-text">
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