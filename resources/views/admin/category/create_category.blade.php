<x-admin-layout>
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-center flex-wrap">
              <div class="me-md-3 me-xl-5">
                <h2>{{__('Categories')}}</h2>
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
                    <p class="card-title">Create Category</p>
                    <a href="{{route('categories.index')}}" class="btn btn-primary text-white">Category List</a>
                </div>
              <div class="col-md-7 mx-auto grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Category name..." autocomplete="off" value="{{old('name')}}">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="description">Description :</label>
                          <textarea name="description" id="description" class="form-control" placeholder="Category description..." cols="30" rows="3">{{old('description')}}</textarea>
                          @error('description')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">Status :</label>
                            <input name="status" type="checkbox" id="popular" checked class="form-check-input">
                        </div>
                        <div class="form-group">
                        <label for="popular">Popular :</label>
                            <input type="checkbox" id="popular" name="popular" class="form-check-input">
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
                        <label for="image">Category Image :</label>
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