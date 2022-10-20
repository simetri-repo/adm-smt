@extends('admin.MainAdmin')

@section('datauser')
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
               <h5 class="card-title">Table User</h5>
               <div class="table-responsive">
                  <table id="dt_table" class="display table table-striped" style="width:100%">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Username</th>
                           <th>Role</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($response as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->username }}</td>
                           <td>
                              @if ($item->role == 1)
                              ADMIN
                              @else
                              USER
                              @endif
                           </td>
                           <td>
                              @if ($item->status == 0)
                              <b class="text-success">Active</b>
                              @else
                              <b class="text-danger">Blocked</b>
                              @endif
                           </td>
                           <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                 data-bs-target="#editForm{{ $loop->iteration }}">Edit</button></td>
                        </tr>

                        <!-- EDIT -->
                        <div class="modal fade" id="editForm{{ $loop->iteration }}" data-bs-backdrop="static"
                           data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                           aria-hidden="true">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit User
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <form action="#" method="post">
                                       @csrf
                                       <div class="mb-3">
                                          <label for="" class="form-label">Email</label>
                                          <input type="text" class="form-control" name="" id=""
                                             aria-describedby="helpId" placeholder="" value="{{ $item->username }}"
                                             readonly />
                                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                       </div>
                                       <div class="mb-3">
                                          <label for="" class="form-label">Role :</label>
                                          <select class="form-select" name="" id="">
                                             @if ($item->role == 1)
                                             <option value="1" selected>Admin</option>
                                             <option value="3">User</option>
                                             @else
                                             <option value="1">Admin</option>
                                             <option value="3" selected>User</option>
                                             @endif
                                          </select>
                                       </div>
                                       <div class="mb-3">
                                          <label for="" class="form-label">Role :</label>
                                          <select class="form-select" name="" id="">
                                             @if ($item->status == 0)
                                             <option value="0" selected>Active</option>
                                             <option value="9">Blocked</option>
                                             @else
                                             <option value="0">Active</option>
                                             <option value="9" selected>Blocked</option>
                                             @endif
                                          </select>
                                       </div>
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                       <a href="{{ url('reset_password/'.$item->id) }}" class="btn btn-warning">Reset
                                          Password</a>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
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
            <h5 class="modal-title" id="staticBackdropLabel">ADD User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="regist_save" method="post">
               @csrf
               <div class="mb-3">
                  <label for="" class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                  {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
               </div>
               <div class="mb-3">
                  <label for="" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                     placeholder="" onkeyup='check();'>
                  {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
               </div>
               <div class="mb-3">
                  <label for="" class="form-label">re_Password</label>
                  <input type="password" class="form-control" name="repassword" id="repassword"
                     aria-describedby="helpId" placeholder="" onkeyup='check();'>
                  <small id="message" class="form-text">Help text</small>
               </div>

               <div class="mb-3">
                  <label for="" class="form-label">Role :</label>
                  <select class="form-select" name="role" id="">
                     {{-- <option selected>Select one</option> --}}
                     {{-- <option value="9">Super Admin</option> --}}
                     <option value="1">Admin</option>
                  </select>
               </div>
               <button type="submit" disabled id="okei" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>

{{-- --}}

@endsection

@section('script_footer')
<script>
   var check = function() {
   if (document.getElementById('password').value ==
   document.getElementById('repassword').value) {
   document.getElementById('message').style.color = 'green';
   document.getElementById('message').innerHTML = 'matching';
   $('#okei').removeAttr('disabled');
   } else {
   document.getElementById('message').style.color = 'red';
   document.getElementById('message').innerHTML = 'not matching';
   $('#okei').attr('disabled', true);
   }
   }
</script>
@endsection