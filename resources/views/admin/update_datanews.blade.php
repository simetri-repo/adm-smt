@extends('admin.MainAdmin')

@section('datanews')
active
@endsection
@section('content')
<!-- Page content-->
<div class="container py-3">
   <div class="row align-items-center">
      <div class="col-12 ">
         {{-- --}}

         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">Edit Berita</h5>
                     <form action="{{ url('update_berita/'.$response[0]->id_berita) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <div class="mb-3">
                           <label for="" class="form-label">Gambar Berita :</label> <br>
                           <img src="{{ asset($response[0]->gambar_berita) }}" alt="" style="height:200px">
                           <br />
                           <br />
                           <input type="text" name="gambar_berita" class="form-control"
                              value="{{ $response[0]->gambar_berita }}" readonly>
                           <br />
                           <label for="" class="form-label">Ganti Gambar Berita :</label> <br>
                           <input type="file" name="gambar_berita_new" id="" class="form-control"
                              aria-describedby="helpId" />
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Nama Berita :</label>
                           <input type="text" name="nama_berita" id="" class="form-control" placeholder=""
                              aria-describedby="helpId" value="{{ $response[0]->nama_berita }}">
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Keterangan Berita :</label>
                           <textarea class="form-control" name="keterangan_berita" id="" cols="30"
                              rows="10">{{ $response[0]->keterangan_berita }}</textarea>
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Author :</label>
                           <input type="text" class="form-control" name="created_by" id="" aria-describedby="helpId"
                              placeholder="" value="{{ $response[0]->created_by }}" disabled>
                        </div>
                        <div class="mb-3">
                           <label for="" class="form-label">Next Author :</label>
                           <input type="text" class="form-control" name="created_by_new" id="" aria-describedby="helpId"
                              placeholder="" value="{{ session('username')}}" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="" class="form-label">Rilis/Update :</label>
                           <input type="text" class="form-control" name="updated_at" id="" aria-describedby="helpId"
                              placeholder="" value="{{ $response[0]->updated_at }}" readonly>
                        </div>
                        <div class="mb-3">
                           <label for="" class="form-label">Status</label>
                           <select class="form-control" name="status_berita" id="">
                              @if ($response[0]->status_berita == 9)
                              <option value="9" selected>Not-Display</option>
                              <option value="1">Displayed</option>
                              <option value="3">Hot Topic</option>
                              <option value="2">Top Trending</option>
                              @else
                              <option value="9">Not-Display</option>
                              <option value="1" selected>Displayed</option>
                              <option value="3">Hot Topic</option>
                              <option value="2">Top Trending</option>
                              @endif

                           </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="submit">
                        <input type="reset" class="btn btn-secondary" value="reset">
                        <a href="{{ url('datanews') }}" class="btn btn-warning">Back</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         {{-- --}}
      </div>
   </div>
</div>

{{-- --}}
@endsection