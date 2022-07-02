@extends('backend.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Buku</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Buku</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penulis</label>
                    <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Penulis">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Harga Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Stock Buku</label>
                    <input name="quantity" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jumlah Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select name="category_id" class="form-control">
                      @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                   <div class="form-group">
                      <label>Sinopsis</label>
                      <textarea class="isiArtikel @error('detail') is-invalid @enderror" name="description"
                        style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      @error('detail')
                        <div class="alert alert-danger mt-2">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Asal Penerbit</label>
                    <input name="publisher" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Asal Penerbit">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ISBN</label>
                    <input name="isbn" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan ISBN">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bahasa</label>
                    <input name="language" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Bahasa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Terbit</label>
                    <input name="datePublish" type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Halaman Buku <small>(lembar)</small></label>
                    <input name="page" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jumlah Halaman Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat Buku <small>(kg)</small></label>
                    <input name="weight" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Berat Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lebar Buku <small>(cm)</small></label>
                    <input name="width" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan Lebar Buku">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Cover Buku</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="icon" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
@section('scriptJs')
  <!-- Summernote -->
  <script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $(function() {
      //note
      $('.isiArtikel').summernote()
    })
  </script>
@endsection

@section('scriptCss')
  <!-- Summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">
@endsection
