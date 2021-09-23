<div class="modal fade" id="confirm{{ $data_retur->id_pengajuan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Confirm</h5>
            </div>
            <form action="{{ url('Confirm') }}/{{ $data_retur->id_pengajuan }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menyetujui pengajuan ini</h6>
                </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{ $data_retur->id_pengajuan }}" name="edit_id_pengajuan">
                        @if (auth()->user()->divisi == "admin")
                        <input class="form-control" type="hidden" value="{{ $data_retur->noPO }}" name="po">
                        @endif
                        @if (auth()->user()->divisi == "marketing")
                        <label class="control-label mb-10"> PO <span class="help"> </span></label>
                        <input class="form-control" type="text" id="edit_noPO" name="edit_noPO" >
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!------------------------------------------------------ confirm retur ----------------------------------------------------------------------------->
<div class="modal fade" id="confirmRetur{{ $data_retur->id_pengajuan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Confirm</h5>
            </div>
            <form action="{{ url('Confirm') }}/{{ $data_retur->id_pengajuan }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menyetujui pengajuan ini</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{ $data_retur->id_pengajuan }}" name="edit_id_pengajuan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>

        </div>
    </div>
</div>
