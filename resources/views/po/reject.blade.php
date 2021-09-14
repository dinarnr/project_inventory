<div class="modal fade" id="reject{{ $data_po->id_PO }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Reject</h5>
            </div>
            <form action="{{ url('reject') }}/{{ $data_po->id_PO }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menolak?</h6>
                </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{ $data_po->id_PO }}" name="edit_id_po">
                        <label class="control-label mb-10"> Masukan keterangan <span class="help"> </span></label>
                        <input class="form-control" type="text" id="keterangan"  name="keterangan" value="{{ $data_po->keterangan }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
