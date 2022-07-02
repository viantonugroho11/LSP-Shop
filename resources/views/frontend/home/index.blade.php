@extends('frontend.master')
@section('content')
  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
      <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="assets/promo1.jpeg">
        </div>
        <div class="hero__items set-bg" data-setbg="assets/promo2.jpeg">
          </div>
        <div class="hero__items set-bg" data-setbg="assets/promo3.png">
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          @foreach ($productlist as $itemC)
           @if(empty($itemP))
           <div class="trending__product">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                  <div class="section-title">
                    <h4>{{$itemC->name}}</h4>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="btn__all">
                    <a href="{{route('books.category', $itemC->slug)}}" class="primary-btn">View All <span class="arrow_right"></span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach ($itemC->getProducts as $itemP)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                      <div class="product__item__pic set-bg" data-setbg="{{$itemP->getImage()}}">
                        {{-- <div class="ep">18 / 18</div> --}}
                        <div class="comment"><i class="fa fa-comments"></i> {{$itemP->getPrice()}}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{$itemP->quantity}}</div>
                      </div>
                      <div class="product__item__text">
                        <ul>
                          <li>{{$itemP->book_id}}</li>
                          {{-- <li>Movie</li> --}}
                        </ul>
                        <h5><a href="{{route('books.detail', $itemP->slug)}}">{{$itemP->name}}</a></h5>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
           @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- Product Section End -->
@endsection
