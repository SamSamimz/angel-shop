<x-main-layout>
    <div class="py-5" id="trending">
        <div class="container">
            <h2 class="py-2">All Categories</h2>
            <div class="row">
                @foreach ($categories as $category)
                <a style="text-decoration: none" href="{{route('frontend.categoryProducts',$category->slug)}}" class="col-md-3 mb-2">
                        <div class="card">
                            <img style="height: 230px; width: 95%;margin: 0 auto" src="{{$category->getImage()}}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{$category->name}}</h5>
                                <span>{{$category->description}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</x-main-layout>