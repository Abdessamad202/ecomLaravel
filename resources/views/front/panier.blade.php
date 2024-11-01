<x-layout title="Panier Page">
    @include('partial.header')
    <section class=" mt-3 mb-4">
        <div class="container">
            <div class="row ">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            @php
                                $totalPrice = 0;
                                $discount = 0;
                                @endphp
                            @foreach ( $productsPanier as $product )
                            @php
                                if($product->quantity===1){
                                    $totalPrice +=$product->price;
                                    $discount += $product->discount*$product->price/100;
                                }else {
                                    $totalPrice +=$product->price*$product->quantity;
                                    $discount += $product->discount*$product->quantity*$product->price/100;
                                    # code...
                                }
                            @endphp
                                {{-- @foreach ($products as $product ) --}}
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex align-items-center ">
                                                <img src="{{ Storage::url($product->image) }}"
                                                    class="border rounded me-3" style="width: 96px; height: 96px;">
                                                <div class="text-center">
                                                    <a href="#" class="nav-link ">{{$product->name}}</a>
                                                    <!-- <p class="text-muted">Yellow, Jeans</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap align-items-center">
                                        <div class="d-flex mx-2">
                                            <input class="form-control text-center " id="inputQuantity" type="number" min="1" value="{{$product->quantity}}" style="width: 50px">
                                        </div>
                                        <div class="">
                                            <text class="h6">{{$product->price}}</text> <br>
                                            <small class="text-muted text-nowrap"> $460.00 / per item </small>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2 ">
                                        <div class="float-md-end align-items-center d-flex">
                                            <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i
                                                    class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                            <form action="{{route("panier.destroy",$product->id_panier)}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <input type="hidden" name="id" value="13">
                                                <button type="submit"
                                                    class="btn mx-2 btn-light border text-danger icon-hover-danger"
                                                    name="supprimer">Remove</button>
                                            </form>
                                        </div>
    
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            @endforeach
                            {{-- <div class="row gy-3 mb-4">
                                <div class="col-lg-5">
                                    <div class="me-lg-5">
                                        <div class="d-flex align-items-center ">
                                            <img src="img/renee-stunner-matte-lipstick-4gm-renee-cosmetics-11.webp"
                                                class="border rounded me-3" style="width: 96px; height: 96px;">
                                            <div class="text-center">
                                                <a href="#" class="nav-link ">lips stick</a>
                                                <!-- <p class="text-muted">Yellow, Jeans</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap align-items-center">
                                    <div class="d-flex mx-2">
                                        <button type="button" id="decrementBtn"
                                            class="btn btn-outline-secondary">-</button>
                                        <input class="form-control text-center " id="inputQuantity" type="number"
                                            min="1" value="1" style="width: 50px">
                                        <button type="button" id="incrementBtn"
                                            class="btn btn-outline-secondary">+</button>
                                    </div>
                                    <div class="">
                                        <text class="h6">$20</text> <br>
                                        <small class="text-muted text-nowrap"> $460.00 / per item </small>
                                    </div>
                                </div>
                                <div
                                    class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2 ">
                                    <div class="float-md-end align-items-center d-flex">
                                        <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i
                                                class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                        <form action="supprimerPanier.php" method="post">
                                            <input type="hidden" name="id" value="13">
                                            <button type="submit"
                                                class="btn mx-2 btn-light border text-danger icon-hover-danger"
                                                name="supprimer">Remove</button>
                                        </form>
                                    </div>

                                </div>
                            </div> --}}
                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name=""
                                            placeholder="Coupon code">
                                        <button class="btn btn-light border">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($totalPrice !== 0)
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2">${{$totalPrice}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-success">-$ {{$discount}}</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">${{$totalPrice - $discount}}</p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                <a href="#" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
</x-layout>
