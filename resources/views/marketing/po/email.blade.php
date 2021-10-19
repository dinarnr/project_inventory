<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Proses</h5>
            </div>

            <form action="{{url ('marketing/po/sendemail')}}" class="modal-body" method="post">
                @csrf
                <!-- <div class="container"> -->
                <input type="text" name="no_po" value="{{$no_PO}}" style="display: none;">
                <div class="">
                    <div class="form-group">
                        <label class="control-label txt-left">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                </div>
                <!-- </div> -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>