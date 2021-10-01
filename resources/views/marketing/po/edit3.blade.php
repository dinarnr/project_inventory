<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<div class="modal fade" id="editppnpph{{ $detail->id_po }}" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
            </div>
            <form action="{{ url('marketing/po/ubah/draft') }}/{{ $detail->id_po }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">PPn <span class="help"> </span></label>
                        <input type="text" value="{{ $detail->ppn }}" name="edit_ppn" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">PPh<span class="help"> </span></label>
                        <input type="text" value="{{$detail->pph}}" name="edit_pph" class="form-control" placeholder="">
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

