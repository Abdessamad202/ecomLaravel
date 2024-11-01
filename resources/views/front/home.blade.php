<x-layout title="Home Page">
    @include("partial.header")
    <section class="hero container my-5 ">
        <div class="container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($categories as $category )
                        <div class="swiper-slide">
                            <div class="disc">
                                {{-- <div class="bs">Beats Solo</div>
                                <div class="w">Wireless</div> --}}
                                <div class="ht text-secondary">{{$category->name}}</div>
                                <div ><a class="btn btn-primary btn-lg" href="{{route("categories",$category->name)}}">Show Category</a></div>
                                {{-- <div class="button"><button>Shop By Category</button></div> --}}
                            </div>
                            <div class="image">
                                <img src="assets/hero/headphone.png" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <!-- <div class="swiper-pagination"></div> -->

                <!-- If we need navigation buttons -->
                <!-- <div class="swiper-button-prev"></div> -->
                <!-- <div class="swiper-button-next"></div> -->

                <!-- If we need scrollbar -->
                <!-- <div class="swiper-scrollbar"></div> -->
            </div>
        </div>
    </section>
</x-layout>
