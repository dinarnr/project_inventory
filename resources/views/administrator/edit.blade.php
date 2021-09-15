<div class="modal fade" id="edit{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
            </div>
            <div class="modal-body">
                <!-- <h6 class="mb-15">Apakah anda yakin mengubah status</h6> -->
                <form action="{{ url('administrator/ubah/simpan') }}/{{ $users->id}}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">Nama</label>
                        <input name="edit_nama" type="text" class="form-control" value="{{ $users->name }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">Email</label>
                        <input name="edit_email" type="text" class="form-control" value="{{ $users->email }}">
                    </div>
                    
                    <div class="form-group mt-30 mb-30">
                        <label class="control-label mb-10 text-left">Level Hak Akses</label>
                        <select name="edit_divisi" class="form-control">
                            <option>Warehouse</option>
                            <option>Admin</option>
                            <option>Teknisi</option>
                            <option>Marketing</option>
                            <option>Office</option>
                            <option>Purchasing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10 text-left">Status</label>
                        <select name="edit_status" value="{{ $users->status }}" class="form-control select2">
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Non Aktif</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Simpan</button>
            </div>
        </div>
    </div>