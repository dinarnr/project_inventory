<div class="modal fade" id="reject{{ $data_retur->id_pengajuan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Reject</h5>
            </div>
            <form action="{{ url('Confirm') }}/{{ $data_retur->id_pengajuan }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menolak pengajuan ini</h6>
                </div>
                <div class="form-group">
                    <input type="hidden" value="{{ $data_retur->id_pengajuan }}" name="edit_id_pengajuan">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>

        </div>
    </div>
</div>
