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
                    <p class="card-title">Create Product</p>
                    <a href="{{route('products.index')}}" class="btn btn-primary text-white">Product List</a>
                </div>
              <div class="col-md-7 mx-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="category">Category :</label>
                        <select class="form-select" name="category_id" id="category">
                          <option value="" selected>Select Category</option>
                          @foreach ($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option> 
                          @endforeach
                        </select>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Product name..." autocomplete="off" value="{{old('name')}}">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="small_description">Small Description :</label>
                          <textarea name="small_description" id="small_description" class="form-control" placeholder="Small description..." cols="30" rows="3">{{old('small_description')}}</textarea>
                          @error('small_description')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                      <div class="form-group">
                          <label for="description">Description :</label>
                          <textarea name="description" id="description" class="form-control" placeholder="Description..." cols="30" rows="3">{{old('description')}}</textarea>
                          @error('description')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="regular_price">Regular Price :</label>
                          <input type="text" name="regular_price" class="form-control" id="regular_price" placeholder="Regular Price..." autocomplete="off" value="{{old('regular_price')}}">
                          @error('regular_price')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="selling_price">Selling Price :</label>
                          <input type="text" name="selling_price" class="form-control" id="selling_price" placeholder="Selling Price..." autocomplete="off" value="{{old('selling_price')}}">
                          @error('selling_price')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="qty">Quantity :</label>
                          <input type="number" placeholder="Product quantity.." name="qty" class="form-control" id="qty" autocomplete="off" value="1">
                          @error('qty')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="tax">Tax :</label>
                          <input type="text" name="tax" class="form-control" id="tax" placeholder="Tax..." autocomplete="off" value="{{old('tax')}}">
                          @error('tax')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">Status :</label>
                            <input name="status" type="checkbox" id="popular" checked class="form-check-input">
                        </div>
                        <div class="form-group">
                        <label for="popular">Trending :</label>
                            <input type="checkbox" id="trending" name="trending" class="form-check-input">
                        </div>
                      <div class="form-group">
                        <label for="meta_title">Meta Title :</label>
                        <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta title..." autocomplete="off" value="{{old('meta_title')}}">
                        @error('meta_title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="meta_description">Meta Description :</label>
                        <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Meta description..." autocomplete="off" value="{{old('meta_description')}}">
                        @error('meta_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="meta_keywords">Meta Keywords :</label>
                        <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="Meta keywords..." autocomplete="off" value="{{old('meta_keywords')}}">
                        @error('meta_keywords')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="image">Product Image :</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary text-white">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-admin-layout>