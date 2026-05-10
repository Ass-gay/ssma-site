<!DOCTYPE html>
<html lang="fr">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<section class="gallery-page">

    <div class="container">

        {{-- HEADER --}}
            <div class="container section-title text-center">
                <h2>
                    {{ $event->title }}
                </h2>
                <p>
                    Moments forts et souvenirs capturés en images
                </p>
            </div>
       

        {{-- GRID --}}
        <div class="row g-4">

            @foreach($event->media as $m)

                <div class="col-lg-4 col-md-6">

                    <div class="media-card">

                        {{-- IMAGE --}}
                        @if($m->type == 'image')

                            <div class="media-box">

                                <img src="{{ asset('storage/'.$m->file) }}"
                                     class="media-img"
                                     onclick="openLightbox(this.src)">

                                <div class="media-overlay"
                                    onclick="openLightbox('{{ asset('storage/'.$m->file) }}')">

                                    <button class="zoom-btn">

                                        <i class="fa-solid fa-expand"></i>

                                    </button>

                                </div>

                            </div>

                        @else

                            {{-- VIDEO --}}
                            <div class="video-box">

                                <video controls class="media-video">

                                    <source src="{{ asset('storage/'.$m->file) }}">

                                </video>

                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="lightbox">

    {{-- CLOSE --}}
    <span class="lightbox-close"
          onclick="closeLightbox()">

        &times;

    </span>

    {{-- PREV --}}
    <button class="lightbox-prev"
            onclick="prevImage(event)">

        <i class="fa-solid fa-chevron-left"></i>

    </button>

    {{-- IMAGE --}}
    <img id="lightboxImg"
         class="lightbox-img">

    {{-- NEXT --}}
    <button class="lightbox-next"
            onclick="nextImage(event)">

        <i class="fa-solid fa-chevron-right"></i>

    </button>

</div>

@include("sections.vitrine.footer")

<script>

let images = [];
let currentIndex = 0;

document.addEventListener("DOMContentLoaded", function(){

    images = document.querySelectorAll('.media-img');

});

function openLightbox(src){

    document.getElementById('lightbox')
        .style.visibility='visible';

        document.getElementById('lightbox')
            .style.opacity='1';

    document.getElementById('lightboxImg')
        .src=src;

    document.body.style.overflow='hidden';

    images.forEach((img, index)=>{

        if(img.src === src){

            currentIndex = index;

        }

    });
}

function closeLightbox(){

    document.getElementById('lightbox')
        .style.visibility='hidden';

        document.getElementById('lightbox')
            .style.opacity='0';

    document.body.style.overflow='auto';
}

function nextImage(event){

    event.stopPropagation();

    currentIndex++;

    if(currentIndex >= images.length){

        currentIndex = 0;

    }

    document.getElementById('lightboxImg')
        .src = images[currentIndex].src;
}

function prevImage(event){

    event.stopPropagation();

    currentIndex--;

    if(currentIndex < 0){

        currentIndex = images.length - 1;

    }

    document.getElementById('lightboxImg')
        .src = images[currentIndex].src;
}

document.addEventListener('keydown', function(e){

    if(e.key === 'ArrowRight'){

        nextImage(e);

    }

    if(e.key === 'ArrowLeft'){

        prevImage(e);

    }

    if(e.key === 'Escape'){

        closeLightbox();

    }

});

</script>

<style>

/* PAGE */

.gallery-page{
    padding:100px 0;
    background:#f4f7fb;
    min-height:100vh;
}

/* HEADER */

.gallery-header{
    margin-bottom:70px;
}

/* .gallery-badge{
    display:inline-block;

    background:#0d6efd;
    color:white;

    padding:10px 25px;

    border-radius:50px;

    font-size:14px;
    font-weight:700;

    margin-bottom:20px;
} */

/* .gallery-header h1{
    font-size:52px;
    font-weight:900;

    color:#111;

    margin-bottom:15px;
}

.gallery-header p{
    color:#666;
    font-size:18px;
} */

.gallery-header h2 {
font-weight: bold;
color: #2E7D32;
top: -25px;
}

.gallery-header p {
color: #555;
}

/* CARD */

.media-card{
    background:white;

    border-radius:30px;

    overflow:hidden;

    transition:0.5s;

    box-shadow:0 15px 40px rgba(0,0,0,0.08);

    height:100%;
}

.media-card:hover{
    transform:translateY(-10px);

    box-shadow:0 25px 50px rgba(0,0,0,0.15);
}

/* IMAGE */

.media-box{
    position:relative;
    overflow:hidden;
}

.media-img{
    width:100%;
    height:350px;

    object-fit:cover;

    transition:0.5s;

    cursor:pointer;
}

.media-card:hover .media-img{
    transform:scale(1.08);
}

/* OVERLAY */

.media-overlay{
    position:absolute;

    inset:0;

    background:rgba(0,0,0,0.45);

    display:flex;

    justify-content:center;
    align-items:center;

    opacity:0;

    transition:0.4s;
}

.media-card:hover .media-overlay{
    opacity:1;
}

/* BUTTON */

.zoom-btn{
    width:70px;
    height:70px;

    border:none;

    border-radius:50%;

    background:white;

    color:#111;

    font-size:24px;

    transition:0.3s;
}

.zoom-btn:hover{
    background:#0d6efd;
    color:white;

    transform:scale(1.1);
}

/* VIDEO */

.media-video{
    width:100%;
    height:350px;

    object-fit:cover;
}

/* LIGHTBOX */

.lightbox{
    display:none;

    position:fixed;

    top:0;
    left:0;

    display:flex;
    visibility:hidden;
    opacity:0;
    transition:0.4s;

    width:100%;
    height:100%;

    background:rgba(0,0,0,0.96);

    justify-content:center;
    align-items:center;

    z-index:9999;

    backdrop-filter:blur(8px);
}

.lightbox-img{
    max-width:90%;
    max-height:90%;

    border-radius:20px;

    box-shadow:0 20px 50px rgba(0,0,0,0.5);
}

.lightbox-close{
    position:absolute;

    top:20px;
    right:35px;

    color:white;

    font-size:55px;

    cursor:pointer;

    transition:0.3s;
}

/* ARROWS */

.lightbox-prev,
.lightbox-next{

    position:absolute;

    top:50%;

    transform:translateY(-50%);

    width:70px;
    height:70px;

    border:none;

    border-radius:50%;

    background:rgba(255,255,255,0.15);

    color:white;

    font-size:28px;

    cursor:pointer;

    backdrop-filter:blur(10px);

    transition:0.3s;

    z-index:10000;
}

.lightbox-prev:hover,
.lightbox-next:hover{

    background:#0d6efd;

    transform:translateY(-50%) scale(1.1);
}

.lightbox-prev{

    left:30px;
}

.lightbox-next{

    right:30px;
}

.lightbox-close:hover{
    transform:rotate(90deg);
}

/* MOBILE */

@media(max-width:768px){

    .gallery-header h1{
        font-size:34px;
    }

    .media-img,
    .media-video{
        height:260px;
    }
}

</style>

</body>
</html>
