<x-main-layout>
    <div class="py-5" id="trending">
        <div class="container">
            <h2 class="py-2">{{$category->name}}</h2>
            <div class="row">
                @foreach ($category->products as $product)
                <a style="text-decoration: none" href="{{route('frontend.showProduct',[$category->slug,$product->slug])}}" class="col-md-3 mb-2">
                        <div class="card">
                            <img style="height: 230px; width: 95%;margin: 0 auto" src="{{$product->getImage()}}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{$product->name}}</h5>
                                <span class="float-start"><s>{{$product->regular_price}}</s></span>
                                <span class="float-end">{{$product->selling_price}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</x-main-layout>