@extends('frontend.master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('mainpage')}}"><i class="fa fa-home"></i>Home</a>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="img/anime/details-pic.jpg">
                            <div class="comment"><i class="fa fa-cubes"></i> 11</div>
                            <div class="view"><i class="fa fa-cart-plus"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3></h3>
                                <span>NAMA PENGARANG</span>
                                <span>{{$product->getPrice()}}</span>
                            </div>
                            <p style="background-color: white">{!! $product->description !!}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Kode Buku:</span> TV Series</li>
                                            <li><span>Kategori:</span> Lerche</li>
                                            <li><span>Penerbit:</span> Oct 02, 2019 to ?</li>
                                            <li><span>ISBN:</span> Airing</li>
                                            <li><span>Bahasa:</span> Action, Adventure, Fantasy, Magic</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Tanggal Terbit:</span> 7.31 / 1,515</li>
                                            <li><span>Halaman:</span> 7.31 / 1,515</li>
                                            <li><span>Berat:</span> 7.31 / 1,515</li>
                                            <li><span>Lebar:</span> 8.5 / 161 times</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->
@endsection
