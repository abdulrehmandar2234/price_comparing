@extends('layouts.frontend')

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


@section('content')

<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Smart Phones & Tablets</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                
                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>

                        <!-- Checkboxes -->
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                <label class="custom-control-label" for="brandAdidas">Filter
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandNewBalance">
                                <label class="custom-control-label" for="brandNewBalance">Filter
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandNike">
                                <label class="custom-control-label" for="brandNike">Filter
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandFredPerry">
                                <label class="custom-control-label" for="brandFredPerry">Filter
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brandTnf">
                                <label class="custom-control-label" for="brandTnf">Filter
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                </label>
                            </div>
                        </div>
                        <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        <div class="collapse" id="collapseBrand">
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandGucci">
                                    <label class="custom-control-label" for="brandGucci">Filter
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span>
                                    </label>
                                </div>
                            </div>
                         
                        </div>
                        <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
                            <span class="link__icon text-gray-27 bg-white">
                                <span class="link__icon-inner">+</span>
                            </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>
                   
                </div>
               
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <div class="d-block d-md-flex flex-center-between mb-3">
                    <h3 class="font-size-25 mb-2 mb-md-0">Search Results</h3>
                    {{-- <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p> --}}
                </div>

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
                
                                           
                                            <img class="img-fluid modal_image" >
                                          
                                        </div>
                                          <div class="col-sm">
                                         <div>  <h4 class="modal_name" ></h4>  
                                        </div> 
                                        <b>Category</b> : &nbsp<span class="modal_category"></span> 
                                       
                                        <div style="color:#FC4A1A"> <h5 class="modal_price"></h5></div> 
                
                                          
                                           
                                          </div>
                                          <div class="col-sm">
                                            <div class="widget-column">
                                                <div class="border-bottom border-color-1 mb-5">
                                                    <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Other Stores</h3>
                                                </div>
                                                <ul class="list-unstyled products-group" id="modal_related_products">
                                                    
                                                 
                                                </ul>
                                            </div>
                                          </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
                
                
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">


                            @foreach($products as $pro)

                            
                            <li class="col-lg-4 col-wd-3 col-md-4 product-item">
                                <div class="border product-dropshadow">

                                    <div class="item__inner px-xl-3 p-3">
                                        <div class="item__body pb-xl-2" id="click" data-toggle="modal" data-target="#myModal">

                                            @if(isset($pro->website->website_logo))
                                            <img class="storeLogo" src="{{asset('product').'/'.$pro->website->website_logo}}"height="30px" width="30px" alt="logo">
                                            @endif
                                            <div class="float-right">
                                                @if($pro->discount_percentage > 0)
                                                    <span
                                                        class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 ">{{$pro->discount_percentage}}</span>
                                                    @endif
                                            </div>
                                            <div style="height: 380px;">
                                            <div class="mb-2">
                                                <a  data-id="{{ $pro->id }}" class="d-block text-center single-product-ajax"><img style="height: 300px; width:280px" class="img-fluid" src="{{asset('product').'/'.$pro->image}}" alt="" ></a>
                                                <h5 class="mb-5 product-item__title">{{$pro->title}}</h5>
                                            </div>
                                            
                                            <div class="text-right">
                                                <p style="color:#CC963F" class="text-gray-100 font-weight-bold h5">
                                                    {{$pro->price}}</p>
                                                {{-- <p style="color:#4E8195 ">{{$pro->unit_price}}</p> --}}
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
                                                        value="{{$pro->id}}">
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
                                                        value="{{$pro->id}}">
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
                            


                            @endforeach

                           
                        </ul>
                    </div>
                </div>
             
                <!-- End Shop Pagination -->
            </div>
        </div>
        <!-- Brand Carousel -->
        
        <!-- End Brand Carousel -->
    </div>
</main>


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

                //   <b>   ${stores[i]['updated']} </b>

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
