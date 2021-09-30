<div class="modal fade" id="kembali{{ $peminjaman->no_peminjaman}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Peminjaman</h5>
            </div>
            <form action="{{ url('teknisi/peminjaman/kembali') }}/{{$peminjaman->no_peminjaman }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin mengembalikan barang ?</h6>
                </div>
                <div class="modal-body">
                <label class="control-label mb-10 text-left">*Catatan</label>
                <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
                               
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
