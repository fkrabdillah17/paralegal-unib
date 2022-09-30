{{-- Pra-footer --}}
@if (Request::segment(1) != 'news')
    <div class="p-2">
        <div class="container-fluid">
            <h2 class="text-center pb-2 titleBar" style="font-weight: bold">Berita Terkini</h2>
            <div id="slideNews" class="carousel" data-bs-ride="carousel">
                <div class="carousel-inner slide-news">
                    @foreach ($footer_news as $item)
                        <div class="carousel-item slide-news">
                            <div class="card slide-news">
                                <div class="img-wrapper slide-news"><img src="{{ asset('assets/files/pictures/arsip/' . $item->thumbnail) }}"
                                        class="d-block w-100" alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{!! strip_tags(\Illuminate\Support\Str::limit($item->description, 100, $end = '...')) !!}</p>
                                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev slide-news" type="button" data-bs-target="#slideNews" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next slide-news" type="button" data-bs-target="#slideNews" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endif


{{-- Footer --}}
<div class="p-2 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 text-center align-self-center">
                <img src="{{ asset('assets/files/paralegal.png') }}" class="img-fluid py-3" alt="...">
                <div class="col d-flex justify-content-evenly">
                    <a href="#" target="_blank">
                        <span class="social-icon">
                            <i class="bi bi-twitter" style="font-size: 2rem;"></i>
                        </span>
                    </a>
                    <a href="#" target="_blank">
                        <span class="social-icon">
                            <i class="bi bi-tiktok" style="font-size: 2rem;"></i>
                        </span>
                    </a>
                    <a href="#" target="_blank">
                        <span class="social-icon">
                            <i class="bi bi-instagram" style="font-size: 2rem;"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 py-2">
                <h5 class="pb-3 titleHead" id="contact-us">Contact Us at :</h5>
                <p>Paralegal FH UNIB</p>
                <p><i class="bi bi-envelope"></i><span> Email:</span>
                    paralegal@gmail.com</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15924.924568046032!2d102.26368926977538!3d-3.759795599999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1aecc8afb80fdf02!2sUniversitas%20Bengkulu!5e0!3m2!1sid!2sid!4v1655209110973!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" class="h-100 w-100"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="text-center p-3">
        © 2022 Copyright: Paralegal FH UNIB
    </div>
</div>