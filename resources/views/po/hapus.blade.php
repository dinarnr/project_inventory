<div class="modal fade" id="hapus{{ $detail->id_po }}" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Hapus</h5>
            </div>
            <form action="{{ url('deletepo') }}/{{ $detail->id_po }}" class="modal-body" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="container">
                    <h6 class="mb-15">Apakah anda yakin menghapus data ini ?</h6>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </form>

        </div>
    </div>
</div>