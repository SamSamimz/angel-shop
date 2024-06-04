<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Angel-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{request()->routeIs('home') ? 'active' : null}}" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{request()->routeIs('carts.index') ? 'active' : null}}" href="{{route('carts.index')}}">Carts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{request()->routeIs('frontend.categories') ? 'active' : null}}" href="{{route('frontend.categories')}}">Categories</a>
                </li>
        </div>
      {{-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li> --}}
    </ul>
    </div>
  </nav>