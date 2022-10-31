@extends('admin.MainAdmin')

@section('datacareer')
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
                    <h5 class="card-title">Table certificate</h5>
                    <div class="table-responsive-lg">
                        <table id="dt_table" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Job Title</th>
                                    <th>Job Description</th>
                                    <th>Job Requirements</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th colSpan={2}>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($response as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_career }}</td>
                                    <td>{!! html_entity_decode(Str::limit($item->desc_career, 50, '...')) !!}</td>
                                    <td>{!! html_entity_decode(Str::limit($item->require_career, 50, '...')) !!}</td>
                                    <td>{{ Str::limit($item->email_career, 8, '...') }}</td>
                                    <td>@if ($item->status_career == 9)
                                        <b class="text-danger">Not-Display</b>
                                        @else
                                        <b class="text-success">Displayed</b>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('datacareer_id/'.$item->id_career) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ url('hapus_career/'. $item->id_career) }}"
                                            onclick="return confirm('Data akan dihapus! apakah ok?')"
                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add career
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add_career') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Job Title</label>
                        <input type="text" class="form-control @error('gambar_career') is-invalid  @enderror"
                            name="nama_career" id="" value="">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Job Description</label>
                        <textarea class="form-control" name="desc_career" id="" rows="3"></textarea>

                    </div> --}}

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Job Description</label>
                        <textarea class="form-control" name="desc_career" id="KeteranganShowing"></textarea>

                        {{--
                        <x-forms.tinymce-editor /> --}}
                        {{-- <textarea class="form-control" name="keterangan_showing" required></textarea> --}}
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Job Requirements</label>
                        <textarea class="form-control" name="require_career" id="KeteranganShowingUp"></textarea>
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        <small id="helpId" class="form-text text-muted"></small>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_career" id="" rows="3"
                            value="hrcdd@sinarmetrindo.co.id"></textarea>
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
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