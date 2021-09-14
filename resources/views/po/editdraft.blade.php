<div class="modal fade" id="editdraft{{ $detail->id_po }}" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
            </div>
            <form action="{{ url('editisidraft') }}/{{ $detail->id_po }}" class="modal-body" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Nama Barang <span class="help"> </span></label>
                        <input type="text" value="{{ $detail->nama_barang }}" name="edit_nama" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Keterangan Barang<span class="help"> </span></label>
                        <input type="text" value="{{$detail->keterangan_barang}}" name="edit_keterangan" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Quantity <span class="help"> </span></label>
                        <input type="text" value="{{$detail->jumlah}}" name="edit_jumlah" id="jumlah" class="form-control a2" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Rate <span class="help"> </span></label>
                        <input type="text" value="{{$detail->rate}}" name="edit_rate" id="rate" class="form-control b2" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Amount <span class="help"> </span></label>
                        <input type="text" value="{{$detail->amount}}" name="edit_amount" id="amount" class="form-control" placeholder="" readonly>
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
<script>
//     $(document).ready(function() {
//         $(".a2, .b2").on("keydown keyup", function(event) {
//             var jumlah = $("#jumlah").val();
//             var rate = $("#rate").val().split('.').join('');
//             var reverse = (jumlah * rate).toString().split('').reverse().join('');
//             amount = reverse.match(/\d{1,3}/g);
//             amount = amount.join('.').split('').reverse().join('');
//             $("#amount").val(amount);
//         });
//     });
// </script>