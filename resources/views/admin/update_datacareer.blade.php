@extends('admin.MainAdmin')

@section('datacareer')
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
                     <h5 class="card-title">Edit career</h5>
                     <form action="{{ url('update_career/'.$response[0]->id_career) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf


                        <div class="mb-3">
                           <label for="" class="form-label">Job Title :</label>
                           <input type="text" name="nama_career" id="" class="form-control" placeholder=""
                              aria-describedby="helpId" value="{{ $response[0]->nama_career }}">
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Job Description :</label>
                           <textarea class="form-control" name="desc_career" id="KeteranganShowing" cols="30"
                              rows="10">{{ $response[0]->desc_career }}</textarea>
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Job Requirements :</label>
                           <textarea class="form-control" name="require_career" id="KeteranganShowingUp" cols="30"
                              rows="10">{{ $response[0]->require_career }}</textarea>
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}
                        <div class="mb-3">
                           <label for="" class="form-label">Email:</label>
                           <input type="text" name="email_career" id="" class="form-control" placeholder=""
                              aria-describedby="helpId" value="{{ $response[0]->email_career }}">
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
                           <select class="form-control" name="status_career" id="">
                              @if ($response[0]->status_career == 9)
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
                        <a href="{{ url('datacareer') }}" class="btn btn-warning">Back</a>
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

<link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css')}}" />
<script type="text/javascript" src="{{ asset('richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{ asset('richtexteditor/plugins/all_plugins.js')}}"></script>
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
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
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
        if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
            e.stopImmediatePropagation();
        }
    });
</script>
@endsection