@extends('layouts.app')

@section('content')

<section class="gallery-page">

    <div class="container">

        {{-- TITLE --}}
        <div class="gallery-header text-center">

            <span class="gallery-badge">

                SSMA MÉDIAS

            </span>

            <h1>

                {{ $event->titre ?? 'Album SSMA' }}

            </h1>

            <p>

                Revivez les meilleurs moments de la communauté SSMA

            </p>

        </div>

        {{-- MEDIA GRID --}}
        <div class="row g-4">

            @forelse($event->media as $m)

                <div class="col-lg-4 col-md-6">

                    <div class="media-card">

                        {{-- IMAGE --}}
                        @if($m->type == 'image')

                            <div class="media-box">

                                <img src="{{ asset('storage/'.$m->file) }}"
                                     class="media-img"
                                     onclick="openLightbox(this.src)">

                                <div class="media-overlay">

                                    <button class="media-btn">

                                        <i class="fa-solid fa-expand"></i>

                                    </button>

                                </div>

                            </div>

                        @else

                            {{-- VIDEO --}}
                            <div class="video-box">

                                <video controls
                                       class="media-video">

                                    <source src="{{ asset('storage/'.$m->file) }}">

                                </video>

                            </div>

                        @endif

                    </div>

                </div>

            @empty

                <div class="text-center">

                    <h4>

                        Aucun média dans cet album

                    </h4>

                </div>

            @endforelse

        </div>

    </div>

</section>

{{-- LIGHTBOX --}}
<div id="lightboxModal"
     class="lightbox"
     onclick="closeLightbox()">

    <span class="lightbox-close">

        &times;

    </span>

    <img id="lightboxImg"
         class="lightbox-img">

</div>

@endsection


@section('scripts')

<script>

    function openLightbox(src){

        document.getElementById('lightboxModal')
            .style.display = 'flex';

        document.getElementById('lightboxImg')
            .src = src;

        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(){

        document.getElementById('lightboxModal')
            .style.display = 'none';

        document.body.style.overflow = 'auto';
    }

</script>

<style>

/* PAGE */

.gallery-page{
    padding:100px 0;
    background:#f4f7fb;
}

/* HEADER */

.gallery-header{
    margin-bottom:70px;
}

.gallery-badge{
    display:inline-block;

    background:#0d6efd;
    color:white;

    padding:10px 25px;

    border-radius:50px;

    font-size:14px;
    font-weight:700;

    margin-bottom:20px;
}

.gallery-header h1{
    font-size:52px;
    font-weight:900;

    color:#111;

    margin-bottom:15px;
}

.gallery-header p{
    color:#666;
    font-size:18px;
}

/* CARD */

.media-card{
    position:relative;

    border-radius:30px;

    overflow:hidden;

    background:white;

    box-shadow:0 15px 40px rgba(0,0,0,0.08);

    transition:0.5s;

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

    cursor:pointer;

    transition:0.5s;
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

.media-btn{
    width:70px;
    height:70px;

    border:none;

    border-radius:50%;

    background:white;

    color:#111;

    font-size:24px;

    transition:0.3s;
}

.media-btn:hover{
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

    width:100%;
    height:100%;

    background:rgba(0,0,0,0.95);

    justify-content:center;
    align-items:center;

    z-index:9999;

    backdrop-filter:blur(10px);
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

    font-size:50px;

    cursor:pointer;

    transition:0.3s;
}

.lightbox-close:hover{
    transform:rotate(90deg);
}

/* MOBILE */

@media(max-width:768px){

    .gallery-header h1{
        font-size:36px;
    }

    .media-img,
    .media-video{
        height:280px;
    }
}

</style>

@endsection
