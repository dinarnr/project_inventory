<div class="modal fade" id="confirm{{ $peminjaman->no_peminjaman}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Confirm</h5>
            </div>
            <form action="{{ url('warehouse/peminjaman/confirm') }}/{{ $peminjaman->no_peminjaman}}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menyetujui pengembalian ini ?</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">*Catatan Dari Teknisi</label>
                        <input type="text" class="form-control" name="edit_stok" value="{{ $peminjaman->keterangan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">*Tambah Catatan</label>
                        <textarea type="text" class="form-control" name="konfirmasi" value=""></textarea>
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