<div class="modal fade" id="confirm{{ $data_po->id_PO }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Confirm</h5>
            </div>
            <form action="{{ url('confirm') }}/{{ $data_po->id_PO }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menyetujui?</h6>
                </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{ $data_po->id_PO }}" name="edit_id_po">
                        <input class="form-control" type="hidden" value="{{ $data_po->no_PO }}" name="no_PO">
                        <input class="form-control" type="hidden" value="{{ $data_po->namaBarang }}" name="namaBarang">
                        <input class="form-control" type="hidden" value="{{ $data_po->jumlah }}" name="jumlah">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
