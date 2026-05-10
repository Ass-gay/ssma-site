{{-- Galeria --}}
<section class="gallery-section">
    <div class="container">

        <div class="section-title text-center mb-5">
            <h2>Galerie SSMA</h2>
            <p>Nos activités en images</p>
        </div>

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                @foreach($mediaGalerie as $m)

                    <div class="swiper-slide">

                        @if($m->type == 'image')

                            <img src="{{ asset('storage/'.$m->file) }}">

                        @else

                            <video autoplay muted loop>
                                <source src="{{ asset('storage/'.$m->file) }}">
                            </video>

                        @endif

                    </div>

                @endforeach

            </div>

        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    new Swiper(".mySwiper", {

        loop:true,

        autoplay:{
            delay:2500,
        },

        spaceBetween:20,

        breakpoints:{

            320:{
                slidesPerView:1,
            },

            768:{
                slidesPerView:2,
            },

            1024:{
                slidesPerView:3,
            }

        }

    });
</script>
