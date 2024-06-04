<x-main-layout>
    <div>
        @include('frontend.partials.slider')
    </div>
    <div class="py-5" id="trending">
        <div class="container">
            <h2 class="py-2">Featured Products</h2>
            <div class="row">
                <div class="owl-carousel trending-carousel owl-theme">
                    @foreach ($trending_products as $trending_product)
                    <a style="text-decoration: none" href="{{route('frontend.showProduct',[$trending_product->category->slug,$trending_product->slug])}}" class="item">
                        <div class="card">
                            <img style="height: 230px; width: 95%;margin: 0 auto" src="{{$trending_product->getImage()}}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{$trending_product->name}}</h5>
                                <span class="float-start"><s>{{$trending_product->regular_price}}</s></span>
                                <span class="float-end">{{$trending_product->selling_price}}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="py-2" id="trending_category">
        <div class="container">
            <h2 class="py-2">Trending Categories</h2>
            <div class="row">
                <div class="owl-carousel trending-carousel owl-theme">
                    @foreach ($trending_categories as $trending_category)
                        <a style="text-decoration: none" href="{{route('frontend.categoryProducts',$trending_category->slug)}}" class="item">
                            <div class="card">
                                <img style="height: 230px; width: 95%;margin: 0 auto" src="{{$trending_category->getImage()}}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$trending_category->name}}</h5>
                                    <span>{{$trending_category->description}}</span>
                                </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.trending-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots: false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
})
    });
    </script>

</x-main-layout>