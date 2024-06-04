<x-main-layout>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / <a class="text-black" href="{{route('frontend.categoryProducts',$product->category->slug)}}">{{$product->category->name}}</a> / {{$product->name}}</h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{$product->getImage()}}" class="w-100" alt="Produt Image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$product->name}}
                            @if($product->trending)
                            <label style="font-size: 16px;" class="float-end badge text-bg-danger">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Original price : <s>{{$product->regular_price}}</s></label>
                        <label class="fw-bold">Selling price : {{$product->selling_price}}</label>
                        <p class="mt-3">
                            {{ @$product->small_description }}
                        </p>
                        <hr>
                        <label class="badge text-bg-{{$product->inStock() ? 'success' : 'danger'}}">{{$product->inStock() ? 'In Stock' : 'Out of Stock'}}</label>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{$product->id}}" class="product_id">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span style="cursor: pointer" class="input-group-text" id="decrement-btn">-</span>
                                    <input type="text" id="qty-input" name="quntity" value="1" class="form-control">
                                    <span style="cursor: pointer" class="input-group-text" id="increment-btn">+</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <div>
                                    <a class="btn btn-success me-3 float-start" href="">Add to Wishlist</a>
                                    <button id="addToCartBtn" class="btn btn-primary me-3 float-start">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#addToCartBtn').click(function (e) { 
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('#qty-input').val();
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                type: "POST",
                url: '{{ route('carts.store') }}',
                data: {
                    'product_id' : product_id,
                    'quantity' : quantity,
                },
                success: function (response) {
                    alert(response.message);
                  console.log(response.message);  
                }
            });
            
        });
      
        $('#increment-btn').click(function (e) { 
            e.preventDefault();
            var inc_value = $('#qty-input').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            if(value < 10) {
                value++;
                $('#qty-input').val(value);
            }
        });
        $('#decrement-btn').click(function (e) { 
            e.preventDefault();
            var inc_value = $('#qty-input').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            if(value > 1) {
                value--;
                $('#qty-input').val(value);
            }
        });
    </script>


</x-main-layout>