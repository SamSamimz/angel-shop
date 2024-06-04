<x-admin-layout>
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center flex-wrap">
              <div class="me-md-3 me-xl-5">
                <h2>{{__('Products')}}</h2>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
              <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                <i class="mdi mdi-download text-muted"></i>
              </button>
              <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                <i class="mdi mdi-clock-outline text-muted"></i>
              </button>
              <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                <i class="mdi mdi-plus text-muted"></i>
              </button>
              <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
          <div class="card">
            <div class="card-body">
                <div class="py-2 d-flex align-items-center justify-content-between">
                    <p class="card-title">Products List</p>
                    <a href="{{route('products.create')}}" class="btn btn-primary text-white">Create Product</a>
                </div>
              <div class="table-responsive">
                <table id="recent-purchases-listing" class="table">
                  <thead>
                    <tr>
                        <th>{{__('S.N.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Small_Description')}}</th>
                        <th>{{__('Regular Price')}}</th>
                        <th>{{__('Selling Price')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Quantity')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Tax')}}</th>
                        <th>{{__('Trending')}}</th>
                        <th>{{__('Meta_Title')}}</th>
                        <th>{{__('Meta_Description')}}</th>
                        <th>{{__('Meta_Keywords')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($products as $index => $product)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->small_description}}</td>
                        <td>{{$product->regular_price}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>
                          <img src="{{$product->getImage()}}" alt="{{$product->getImage()}}">
                        </td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->status ? "Active" : "Inactive"}}</td>
                        <td>{{$product->tax}}</td>
                        <td>{{$product->trending ? 'Yes' : 'NO'}}</td>
                        <td>{{$product->meta_title}}</td>
                        <td>{{$product->meta_description}}</td>
                        <td>{{$product->meta_keywords}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('products.edit',$product)}}">Edit</a>
                            <a class="btn btn-info" href="">View</a>
                            <a class="btn btn-danger" onclick="document.getElementById('deleteForm').submit()">Delete</a>
                            <form action="{{route('products.destroy',$product)}}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="pt-2">
                {{$products->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
      </div>
</x-admin-layout>