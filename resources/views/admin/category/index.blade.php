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
                    <p class="card-title">Categories List</p>
                    <a href="{{route('categories.create')}}" class="btn btn-primary text-white">Create Category</a>
                </div>
              <div class="table-responsive">
                <table id="recent-purchases-listing" class="table">
                  <thead>
                    <tr>
                        <th>{{__('S.N.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Meta Title')}}</th>
                        <th>{{__('Meta Keywords')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Popular')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{Str::limit($category->description,25)}}</td>
                        <td>{{$category->meta_title}}</td>
                        <td style="max-width: 25px;overflow:auto">{{$category->meta_keywords}}</td>
                        <td>
                            <img src="{{$category->getImage()}}" alt="{{$category->image}}">
                        </td>
                        <td>{{$category->status ? 'Active' : 'Inactive'}}</td>
                        <td>{{$category->popular}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('categories.edit',$category->slug)}}">Edit</a>
                            <a class="btn btn-info" href="">View</a>
                            <a class="btn btn-danger" onclick="document.getElementById('deleteForm').submit()">Delete</a>
                            <form action="{{route('categories.destroy',$category)}}" method="POST" id="deleteForm">
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
                {{$categories->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
      </div>
</x-admin-layout>