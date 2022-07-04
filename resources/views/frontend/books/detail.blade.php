@extends('frontend.master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{route('mainpage')}}"><i class="fa fa-home"></i>Home</a>
                        <span>{{$product->name}}</span>
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
                        <div class="anime__details__pic set-bg" data-setbg="{{$product->getImage()}}">
                            <div class="comment"><i class="fa fa-cubes"></i> 11</div>
                            <div class="view"><i class="fa fa-cart-plus"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$product->name}}</h3>
                                <h5 class="text-white mb-1">by {{$product->author}}</h5>
                                <span>{{$product->getPrice()}}</span>
                            </div>
                            <p class="text-white text-justify">{{strip_tags($product->description)}}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Kode Buku:</span> {{$product->book_id}}</li>
                                            <li><span>Kategori:</span> {{$product->getCategory->name}}</li>
                                            <li><span>Penerbit:</span> {{$product->publisher}}</li>
                                            <li><span>ISBN:</span> {{$product->isbn}}</li>
                                            <li><span>Bahasa:</span> {{$product->language}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Tanggal Terbit:</span> {{$product->getDatePublish()}}</li>
                                            <li><span>Halaman:</span> {{$product->page}} halaman</li>
                                            <li><span>Berat:</span> {{$product->weight}} kg</li>
                                            <li><span>Lebar:</span> {{$product->width}} cm</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="{{route('transaction.index', $product->slug)}}" class="follow-btn"><i class="fa fa-shopping-cart"></i>Langsung Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->
@endsection
