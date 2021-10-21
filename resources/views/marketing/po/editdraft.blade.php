<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<div class="modal fade" id="editdraft{{ $detail->id_po }}" role="dialog" aria-labelledby="exampleModalLabel1">
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
                        <label class="control-label mb-10 text-left" for="example-email">Nama Barang <span class="help"> </span></label>
                        <input type="text" value="{{ $detail->nama_barang }}" name="edit_nama" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Keterangan Barang<span class="help"> </span></label>
                        <input type="text" value="{{$detail->keterangan_barang}}" name="edit_keterangan" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Quantity <span class="help"> </span></label>
                        <input type="text" value="{{$detail->jumlah}}" name="edit_jumlah" id="edit_jumlah" class="form-control a1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Rate <span class="help"> </span></label>
                        <input type="text" value="{{number_format($detail->rate), 2}}" name="edit_rate" id="edit_rate" class="form-control b1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Amount <span class="help"> </span></label>
                        <input type="text"  name="edit_amount" id="edit_amount" value="{{number_format($detail->amount), 2}}" class="form-control c1" placeholder="" readonly>
                        <input type="hidden"  name="edit_amount1" id="edit_amount1" class="form-control d1" placeholder="" readonly>
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
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    };
    var i = 0;
    var total = 0;
    
    function pecah(bilangan) {
        var number_string = bilangan.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah;
    }
    var tanpa_rupiah = document.getElementById('edit_rate');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    $(document).ready(function() {
        $(".a1, .b1, .c1, .d1").on("keydown keyup", function(event) {
            var jumlah = $("#edit_jumlah").val();
            var rate = $("#edit_rate").val().split('.').join('');
            var reverse = (jumlah * rate).toString().split('').reverse().join('');
            amount = reverse.match(/\d{1,3}/g);
            amount = amount.join('.').split('').reverse().join('');
            $("#edit_amount").val(amount);
            $("#edit_amount1").val(amount.replace(/[^,\d]/g, '').toString());
        });
    });
</script>
