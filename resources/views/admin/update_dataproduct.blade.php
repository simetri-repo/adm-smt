@extends('admin.MainAdmin')

@section('dataproduct')
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
                     <h5 class="card-title">Edit produk</h5>
                     <form action="{{ url('update_produk/'.$response[0]->id_produk) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <div class="mb-3">
                           <label for="" class="form-label">Gambar produk :</label> <br>
                           <img src="{{ asset($response[0]->gambar_produk) }}" alt="" style="height:200px">
                           <br />
                           <br />
                           <input type="text" name="gambar_produk" class="form-control"
                              value="{{ $response[0]->gambar_produk }}" readonly>
                           <br />
                           <label for="" class="form-label">Ganti Gambar produk :</label> <br>
                           <input type="file" name="gambar_produk_new" id="" class="form-control"
                              aria-describedby="helpId" />
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Nama produk :</label>
                           <input type="text" name="nama_produk" id="" class="form-control" placeholder=""
                              aria-describedby="helpId" value="{{ $response[0]->nama_produk }}">
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Keterangan produk :</label>
                           <textarea class="form-control" name="keterangan_produk" id="" cols="30"
                              rows="10">{{ $response[0]->keterangan_produk }}</textarea>
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
                           <select class="form-control" name="status_produk" id="">
                              @if ($response[0]->status_produk == 9)
                              <option value="9" selected>Not-Display</option>
                              <option value="1">Displayed</option>
                              @else
                              <option value="9">Not-Display</option>
                              <option value="1" selected>Displayed</option>
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