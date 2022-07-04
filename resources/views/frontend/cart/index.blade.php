@extends('frontend.master')
@section('content')
<section class="h-100 h-custom" style="background-color: #070720;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Book Cart</h1>
                    <h6 class="mb-0 text-muted">{{count($productlatest)}} items</h6>
                  </div>
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="{{$product->getImage()}}"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-black mb-0">{{$product->name}}</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fa fa-minus"></i>
                      </button>

                      <input name="quantity" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-lg"/>

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <p class="mb-0"><small>{{$product->getPrice()}}</small></p>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fa-solid fa-xmark"></i></i></a>
                    </div>
                  </div>

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="{{route('mainpage')}}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items {{count($productlatest)}}</h5>
                    <h5>{{$product->getPrice()}}</h5>
                  </div>

				  
                  <div class="mb-5 pb-2">
					  <p class="text-uppercase mb-3">Pengiriman</p>
                    <select name="courier" class="select">
                      <option value="1">Instant - Rp. 70.000</option>
                      <option value="2">Same Day - Rp. 30.000</option>
                      <option value="3">2 Days - Rp. 10.000</option>
                      <option value="4">Regular - Rp. 5.000</option>
                    </select>
                  </div>

				  
                  <div class="mb-5">
					  <div class="form-outline">
					  <p class="text-uppercase mb-3">Alamat</p>
                      <input type="text" id="form3Examplea2" name="address" class="form-control form-control-sm" />
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total</h5>
                    <h5>{{$product->getPrice()}}</h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Pilih Pembayaran</button>

                </div>
              </div>
            </div>
          </div>
        </div>
		<!-- OK -->
      </div>
    </div>
  </div>
</section>


@endsection