<div class="modal fade" id="konfirmasi{{ $peminjaman->no_peminjaman}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Keterangan</h5>
            </div>
            <form action="{{ url('warehouse/peminjaman/confirm') }}/{{ $peminjaman->no_peminjaman}}" class="modal-body" method="post">
                {{ csrf_field() }}
                
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="control-label txt-left">Jumlah Yang di Kembalikan</label>
                            <input type="text" class="form-control">
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