@extends('layouts.frontend')


@section('content')



<div class="container" style="margin-top:15%">
    <div class="row">
        <div class="col-xl-9 col-wd">
            <div class="min-width-1100-wd">


                <article class="card mb-8 border-0">
                    <div class="d-block d-md-flex flex-center-between mb-4 mb-md-0">
                        <h1 class="mb-md-3 mb-1">{{ $posts->title }} </h1>
                    </div>
                    <p><strong>{!! $posts->description !!}</strong></p>
                    By <b>{{ $posts->users->name }}</b>
                    <div class="mb-3 pb-3 ">
                        <div
                            class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                            <a href="../blog/single-blog-post.html"
                                class="mx-0dot5 text-gray-5">{{ @$posts->recipecategory->name }}</a>
                            </span>
                            <a href="../blog/single-blog-post.html"
                                class="mx-0dot5 text-gray-5">{{ \Carbon\Carbon::parse($posts->created_at)->diffForhumans() }}</a>
                        </div>
                    </div>



                    <img class="img-fluid" src="{{asset ('images/' .$posts->image)}}" alt="Image Description">
                    <div class="card-body pt-5 pb-0 px-0">
                        <div class="row">
                            <div class="col-6">
                                <h5>Serving <span class="badge badge-secondary" id="">{{ $posts->serving }}</span></h5>
                            </div>
                            <div class="col-6">
                                <!-- Quantity -->
                                <div class="border rounded-pill  width-122 w-xl-80 border-color-1 mr-0"
                                    style="border-radius: 4px !important;float: right;padding: 3px !important;display: block !important;width: 130px !important;border: 1px solid #ccc !important;">
                                    <div class="js-quantity row px-5">
                                        <div class="col">
                                            <div class="row">
                                                <input
                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="number" id="qty" min="1" value="1">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <button
                                                class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                id="sub">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </button>
                                            <button
                                                class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                id="add">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                        </div>



                    </div><br>
                    <div class="card offset-9" style="width: 54rem;margin-left: 10px;">
                       
                        <!-- Generator: Adobe Illustrator 19.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg class="offset-10" version="1.1" id="Capa_1" height="30px"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 41.301 41.301" style="enable-background:new 0 0 41.301 41.301;"
                            xml:space="preserve">
                            <path style="fill:#1E201D;"
                                d="M20.642,0c5.698,0,10.857,2.317,14.602,6.047c3.73,3.746,6.047,8.905,6.047,14.603
                                c0,5.698-2.317,10.857-6.047,14.603c-3.746,3.73-8.904,6.047-14.602,6.047S9.786,38.983,6.056,35.253
                                C2.31,31.507,0.008,26.349,0.008,20.65c0-5.698,2.301-10.857,6.047-14.603C9.786,2.317,14.944,0,20.642,0L20.642,0z M31.166,19.523
                                c0.619,0,1.111,0.508,1.111,1.127c0,0.619-0.492,1.127-1.111,1.127H20.674h-0.032c-0.413,0-0.778-0.238-0.968-0.571l-0.016-0.016
                                l0,0l-0.016-0.032l0,0v-0.016l0,0l-0.016-0.032l0,0l-0.016-0.032l0,0v-0.016l0,0l-0.016-0.032l0,0l-0.016-0.016l0,0v-0.032l0,0
                                l-0.016-0.032l0,0v-0.016l0,0l-0.016-0.032l0,0v-0.032l0,0v-0.016v-0.016l-0.016-0.016l0,0v-0.032l0,0v-0.032l0,0V20.73l0,0v-0.016
                                l0,0v-0.032l0,0V20.65l0,0V7.206c0-0.619,0.492-1.111,1.111-1.111c0.619,0,1.127,0.492,1.127,1.111v12.317H31.166z M33.657,7.635
                                c-3.333-3.333-7.936-5.381-13.015-5.381S10.96,4.301,7.627,7.635C4.31,10.968,2.246,15.571,2.246,20.65
                                c0,5.079,2.063,9.682,5.381,13.016c3.333,3.333,7.936,5.381,13.015,5.381s9.682-2.048,13.015-5.381
                                c3.333-3.333,5.397-7.936,5.397-13.016C39.054,15.571,36.991,10.968,33.657,7.635L33.657,7.635z" />
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>

                        <div class="card-body">
                            <h6 class="card-title">Pre: <b>{{ $specificIngredients->preparation_time }}</b></h6>
                            <h6 class="card-title">Cook: <b>{{ $specificIngredients->cooking_time }}</b> </h6>
                            <h6 class="card-title">Total: <b>{{ $specificIngredients->preparation_time }}</b></h6>
                            <h6 class="card-title">Servings: <b>{{ $specificIngredients->serving }}</b></h6>
                        </div>
                        <p class="card-title text-center"><u>Nutrition Info</u></p>
                    </div>
                </article>




                <fieldset class="ingredients-section__fieldset">


                    <legend class="visually-hidden ingredients-section__legend">
                        Ingredient Checklist
                    </legend>


                    <form action="{{ route('addproduct') }}" method="post">
                        @csrf
                        {{-- {{ dd($specificIngredients) }} --}}
                        @foreach ($specificIngredients->products as $item)

                        <ul class="ingredients-section">

                            <label class="checkbox-list">
                                <input type="checkbox" value="">

                                <span class="ingredients-item-name">
                                    &nbsp;
                                    <span class="rep_qty">{{ $item->pivot['quantity'] }}</span>
                                    <input type="text" id="quantity" value="{{ $item->pivot['quantity'] }}" name="quantity" hidden>
                                  
                                  
                                    <input  type="text" hidden value="1" name="quantity">

                                      <input type="text" hidden value="{{ $item->pivot['product_id'] }}" name="product_id">
                                    {{ $item['product_name'] }}

                                </span>
                            </label>

                        </ul>

                        @endforeach
                        
                       
                        @if (Auth::check())
                        <button class="btn btn-primary text-white" type="submit">Add all ingredients</button>
                        @else
                        <a style="margin-left: 5%"  data-toggle="modal" data-target="#myModals"
                        class="btn btn-outline-primary btn-sm ">Add all ingredients</a>
                        @endif

                    </form>




                </fieldset>





            </div>
        </div>
        <div class="col-xl-3 col-wd">



            <aside class="mb-7">
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Advertisement</h3>
                </div>
                {{-- @foreach ($latest as $item)
                    <article class="mb-4">
                        <div class="media">
                            <div class="width-75 height-75 mr-3">
                                <img class="img-fluid object-fit-cover" src="{{url ('images/' .$item->image)}}"
                alt="Image Description">
        </div>
        <div class="media-body">
            <h4 class="font-size-14 mb-1"><a href="#" class="text-gray-39">{{ $item->title }}</a></h4>
            <span class="text-gray-5">{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</span>
        </div>
    </div>
    </article>
    @endforeach --}}



    </aside>



</div>
<br>
{{-- <div >
               <button class="btn btn-primary text-white">Add all ingredients</button>
           </div> --}}
</div>
<!-- Brand Carousel -->

<!-- End Brand Carousel -->
</div>


@endsection

@section('scripts')

<script>
    // Add - Btn .rep_qty -> span qtty -> input
    $(document).on("click", "#add", function () {

        $('.rep_qty').each(function () {

            $(this).text(Number($(this).text()) * Number($("#qty").val()))
        });
        // $("#quantity").val(Number($("#qty").val()));
    
        // console.log($("#quantity").val(Number($(this).text()) * Number($("#qty").val()));
        $("#serving").text($("#qty").val());
    });
    $(document).on("click", "#sub", function () {

        $('.rep_qty').each(function () {

            $(this).text(Number($(this).text()) / (Number($("#qty").val()) + 1))
        });
        $("#serving").text($("#qty").val());
    });

</script>



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-601bd7244a3bb236"></script>



@endsection
