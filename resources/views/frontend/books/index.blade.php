@extends('frontend.master')

@section('content')
  <!-- Product Section Begin -->
  <section class="product-page spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="product__page__content">
            <div class="product__page__title">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                  <div class="section-title">
                    <h4>{{$category->name}}</h4>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="product__page__filter">
                    <p>Order by:</p>
                    <select>
                      <option value="">A-Z</option>
                      <option value="">1-10</option>
                      <option value="">10-50</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                @foreach ($product as $item)
              <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                      <div class="product__item__pic set-bg" data-setbg="{{$item->getImage()}}">
                        {{-- <div class="ep">18 / 18</div> --}}
                        <div class="comment"><i class="fa fa-comments"></i> {{$item->getPrice() }}</div>
                        <div class="view"><i class="fa fa-eye"></i> {{$item->quantitiy}}</div>
                      </div>
                      <div class="product__item__text">
                        <ul>
                          <li>{{$item->book_id}}</li>
                          {{-- <li>Movie</li> --}}
                        </ul>
                        <h5><a href="{{route('books.detail', $item->id)}}">{{$item->name}}</a></h5>
                      </div>
                    </div>
                  </div>
              @endforeach
            </div>
          </div>
          <div class="product__pagination">
            {{!!$product->links()!!}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Section End -->
@endsection
