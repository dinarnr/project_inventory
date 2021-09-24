<div class="modal fade" id="tglpemasangan{{ $data_po->id_PO }}" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Ubah</h5>
            </div>
            <form action="{{ url('marketing/po/tglpemasangan') }}/{{ $data_po->id_PO }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <!-- <div class="container">
                    <h6 class="mb-15">Apakah anda yakin untuk membatalkan PO?</h6>
                </div> -->
            
                <div class="modal-body">
                    <div class="form-group">
                    <label class="control-label mb-10 text-left">Tanggal Pemasangan</label>
                        <input class="form-control" type="date" id="tglpemasangan" name="tglpemasangan" >
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
