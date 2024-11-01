<x-layout title="Product Page">
    @include('partial.header')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ Storage::url($product->image) }}"
                        alt="..." /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: BST-498</div>
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-3">
                        @if ($product->discount != 0)
                            <span class="text-decoration-line-through">${{ $product->price }}</span>
                        @endif
                        <span>${{ $product->price - ($product->price * $product->discount) / 100 }}</span>
                    </div>
                    <p class="lead">{{ $product->description }} </p>
                    <form action="{{ route('panier.store') }}" method="post">
                        @csrf
                        <div class="d-flex mt-3">
                            <div class="input-group w-25">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="decrement()">-</button>
                                <input class="form-control text-center" name="quantity" id="inputQuantity" type="number" value="1"
                                    style="max-width: 3rem" min="1" />
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="increment()">+</button>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        function increment() {
            let quantity = document.getElementById('inputQuantity');
            quantity.value = parseInt(quantity.value) + 1;
        }

        function decrement() {
            let quantity = document.getElementById('inputQuantity');
            if (quantity.value > 1) {
                quantity.value = parseInt(quantity.value) - 1;
            }
        }

        document.getElementById('inputQuantity').addEventListener('input', function() {
            if (this.value < 1) this.value = 1;
        });
    </script>
</x-layout>
