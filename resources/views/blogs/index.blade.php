@extends('layouts.frontend')

@section('content')

    {{-- Blog Part --}}
   
                    

    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
           
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-wd">
                    <div class="max-width-1100-wd">
                        <div class="row">
                       
                            
                            @foreach ($blogs as $item)

                            <div class="col-lg-4">
                                <article class="card mb-13 border-0 mt-8">
                                    <div class="js-slick-carousel u-slick overflow-hidden"
                                        data-pagi-classes="js-pagination u-slick__pagination u-slick__pagination--long u-slick__pagination--hover mb-0">
                                        <div class="js-slide">
                                            <a href="{{ route('singlepage' ,$item->id )}}"  class="d-block"><img class="img-fluid"  src="{{asset('images/'.$item->image)  }}" alt="Image Description"></a>
                                        </div>
                                     
                                    </div>
                                    <div class="card-body pt-5 pb-0 px-0">
                                        <h4 class="mb-3"><a href="{{ route('singlepage' ,$item->id )}}">{{ $item->title }}</a></h4>
                                        <div class="mb-3">
                                            <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                <a href="#" class="mx-0dot5 text-gray-5">{{ @$item->recipecategory->name }},</a>
                                                <a href="#" class="mx-0dot5 text-gray-5">{{  \Carbon\Carbon::parse($item->start_date)->diffForhumans()  }}</a>
                                            </div>
                                        </div>
                                        <p>{!! $item->description !!}</p>
                                        <div class="flex-horizontal-center">
                                            <a href="{{ route('singlepage' ,$item->id )}}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
                                           
                                        </div>
                                    </div>
                                </article>
                                
                            </div>

                            @endforeach
                                            
                        
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-wd">
                    
                    <aside class="mb-7" style="margin-top:40px">
                        <div>
                           @foreach ($adds as $item)
                           <a href="{{ $item->link }}" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="{{asset('images/'.$item->banner)}}" alt="Image Description">
                        </a>
                           @endforeach
                        </div>
                    </aside>
                    <aside class="mb-7">
                    
                        <div class="border-bottom border-color-1 mb-5 mt-6">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Recipe Category</h3>
                        </div>
                        
                        <article class="mb-4">
                            @foreach ($recipecategories as $item)
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img class="img-fluid object-fit-cover" src="{{url('product/'.$item->image)  }}" alt="Image Description" width="100" height="50">
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1">
                                        <a href="{{ route('categoryposts',$item->id) }}" class="text-gray-39" >
                                            {{ $item -> name }}    
                                        </a>
                                </div>
                            </div>
                            @endforeach
                        </article>

                </div>
            </div>
          
        </div>
    </main>

@endsection