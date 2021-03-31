


@extends('layouts.frontend')

@section('content')
 

    {{-- Blog Part --}}
    <div class="container">
        <div class="row" style="margin-top:20%">   
            <div class="col-xl-9 col-wd">
                <div class="min-width-1100-wd">
                    <h5>Recipe By Category</h5>
                    <hr>
                    @foreach ($singleblog  as $item)
                    <article class="card mb-13 border-0">
                        <div class="row">
                           
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <a  class="d-block"><img class="img-fluid min-height-250 object-fit-cover" src="{{ asset('images/'.$item->image) }}" alt="Image Description"></a>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body p-0">
                                  
                                    <h4 class="mb-3"><a >{{ $item->title }}</a></h4>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                            <a href="{{ route('singlepage' ,$item->id )}}" class="mx-0dot5 text-gray-5">{{ @$item->recipecategory->name }},</a>
                                           
                                            <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                            {{-- {{ Auth::user()->name }} --}}
                                            <a href="{{ route('singlepage' ,$item->id )}}" class="mx-0dot5 text-gray-5">{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</a>
                                        </div>
                                    </div>
                                    <p>{!! $item->description !!}</p>
                                    <div class="flex-horizontal-center">
                                        <a href="{{ route('singlepage' ,$item->id )}}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
  
                                    </div>
                                   
                                   
                                </div>
                            </div>
                           
                        </div>
                    </article>
                    @endforeach
               


@endsection