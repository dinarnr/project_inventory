<div class="modal fade" id="resetpassword{{ $users->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('administrator/resetpassword') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel1" style="float: left;">Reset Password</h5>
                </div>
                <div class="modal-body">
                                    @csrf
                        <h6 style="float: left;">Apakah anda yakin akan mereset password user ini ?</h6>
                        <input class="form-control" type="hidden" id="edit_password" name="edit_password" value="{{ $users->password}}" >
                
                </div>
                <div class="modal-footer">
                    <div class="form-group" style="text-align:right;">
                        <button class="btn btn-primary mr-5" name="submit" type="submit">Reset</button>
                        <button class="btn btn-danger  " name="reset" type="reset">Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>