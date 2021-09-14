<div class="modal fade" id="tambahinstansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Instansi</h5>
            </div>
            <div class="modal-body">
            <form action="{{ url('marketing/instansi/simpan2') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Nama <span class="help"> </span></label>
                                <input type="text" id="nama_instansi" name="nama_instansi" class="form-control" placeholder="">
                                @error('nama_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Email <span class="help"> </span></label>
                                <input type="email" id="email_instansi" name="email_instansi" class="form-control" placeholder="">
                                @error('email_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">PIC Instansi</label>
                                <input type="text" id="pic_instansi" name="pic_instansi" class="form-control" value="">
                                @error('pic_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Alamat</label>
                                <textarea id="alamat_instansi" name="alamat_instansi" class="form-control" rows="3"></textarea>
                                @error('alamat_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left"> No HP <span class="help"> </span></label>
                                <input type="number" id="telp_instansi" name="telp_instansi" class="form-control" placeholder="">
                                @error('telp_instansi')
                                <div class="tulisan">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="text-align:right;">
                                <button class="btn btn-success mr-5" name="submit" type="submit">Simpan</button>
                                <!-- <button class="btn btn-danger  " name="reset" type="reset">Batal
                                </button> -->
                            </div>
                        </form>
                        </div>

        </div>
    </div>