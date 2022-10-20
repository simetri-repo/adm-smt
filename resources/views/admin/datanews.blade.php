@extends('admin.MainAdmin')

@section('datanews')
active
@endsection
@section('content')
<!-- Page content-->
<div class="container-fluid py-3">
   <div class="row">
      <div class="col-12">
         @if (session('status_ok'))
         <div class="alert alert-success">
            {{ session('status_ok') }}
         </div>
         @endif

         @if (session('status_bad'))
         <div class="alert alert-danger">
            {{ session('status_bad') }}
         </div>
         @endif
         <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                  class="fa fa-plus"></i> ADD</button>
         </div>
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Table Berita</h5>
               <div class="table-responsive">
                  <table id="dt_table" class="display table table-striped" style="width:100%">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Gambar Berita</th>
                           <th>Nama Berita</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>

                        @foreach ($response as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td><img src="{{ asset($item->gambar_berita) }}" class="thumbnail" style="height: 200px">
                           </td>
                           <td>{{ $item->nama_berita }}</td>
                           <td>@if ($item->status_berita == 9)
                              <span class="text-danger">Not-Display</span>
                              @elseif($item->status_berita == 1)
                              <span class="text-success">Displayed</span>
                              @elseif($item->status_berita == 3)
                              <span class="text-success">Hot Topic</span>
                              @elseif($item->status_berita == 2)
                              <span class="text-success">Top Trending</span>
                              @endif
                           </td>
                           <td><a href="{{ url('datanews_id/'.$item->id_berita) }}" class="btn btn-warning"> Edit </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>

                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- ADD -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Berita
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ url('add_berita') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="mb-3">
                  <label for="" class="form-label">Gambar Berita</label>
                  <input type="file" class="form-control" placeholder="File" name="gambar_berita" id="gambar_berita">
                  {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
               </div>
               <div class="mb-3">
                  <label for="" class="form-label">Nama Berita</label>
                  <input type="text" class="form-control @error('gambar_berita') is-invalid  @enderror"
                     name="nama_berita" id="" value="">
                  {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
               </div>
               <div class="mb-3">
                  <label for="" class="form-label">Keterangan Berita</label>
                  <textarea class="form-control" name="keterangan_berita" id="" rows="3"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>
{{-- --}}
@endsection