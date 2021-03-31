@extends('layouts.frontend')

@section('content')
@section('styles')
<style>
    .cartcolor {
        color: #CC963F;
        font-size: 29px;
        background: transparent;
        border: none;
    }

    .fvtcolor {
        color: #4E8195;
        font-size: 25px;
        background: transparent;
        border: none;
    }
    .btn-icon.btn-xs {
    font-size: 0.75rem;
    width: 1rem;
    height: 1rem;
}

.js-minus{
    background-color: #CC963F;
    color: #ffff
}

.js-plus
{
    background-color:#4E8195;
    color: #ffff
  
}
.product-dropshadow
{
    border-radius: 8px;
    border: 1px solid #e7eaf3 !important;
    -webkit-box-shadow: 10px 0px 0px -5px rgb(226 226 226);
    -moz-box-shadow: 10px 0px 0px -5px rgb(226 226 226));
    box-shadow: 10px 0px 0px -5px rgb(226 226 226);
}

</style>

@endsection
<!-- ========== MAIN CONTENT ========== -->

<!-- Slider Section -->
<div class="mb-5">
    @if(isset($sliders))
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $slider)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="bg-img-hero" style="background-image: url({{asset($slider->banner)}});">
                    <div class="container min-height-420 overflow-hidden">
                        <div class="js-slide bg-img-hero-center">
                            <div class="row min-height-420 py-7 py-md-0">
                                <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                    @if(isset($slider->title))
                                    <h1 class="font-size-64 text-lh-57 font-weight-light"
                                        data-scs-animation-in="fadeInUp">
                                        {{--THE NEW <span class="d-block font-size-55">STANDARD</span>--}}
                                        {{$slider->title}} <span class="d-block font-size-55"></span>
                                    </h1>
                                    @endif
                                    @if(isset($slider->sub_title))
                                    <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="200">{{$slider->sub_title}}
                                    </h6>
                                    @endif
                                    @if(isset($slider->price))
                                    <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="300">
                                        <span class="font-size-13">FROM</span>
                                        <div class="font-size-50 font-weight-bold text-lh-45">
                                            <sup class="">$</sup>{{$slider->price}}
                                            {{--<sup class="">$</sup>749<sup class="">99</sup>--}}
                                        </div>
                                    </div>
                                    @endif
                                    @if($slider->link != "")
                                    <a href="{{$slider->link}}"
                                        class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                        data-scs-animation-in="fadeInUp" data-scs-animation-delay="400">
                                        {{--                                    Start Buying--}}
                                        {{$slider->btn_text}}
                                    </a>
                                    @endif
                                </div>
                                @if($slider->image != "")
                                <div class="col-xl-5 col-6  d-flex align-items-center" data-scs-animation-in="zoomIn"
                                    data-scs-animation-delay="500">
                                    <img class="img-fluid" src="{{asset($slider->image)}}" alt="Image Description">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @endif
</div>

<!-- End Slider Section -->
<div class="container">
    <div class="col-md-12">
        @if(session()->get('success'))
        <div class="alert alert-success mb-3">
            {{ session()->get('success') }}
        </div><br />
        @endif
    </div>
    <div class="col-md-12">
        @if(Session::has('errors'))
        <div class="alert alert-warning">
            {{session('errors')}}
        </div>
        @endif
    </div>
    <!-- Deals-and-tabs -->
    <div class="mb-5">
        <div class="row">
            <!-- Deal -->

            <!-- End Deal -->
            <!-- Tab Prodcut -->
            <div class="col">
                <!-- Features Section -->
                <div class="">
                    <!-- Nav Classic -->
                    <div class="position-relative bg-white text-center z-index-2"
                        style="position: sticky !important;top: 166px;">
                        <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active " id="pills-one-example1-tab" data-toggle="pill"
                                    href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                    aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        Em Destaque
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-two-example1-tab" data-toggle="pill"
                                    href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                    aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        Melhores Promoções
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-three-example1-tab" data-toggle="pill"
                                    href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                    aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        Mais votados
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Classic -->
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">


                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    {{-- <div class="w-100 text-center">
                                            <span class="fa fa-spinner fa-spin fa-3x" id="spinner"></span>
                                        </div> --}}
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-sm">


                                                <img class="img-fluid modal_image">

                                            </div>
                                            <div class="col-sm">
                                                <div>
                                                    <h4 class="modal_name"></h4>
                                                </div>
                                                <b>Category</b> : &nbsp<span class="modal_category"></span>

                                                <div style="color:#FC4A1A">
                                                    <h5 class="modal_price"></h5>
                                                </div>



                                            </div>
                                            <div class="col-sm">
                                                <div class="widget-column">
                                                    <div class="border-bottom border-color-1 mb-5">
                                                        <h3
                                                            class="section-title section-title__sm mb-0 pb-2 font-size-18">
                                                            Other Stores</h3>
                                                    </div>

                                                    <ul class="list-unstyled products-group overflow-auto"
                                                        id="modal_related_products" style="max-height: 200px;">

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                            aria-labelledby="pills-one-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">

                                @foreach($result as $pro)

                                @if (isset( $pro['stores'][0]))
                                <li class="col-lg-3 col-wd-3 col-md-4 product-item">
                                    <div class="border product-dropshadow">

                                        <div class="item__inner px-xl-3 p-3">
                                            <div class="item__body pb-xl-2" id="click" data-toggle="modal" data-target="#myModal">

                                                @if(isset($pro['stores'][0]['website_logo']))
                                                <img class="storeLogo" src="{{asset('product').'/'.$pro['stores'][0]['website_logo']}}"height="30px" width="30px" alt="logo">
                                                @endif
                                                <div class="float-right">
                                                    @if(isset($pro['discount']))
                                                    <span
                                                        class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 ">{{$pro['discount']}}</span>
                                                    @endif
                                                </div>
                                                <div style="height: 380px;">
                                                <div class="mb-2">
                                                    <a  data-id="{{ $pro['id'] }}" class="d-block text-center single-product-ajax"><img style="height: 300px; width:280px" class="img-fluid" src="{{asset('product').'/'.$pro['stores'][0]['image']}}" alt="" ></a>
                                                   <h5 class="mb-5 product-item__title">{{$pro['name']}}</h5>
                                                </div>
                                                
                                                <div class="text-right">
                                                    <div style="color:#CC963F" class="text-gray-100 font-weight-bold h5">
                                                        {{$pro['stores'][0]['price']}}</div>
                                                    <p style="color:#4E8195 ">{{$pro['stores'][0]['unit_price']}}</p>
                                                </div>
                                            </div>
                                            

                                            </div>
                                            
                                            <div class="float-right">
                                                
                                                <div class=" mb-3 pt-3 row">
                                                    <!-- Quantity -->

                                                    
                                                   <div class="col-md-6">
                                                   
                                                    <div class="border rounded-pill border-color-1" >
                                                        <div class="js-quantity row">
                                                            <div class="col pr-0">
                                                                <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1" id="quantity" style="border-radius:4px">

                                                            </div>
                                                            <div class="col-auto pl-2">
                                                                <button
                                                                    class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 d-block"
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
                                                   <div class="col-md-6 px-0">
                                                  
                                                        <div class="pl-3 d-inline-block prodcut-add-cart">
                                                          
                                                                @if (Auth::check())
                                                                <input type="hidden" name="product_id" class="product_id"
                                                                    value="{{$pro['id']}}">
                                                                <input type="hidden" id="hiddenqty" name="quantity">

                                                                <button type="button" class="cartcolor ajaxCart" id="getqty"><i
                                                                        class="ec ec-add-to-cart"></i></button>

                                                                @else
                                                                <a data-toggle="modal" data-target="#myModals"
                                                                    style="margin-bottom: 14%"> <i
                                                                        style="margin-bottom:14%"
                                                                        class="ec ec-add-to-cart cartcolor"></i></a>
                                                                @endif
                                                          
                                                        </div>


                                                        <div class="pl-5 d-inline-block prodcut-add-cart">

                                                            <form action="{{ route('wishlist.store') }}" method="POST">
                                                                @csrf
                                                                @if (Auth::check())
                                                                <input type="hidden" name="product_id"
                                                                    value="{{$pro['id']}}">
                                                                <button class="fvtcolor" type="submit"><i
                                                                        class="ec ec-favorites"></i></button>
                                                                @else
                                                                <a c data-toggle="modal" data-target="#myModals"><i
                                                                        class="ec ec-favorites fvtcolor"></i></a>
                                                                @endif
                                                            </form>
                                                        </div>
                                                   
                                                   </div>
                                                </div>
                                            </div>
                                     
                                        </div>
                                    </div>
                                </li>
                                @endif


                                @endforeach

                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                            aria-labelledby="pills-two-example1-tab">
                            <ul class="row list-unstyled products-group no-gutters">

                                {{-- @foreach($discounted as $pro)
                                    <li class="col-lg-2 col-wd-3 col-md-4 col-offset-1 product-item">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2" id="click" data-toggle="modal" data-target="#myModal">
                                                    <!-- <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div> -->
                                                    <input type="hidden" class="link-value" name="" value="{{$pro['product_link']}}">

                                @if(isset($pro['logo']))
                                <img class="img-fluid" src="images/{{$pro['logo']}}" height="30px" width="30px"
                                    alt="logo">
                                @endif
                                <div class="float-right">
                                    <span
                                        class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 ">{{$pro['discount']}}</span>
                                </div>
                                <div class="mb-2">
                                    <a class="d-block text-center"><img class="img-fluid" src="{{$pro['image']}}"
                                            alt=""></a>
                                    <h5 class="mb-1 product-item__title">{{$pro['name']}}</h5>
                                </div>

                                <div class="text-right">
                                    <div class="text-gray-100">€{{$pro['price']}}</div>
                                    <p>{{$pro['unit']}}</p>
                                </div>

                        </div>
                        <div class="product-item__footer">

                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="{{route('product_cart')}}?link={{urlencode($pro['product_link'])}}&price={{urlencode($pro['price'])}}&name={{urlencode($pro['name'])}}&image={{urlencode($pro['image'])}}&discount={{urlencode($pro['discount'])}}&unit={{urlencode($pro['unit'])}}&logo={{urlencode($pro['logo'])}}"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-add-to-cart"></i></a>
                                </div>
                                <div class="d-none d-xl-block prodcut-add-cart">
                                    <a href="{{route('store_product')}}?link={{urlencode($pro['product_link'])}}&price={{urlencode($pro['price'])}}&name={{urlencode($pro['name'])}}&image={{urlencode($pro['image'])}}&discount={{urlencode($pro['discount'])}}&unit={{urlencode($pro['unit'])}}&logo={{urlencode($pro['logo'])}}"
                                        class="btn-add-cart btn-primary transition-3d-hover"><i
                                            class="ec ec-favorites"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                @endforeach --}}

                </ul>
            </div>
            {{-- <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters">
                                    @foreach($carts as $pro)
                                    <li class="col-lg-2 col-wd-3 col-md-4 col-offset-1 product-item">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2" id="click" data-toggle="modal" data-target="#myModal">
                                              
                                                    @if($pro['logo'] != "")
                                                    <img class="img-fluid" src="images/{{$pro['logo']}}" height="30px"
            width="30px" alt="logo">
            @endif
            <div class="float-right">
                <span
                    class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 ">{{$pro['discount']}}</span>
            </div>
            <div class="mb-2">
                <a class="d-block text-center"><img class="img-fluid" src="{{$pro['image']}}" alt=""></a>
                <h5 class="mb-1 product-item__title">{{$pro->products[0]['product_name']}}</h5>
            </div>

            <div class="text-right">
                <div class="text-gray-100">{{$pro->products}}</div>
                <p>{{$pro['unit']}}</p>
            </div>

        </div>
        <div class="product-item__footer">

            <div class="border-top pt-2 flex-center-between flex-wrap">
                <div class="d-none d-xl-block prodcut-add-cart">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        @if (Auth::check())
                        <input type="hidden" name="product_id" value="{{$pro['id']}}">
                        <button class="btn-add-cart btn-primary transition-3d-hover" type="submit"><i
                                class="ec ec-add-to-cart"></i></button>

                        @else
                        <a href="{{route('login')}}" class="btn-add-cart btn-primary transition-3d-hover"><i
                                class="ec ec-add-to-cart"></i></a>
                        @endif
                    </form>
                </div>

                <div class="d-none d-xl-block prodcut-add-cart">
                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        @if (Auth::check())
                        <input type="hidden" name="product_id" value="{{$pro['id']}}">
                        <button class="btn-add-cart btn-primary transition-3d-hover" type="submit"><i
                                class="ec ec-favorites"></i></button>

                        @else
                        <a href="{{route('login')}}" class="btn-add-cart btn-primary transition-3d-hover"><i
                                class="ec ec-favorites"></i></a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</li>
@endforeach
</ul>
</div> --}}
</div>
<!-- End Tab Content -->
</div>
<!-- End Features Section -->
</div>
<!-- End Tab Prodcut -->
</div>
</div>
<!-- End Deals-and-tabs -->
</div>

<div class="container">

    
    <!-- Full banner -->
        <div class="mb-6">
            @foreach ($adds as $item)
            {{-- assets/img/1400X206/img1.jpg --}}
            <a href="#" class="d-block text-gray-90">
                <div class="" style="background-image: url('{{asset('images/'.$item->banner)}}">
                    <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                        <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                            <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">
                                {{-- SHOP AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS --}}
                              <a href="{{ $item->link }}" target="_blank">{{ $item->title }}</a>
                            </h1>
                            
                            <div class="ml-5 flex-content-center flex-shrink-0">
                                <div class="bg-primary rounded-lg px-6 py-2">
                                    <em class="font-size-14 font-weight-light">STARTING AT</em>
                                    <div class="font-size-30 font-weight-bold text-lh-1">
                                        <sup class="">$</sup>{{ $item->price }}<sup class=""></sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    <!-- End Full banner -->

</div>


<!-- Modal -->
<div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">
                <form class="js-validate" novalidate="novalidate" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrEmailExample3">Username or Email address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="signinSrEmailExample3"
                            placeholder="Username or Email address" aria-label="Username or Email address" required
                            data-msg="Please enter a valid email address." data-error-class="u-has-error"
                            data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrPasswordExample2">Password <span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="signinSrPasswordExample2"
                            placeholder="Password" aria-label="Password" required
                            data-msg="Your password is invalid. Please try again." data-error-class="u-has-error"
                            data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->
                    <div class="js-form-message mb-3">
                        <div class="custom-control custom-checkbox d-flex align-items-center">
                            <input type="checkbox" class="custom-control-input" id="rememberCheckbox"
                                name="rememberCheckbox" data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            <label class="custom-control-label form-label" for="rememberCheckbox">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <!-- End Checkbox -->


                    <!-- Button -->
                    <div class="mb-1">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary-dark-w px-5 ">Login</button>
                        </div>
                        <div class="mb-2">
                            <a class="text-blue" href="{{url('my-account')}}">Register now</a>
                        </div>
                        <div class="mb-2">
                            <a class="text-blue" href="#">Lost your password?</a>
                        </div>
                    </div>
                    <!-- End Button -->
                    <a href="login/google" class="btn btn-primary border-light lift btn-sm"> <img
                            src="https://img.icons8.com/color/16/000000/google-logo.png" alt=""
                            class="mr-3">{{ __('Continue with Google') }}</a>
                    <br> <br>
                    <a href="login/facebook" class="btn btn-primary  border-light lift btn-sm"> <img
                            src="assets\img\facebook-logo.png" alt="" height="20px" width="20px"
                            class="mr-3">{{ __('Continue with Facebook') }}</a>

                </form>
            </div>

        </div>
    </div>
</div>
</div>


@endsection


@section('scripts')

<script>
    $(".single-product-ajax").click(function (ev) {
        $('#myModal .container').hide();
        $.ajax({
            /* the route pointing to the post function */
            url: '{{ url('api/get-product-details') }}' + '/' + $(this).attr('data-id'),
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_url: $(this).find('.link-value').val(),
            },
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) {

                // console.log(data);

                $('#myModal .container').show();

                let product = data;
                let product_name = product['name'];
                let product_category = product['category'];

                let stores = product['stores'];
                let price = stores[0]['price'];
                let image = stores[0]['image'];

              

                let stores_html = "";

                for (var i = 0; i < stores.length; i++) {

                    stores_html += `<li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                                                                <div class="col-auto">
                                                                    <a href="" class="d-block width-75 text-center"><img class="img-fluid" src="product/${stores[i]['website_logo']}" alt="Image Description" height="40px" width="40px"></a>
                                                                </div>
                                                                <div class="col pl-4 d-flex flex-column">

                                                                        <div class="font-size-15">
                                                                            ${stores[i]['price']}</div>
                                                                            <div class="font-size-15">
                                                                             
                                                                            </div>
                                                                </div>
                                                            </li>`;
                }

                $('#modal_related_products').html(stores_html);


                $('.modal_name').text(product_name);
                //  console.log(data[0]['name']);
                // $('.modal_unit').text(data['unit']),
                $('.modal_price').text(price);
                $('.modal_category').text(product_category);
                // $('.modal_description').text(data['description']),
                $('.modal_image').attr('src', 'product/' + image);
            }
        });

    });

    $("#getqty").click(function () {
        //Get
        var qty = $('#quantity').val();
        //Set
        var hidden = $('#hiddenqty').val(qty);

    });


    $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
            $(".ajaxCart").click(function(){
              
                let element  = $(this).closest('.product-item');
                var product_id = $(this).closest('.prodcut-add-cart').find('.product_id').val();
                let product_details = {
                    name: element.find('.product-item__title').text(),
                    price: element.find('.text-gray-100.font-weight-bold.h5').text(),
                    image: element.find('.img-fluid').attr('src'),
                    pro_id: product_id,
                    storeLogo: element.find('.storeLogo').attr('src'),
                };
                console.log(product_details.price)
                let cart_element = `
            <ul class="list-unstyled row mx-n2">
                <li class="px-2 col-auto">
                    <img class="img-fluid" height="70px" width="70px" src="${product_details.image}" alt="Image Description">
                </li>
                <li class="px-2 col">
                    <h5 class="text-blue font-size-14 font-weight-bold">
                        ${product_details.name.substring(0,19)}</h5>
                    <div class="row">
                        <div class="col-sm-3">
                            <span class="proPrice font-size-14">${product_details.price}</span>
                        </div>
                        <div class="col-sm-8">
                            <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1 mr-0" style="float: right;padding:0 !important">
                                <div class="js-quantity row align-items-center">
                                    <div class="col">
                                        <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1" id="1">
                                    </div>
                                    <div class="col-auto pr-1">
                                        <button class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0 d-block" id="sub">
                                            <small class="fas fa-minus btn-icon__inner"></small>
                                        </button>
                                        <button class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" id="add">
                                            <small class="fas fa-plus btn-icon__inner"></small>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="px-2 col-auto">
                    <img class="img-fluid" src="${product_details.storeLogo}" alt="Image Description" height="25px" width="25px">
                    <button type="button" class="delete-cart-product" data-id="${product_details.pro_id}" style="background:transparent;border:none">
                        <i class="ec ec-close-remove"></i>
                    </button>
                </li>
            </ul><br>`;
                
                
                
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{ url('cart') }}",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val(),
                    product_id: product_id,
                },
                   
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status=='success'){
                            let counter = $('#counterID')
                            let price = $('#sumPrice')
                            let cartSum = $('#cartSum')

                        price.text('€' + (parseFloat(product_details.price.replace('€', '').replace(',', '.')) + parseFloat(price.text().replace('€', '').replace(',', '.'))).toFixed(2)  )
                         
                            counter.text(Number(counter.text())+1)
                            $('#cart-main-top').append(cart_element);
                            
                            cartSum.text(price.text()) 
                  }
                    }
                }); 
            });
       });    


       $(document).on("click", ".delete-cart-product", function() {         
        let price = $('#sumPrice');
        const element = $(this)
        // console.log(parseFloat($(this).closest('ul').find('span.font-size-14').text().replace('€', '')).toFixed(2));
        // console.log(parseFloat(price.text().replace('€', '').replace(',', '.')));
        // console.log((parseFloat(price.text().replace('€', '').replace(',', '.')) - (parseFloat($(this).closest('ul').find('span.font-size-14').text().replace('€', '').replace(',', '.')) ).toFixed(2)).toFixed(2))
        
        
        let url = '{{ url('cart') }}' + '/' + $(this).attr('data-id');

		$.ajax({
            url,
			type: "DELETE",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(data){
                if(data.status=='success'){
					element.closest('ul').hide();
                    let counter = $('#counterID')
                    let price = $('#sumPrice');
                    let cartSum = $('#cartSum')
                    let cartPrice = element.closest('ul').find('.proPrice').text()
                    // console.log(parseFloat(cartPrice.replace('€', '').replace(',', '.')));
                    // console.log($(this).closest('ul'))
                    
                    // console.log($(this).parent().closest('ul'))
                    // console.log($(this).closest('.list-unstyled'),$(this).parents('.list-unstyled').attr('id'))
                    // console.log(parseFloat())
                    // console.log(console.log((parseFloat(price.text().replace('€', '').replace(',', '.')) - (parseFloat($(this).closest('ul').find('span.font-size-14').text().replace('€', '').replace(',', '.')) ).toFixed(2)).toFixed(2)));
                    // console.log(parseFloat(price.text().replace('€', '').replace(',', '.')).toFixed(2));
                    console.log(price.text('€' + (parseFloat(price.text().replace('€', '').replace(',', '.')) - (parseFloat(cartPrice.replace('€', '').replace(',', '.')) ).toFixed(2)).toFixed(2)))
                    counter.text(Number(counter.text())-1)
                    cartSum.text(price.text()) 
				}
			}
		});
	});
</script>

@endsection
