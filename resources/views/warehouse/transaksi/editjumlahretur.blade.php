<div class="modal fade" id="editjumlah{{  $detail_retur->id_transaksi }}" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit Jumlah</h5>
            </div>
            <form action="{{url('warehouse/transaksi/edit/jumlah')}}/{{ $detail_retur->id_transaksi}}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Jumlah <span class="help"> </span></label>
                        <input type="text" value="{{ $detail_retur->jumlah }}" name="edit_jumlah" class="form-control" placeholder="">
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