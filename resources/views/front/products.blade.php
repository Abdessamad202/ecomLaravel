<x-layout title="Products Page">
    @include('partial.header')
    <div class="container mt-3">
        <h1 class="text-center my-4">ALL Products</h1>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product-card bg-transparent border-0 mb-3">
                    <div class="card-header position-relative shadow-sm border-0 p-0">
                        <img src="{{ Storage::url($product->image) }}" class="hover-image card-img-top w-100" alt="...">
                        {{-- <ul class="card-btn-group text-dark-lead top-left-10">
                            <li><a class="icon-sm rounded-1 bg-white shadow-sm mb-1" href="#"><i class="bi bi-heart"></i></a></li>
                            <li><a class="icon-sm rounded-1 bg-white shadow-sm mb-1" href="#"><i class="bi bi-zoom-in"></i></a></li>
                            <li><a class="icon-sm rounded-1 bg-white shadow-sm mb-1" href="#"><i class="bi bi-arrow-left-right"></i></a></li>
                        </ul> --}}
                        <a class="w-75 position-absolute bottom-center-10 rounded-0 btn btn-primary" href="{{route("product",$product->name)}}"><i class="bi bi-basket me-2"></i>Show Product</a>
                    </div>
                    <div class="card-body text-center pt-2 px-0 d-flex justify-content-between px-3 py-3 align-items-center">
                        <h6 class="mb-1 title-max-45 fw-bold-"><a class="text-dark" href="single-product.html">{{ $product->name }}</a></h6>
                        {{-- <div class="smaller mb-2 text-silver-lead"><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill text-warning"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div> --}}
                        <div><span class="price-18px text-primary fw-bold">${{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
