<div class="modal fade" id="lunas{{ $hutang->id_pembelian }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">PELUNASAN</h5>
            </div>
            <form action="{{ url('lunas') }}/{{ $hutang->id_pembelian }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin sudah melunasi?</h6>
                </div>
            
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" value="{{ $hutang->id_pembelian }}" name="id_pembelian">
                        <label class="control-label mb-10"> Pelunasan Via :<span class="help"> </span></label>
                        <select class="form-control" id="status" name="status">
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>
