<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
            </div>
            <div class="modal-body">
                <!-- <h6 class="mb-15">Apakah anda yakin mengubah status</h6> -->
                <form>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">Nama</label>
                        <input type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left" for="example-email">Username <span class="help"> </span></label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">Password</label>
                        <input type="password" class="form-control" value="">
                    </div>
                    <div class="form-group mt-30 mb-30">
                        <label class="control-label mb-10 text-left">Level Hak Akses</label>
                        <select class="form-control">
                            <option>Warehouse</option>
                            <option>Admin</option>
                            <option>Teknisi</option>
                            <option>Marketing</option>
                            <option>Office</option>
                            <option>Purchasing</option>
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>