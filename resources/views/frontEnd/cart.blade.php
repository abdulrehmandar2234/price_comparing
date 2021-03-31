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
                        <div class="my-6">
                            <h1 class="text-center">My cart</h1>
                        </div>
                        <div class="mb-16 wishlist-table">
                      
                                <div class="table-responsive">
                                    <table class="table" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-id">#</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product</th>
                                                <!-- <th class="product-price">Lowest Cost</th> -->
                                                <th class="product-Stock w-lg-15">Prices</th>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach($carts as $key => $crt)
                            <tr>
                                    <td data-title="Product-id">
                                        <a href="#" class="text-gray-90">{{++$key}}</a>
                                    </td>

                                    <td class="d-none d-md-table-cell">
                                        {{-- <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{$wish['image']}}" alt="Image Description"></a> --}}
                                    </td>

                                    <td data-title="Product">
                                        <a href="#" class="text-gray-90">{{$crt->product->product_name}}</a>
                                    </td>

                                    <td data-title="Price">
                                        <span class="">{{$crt->product->product_links[0]['product_price']}}</span>
                                        
                                    </td>

                                    
                                    <td>
                                        <form action="{{route('wishlist.destroy', $crt['id'])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-wd">
                    <aside class="mb-7">
                        <div class="border-bottom border-color-1 mb-5 mt-6">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">TROCAR DE SUPERMERCADO</h3>
                        </div>
                        <article class="mb-4">
                            @foreach($cart[0]['stores'] as $pro) 
                            
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img  src="{{asset('product').'/'.$pro['website_logo']}}" alt="Image Description" height="50px" width="60px">
                                </div>
                                <div class="media-body">
                                   
                                        <ins class="font-size-15 text-red text-decoration-none d-block">{{ $pro['price'] }}</ins>
                                </div>
                            </div>
                            @endforeach 

                            <hr>
                            
                            <div>
                                <ins  class="font-size-15 text-red text-decoration-none d-block pl-17"> 
                                    <span><b>Total</b>  <b>{{ $sum }} €</b></span>
                                   </ins>
                            </div>
                            <hr>
                        </article>

                </div>
            </div>
          
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
