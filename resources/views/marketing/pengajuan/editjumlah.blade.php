@foreach ($data_detail as $detail)

<div class="modal fade" id="editjumlah{{ $detail->id_detailPengajuan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit Jumlah</h5>
            </div>
            <form action="{{url('marketing/pengajuan/pembelian/edit')}}/{{ $detail->id_detailPengajuan }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label">ID</label>
                        <input type="text" class="form-control" name="edit_id" value="{{$detail->id_detailPengajuan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" name="edit_nama" value="{{$detail->namaBarang}}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jumlah</label>
                        <input type="number" name="edit_jumlah" value="{{$detail->jmlBarang}}" class="form-control" >
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach