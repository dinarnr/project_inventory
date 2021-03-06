<div class="modal fade" id="konfirmasi{{ $detail->id_peminjaman}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Keterangan</h5>
            </div>
            <form action="{{ url('warehouse/peminjaman/konfirmasi') }}/{{ $detail->id_peminjaman}}" class="modal-body" method="post">
                {{ csrf_field() }}
                
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="control-label txt-left">Jumlah Yang di Kembalikan</label>
                            <input type="number" class="form-control" name="jumlah_kembali" value="{{$detail->jumlah}}">
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