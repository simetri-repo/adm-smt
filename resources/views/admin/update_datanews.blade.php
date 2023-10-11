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
                        <!--<div class="mb-3">-->
                        <!--   <label for="" class="form-label">Keterangan Berita :</label>-->
                        <!--   <textarea class="form-control" name="keterangan_berita" id="" cols="30"-->
                        <!--      rows="10">{{ $response[0]->keterangan_berita }}</textarea>-->
                        <!--   {{-- <small id="helpId" class="text-muted">Help text</small> --}}-->
                        <!--</div>-->
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan Berita :</label>
                            
                            <textarea class="form-control" name="keterangan_berita" id="KeteranganShowingUp" rows="4">{{ $response[0]->keterangan_berita }}</textarea>
                            <small id="helpId" class="form-text text-muted"></small>
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
                            <input type="date" class="form-control" name="updated_at" id=""
                                aria-describedby="helpId" placeholder="" value="{{ $response[0]->update_rilis }}">
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

@section('style')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('richtexteditor/plugins/all_plugins.js') }}"></script>
@endsection

@section('script')
    <script type="text/javascript">
        tinymce.init({
            selector: '#KeteranganShowing',
            plugins: [
                'advlist autolink link lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link media | preview fullscreen | ' +
                'forecolor backcolor',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'css/content.css'
        });

        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root")
                .length) {
                e.stopImmediatePropagation();
            }
        });
    </script>

    <script type="text/javascript">
        tinymce.init({
            selector: '#KeteranganShowingUp',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link media | preview fullscreen | ' +
                'forecolor backcolor | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'css/content.css'
        });

        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root")
                .length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
@endsection
