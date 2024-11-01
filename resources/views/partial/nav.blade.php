<nav class="navbar navbar-expand-lg bg-body-tertiary">
  {{-- <div class="container-fluid"> --}}
    <div class="container-fluid">
    <a class="navbar-brand" href="#">EcomWebSite</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" aria-current="page" href="{{ route("admin") }}">Accuiel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('users') ? 'active' : '' }}" href="{{ route("users.index") }}">All Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ route("products.index") }}">All Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('categories') ? 'active' : '' }}" href="{{ route("categories.index") }}">All Categories</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
