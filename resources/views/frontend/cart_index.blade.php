<x-main-layout>
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <h4 class="p-2">Cart Items</h4>
                @php
                    $total = 0;
                @endphp
            <div class="card-body">
                @forelse ($cartItems as $item)
                <div class="row d-flex align-items-center product_data">
                    <div class="col-md-2">
                        <img src="{{$item->product->getImage()}}" alt="Product Image" width="80px" height="70px">
                    </div>
                    <div class="col-md-5">
                        <h3>{{$item->product->name}}</h3>
                        <small>{{$item->product->selling_price}} TK</small>
                    </div>
                    <div class="col-md-3">
                    @if ($item->quantity > $item->product->qty)
                    <span class="text-danger">Out of stock</span>
                    @else
                        <input type="hidden" value="{{$item->product->id}}" class="product_id">
                        <label for="quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 120px">
                            <span style="cursor: pointer" class="input-group-text chagneQty decrement-btn">-</span>
                            <input type="text" name="quntity" value="{{$item->quantity}}" class="form-control qty-input">
                            <span style="cursor: pointer" class="input-group-text chagneQty increment-btn">+</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger remove-btn">Remove</button>
                    </div>
                </div>
                @php
                    $total += $item->product->selling_price * $item->quantity;
                @endphp
                @empty
                <div class="text-center text-secondary">No cart item added yet.</div>
                @endforelse
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <h5>Total price : {{$total}} BDT</h5>
                <a href="{{route('checkout.index')}}" class="btn btn-primary">Add to checkout</a>
            </div>
        </div>
    </div>
</div>

<script>
  
    $('.increment-btn').click(function (e) { 
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value)
        }
    });
    $('.decrement-btn').click(function (e) { 
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value)
        }
    });
    $('.remove-btn').click(function (e) { 
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajax({
                headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                type: "DELETE",
                url: "/carts/"+product_id,
                success: function (response) {
                    alert(response.message);
                    window.location.reload();
                  console.log(response.message);  
                }
            });
    });
    $('.chagneQty').click(function (e) { 
        e.preventDefault();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajax({
                headers: {
                            'X-CSRF-TOKEN': "{{csrf_token()}}",
                        },
                type: "PUT",
                data: {
                    // 'product_id' : product_id,
                    'quantity' : quantity,
                },
                url: "/carts/"+product_id,
                success: function (response) {
                    // alert(response.message);
                    window.location.reload();
                  console.log(response.message);  
                }
            });
        
    });
</script>

</x-main-layout>