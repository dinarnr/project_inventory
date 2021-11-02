<?php

use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\LogController;
use App\Http\Controllers\Warehouse\DataBarangController;
use App\Http\Controllers\Warehouse\StokController;
use App\Http\Controllers\Warehouse\KategoriController;
use App\Http\Controllers\Warehouse\TrkMasukController;
use App\Http\Controllers\Warehouse\TrkKeluarController;
use App\Http\Controllers\Warehouse\PengajuanWarehouseController;
use App\Http\Controllers\Warehouse\PembelianWarehouseController;
use App\Http\Controllers\Warehouse\InstansiController;
use App\Http\Controllers\Warehouse\PoController;
use App\Http\Controllers\Warehouse\SoController;
use App\Http\Controllers\Warehouse\SupplierController;
use App\Http\Controllers\Warehouse\PeminjamanController;

use App\Http\Controllers\Marketing\InstansiMktController;
use App\Http\Controllers\Marketing\POMktController;
use App\Http\Controllers\Marketing\PengajuanMarketingController;

use App\Http\Controllers\Teknisi\PeminjamanTeknisiController;
use App\Http\Controllers\Teknisi\PengajuanTeknisiController;

use App\Http\Controllers\Purchasing\PembelianPurchasingController;
use App\Http\Controllers\Purchasing\PengajuanPurchasingController;

use App\Http\Controllers\Admin\PengajuanAdminController;
use App\Http\Controllers\Admin\PoAdminController;

use App\Http\Controllers\Office\ReportController;
use App\Http\Controllers\Office\StokOfficeController;
use App\Http\Controllers\Office\TrkOfficeController;
use App\Http\Controllers\Office\POOfficeController;
use App\Http\Controllers\Office\SOOfficeController;
use App\Http\Controllers\Office\PeminjamanOfficeController;
use App\Http\Controllers\Office\PembelianOfficeController;
use App\Http\Controllers\Office\TrkMasukOfficeController;
use App\Http\Controllers\Office\TrkKeluarOfficeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Marketing\PDFController;
use App\Http\Controllers\Warehouse\PengaturanController;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard/home', function () {
    return view('layout.master');
})->name('home');


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
//LOGIN
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin');;
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth', 'cekdivisi:teknisi,warehouse,marketing,admin,purchasing,administrator'], function () {

    Route::get('dashboard/home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('admin/profile/profile', [HomeController::class, 'profil']);
    Route::post('admin/profil/ubah/simpan', [UserController::class, 'updateProfil']);


    Route::group(['prefix' => 'warehouse/'], function () {
        // <----------------------DATA BARANG--------------------------->
        Route::get('barang', [DataBarangController::class, 'barang']);
        Route::get('barang/tambah', [DataBarangController::class, 'addbarang']);
        Route::post('barang/simpan', [DataBarangController::class, 'addbarang2']);
        Route::get('barang/ubah/{id_master}', [DataBarangController::class, 'editBarang']);
        Route::put('barang/ubah/simpan', [DataBarangController::class, 'updateBarang']);
        
        // <---------------------DATA STOK _--------------------------->
        Route::get('stok', [StokController::class, 'data_stok']);
        Route::get('stok/{kode_barang}', [StokController::class, 'detailstok']);

        // <----------------------DATA KATEGORI--------------------------->
        Route::get('kategori', [KategoriController::class, 'kategori']);
        Route::get('kategori/tambah', [KategoriController::class, 'addkategori']);
        Route::post('kategori/simpan', [KategoriController::class, 'addkategori2']);
        Route::get('kategori/ubah/{id_kategori}', [KategoriController::class, 'editKategori']);
        Route::post('kategori/ubah/simpan', [KategoriController::class, 'updateKategori']);

        // <----------------------DATA TRANSAKSI--------------------------->
        //MASUK 
        Route::get('transaksi/masuk', [TrkMasukController::class, 'transaksi']);
        Route::get('transaksi/masukbaru/tambah', [TrkMasukController::class, 'addmasukbaru']);
        Route::post('transaksi/masukbaru/simpan', [TrkMasukController::class, 'addmasukbaru2']);
        Route::post('transaksi/masukbaru/tambah/fetch', [TrkMasukController::class, 'fetch'])->name('trkmasukcontroller.fetch');
        // Route::get('transaksi/masukbaru/tambah/kode_barang/{nama_barang}', [TrkMasukontroller::class, 'kode_barang'])->name ('trkmasukcontroller.kode_barang');
        Route::get('transaksi/masukretur/tambah', [TrkMasukController::class, 'addmasukretur']);
        Route::post('transaksi/masukretur/simpan', [TrkMasukController::class, 'addmasukretur2']);
        Route::post('transaksi/masukretur/tambah/fetch', [TrkMasukController::class, 'fetch'])->name('trkmasukcontroller.fetch');

        Route::get('transaksi/detailmasukbaru/{no_transaksi}', [TrkMasukController::class, 'detailmasuk']);

        Route::post('transaksi/edit/jumlah/{id_transaksi}', [TrkMasukController::class, 'editjumlah']); //modal edit jumlah
        Route::get('transaksi/detailmasukretur/{no_transaksi}', [TrkMasukController::class, 'detailmasukretur']);
        //KELUAR
        Route::get('transaksi/keluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('brgkeluar', [TrkKeluarController::class, 'brgkeluar']);
        Route::get('brgkeluar/addkeluar', [TrkKeluarController::class, 'addkeluar']);
        Route::get('/transaksikeluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('transaksi/keluarbaru/tambah', [TrkKeluarController::class, 'addkeluarbaru']);
        Route::get('transaksi/keluargaransi/tambah', [TrkKeluarController::class, 'addkeluarbaru']);
        Route::post('transaksi/keluargaransi/simpan', [TrkKeluarController::class, 'keluargaransi']);
        Route::get('transaksi/detailkeluargaransi/{no_transaksi}', [TrkKeluarController::class, 'detailgaransi']);

        Route::get('transaksi/keluarretur/tambah', [TrkKeluarController::class, 'addkeluarretur']);
        Route::post('transaksi/keluarretur/simpan', [TrkKeluarController::class, 'addkeluarretur2']);
        Route::get('transaksi/detailkeluarretur/{no_transaksi}', [TrkKeluarController::class, 'detailretur']);
        Route::post('transaksi/keluarretur/tambah/kode', [TrkKeluarController::class, 'kode'])->name('trkkeluarcontroller.kode');

        Route::get('transaksi/keluarinstalasi/tambah', [TrkKeluarController::class, 'transaksiinstalasi']);
        Route::post('transaksi/keluarinstalasi/tambah/fetch', [TrkKeluarController::class, 'fetch'])->name('trkkeluarcontroller.fetch');
        Route::get('transaksi/keluarinstalasi/tambah/instansi/{no_so}', [TrkKeluarController::class, 'instansi'])->name('trkkeluarcontroller.instansi');
        Route::post('transaksi/keluarinstalasi/simpan', [TrkKeluarController::class, 'keluarinstalasi']);
        Route::get('transaksi/detailkeluarinstalasi/{no_transaksi}', [TrkKeluarController::class, 'detailinstalasi']);

        // <----------------------DATA SUPPLIER--------------------------->
        Route::get('supplier', [SupplierController::class, 'supplier']);
        Route::get('supplier/tambah', [SupplierController::class, 'add']);
        Route::post('supplier/simpan', [SupplierController::class, 'addSupplier']);
        Route::get('supplier/ubah/{id_supplier}', [SupplierController::class, 'editSup']);
        Route::post('supplier/ubah/simpan', [SupplierController::class, 'updateSup']);

        // <----------------------DATA INSTANSI--------------------------->
        Route::get('instansi', [InstansiController::class, 'instansi']);
        Route::post('instansi/simpan', [InstansiController::class, 'addInstansi']);
        Route::post('instansi/simpan2', [InstansiController::class, 'addInstansi2']);
        Route::get('instansi/tambah', [InstansiController::class, 'add']);
        Route::get('instansi/ubah/{id_instansi}', [InstansiController::class, 'editInstansi']);
        Route::post('instansi/ubah/simpan', [InstansiController::class, 'updateInstansi']);

        // <----------------------DATA SO--------------------------->
        Route::get('so/dataSO', [SoController::class, 'dataSO']);
        Route::get('so/detail/{no_PO}', [SOController::class, 'detailso']);
        Route::post('so/tambah/keterangan/{id_po}', [SOController::class, 'addket']);
        Route::post('so/confirmpo/{id_PO}', [SOController::class, 'confirmpo']);
        Route::post('so/reject/{id_PO}', [SOController::class, 'reject']);
        Route::post('so/draft/{id_PO}', [SOController::class, 'draft']);

        Route::get('so/draft/{no_PO}', [SOController::class, 'draftso']);

        // <----------------------DATA PEMINJAMAN--------------------------->
        Route::get('peminjaman', [PeminjamanController::class, 'peminjaman']);
        Route::post('peminjaman/kembali/{no_peminjaman}', [PeminjamanController::class, 'kembali']);
        Route::post('peminjaman/confirm/{no_peminjaman}', [PeminjamanController::class, 'confirm']);
        Route::post('peminjaman/konfirmasi/{id_peminjaman}', [PeminjamanController::class, 'kembali_barang']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanController::class, 'detailpeminjaman']);
        Route::post('peminjaman/setuju/{no_peminjaman}', [PeminjamanController::class, 'setuju']);

        // ---------------------------PENGAJUAN--------------------
        // //----------------------------- RETUR -----------------------------------------------
        Route::get('pengajuan/brgretur', [PengajuanWarehouseController::class, 'tabelRetur']);
        Route::get('pengajuan/detailretur/{no_pengajuan}', [PengajuanWarehouseController::class, 'detailpengajuanretur']);
        Route::post('pengajuan/comfirmretur/{id_detailPengajuan}', [PengajuanWarehouseController::class, 'comfirmretur']);
        // Route::get('/addretur', 'App\Http\Controllers\PengajuanController@addretur');
        // Route::post('/addretur2', 'App\Http\Controllers\PengajuanController@addretur2')->name('addretur2');
        // Route::get('pengajuan/editRetur/{id_pengajuan}', [PengajuanController::class, 'editRetur']);
        // Route::get('pengajuan/detailbaru/{id_pengajuan}', [PengajuanController::class, 'detailbaru']);
        // Route::post('/updateRetur', 'App\Http\Controllers\PengajuanController@updateRetur')->name('updateRetur');
        // Route::delete('deleteretur/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@deleteretur');
        // //----------------------------------- confirm//reject ---------------------------------------------------
        // Route::post('Confirm/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@Confirm');
        // Route::post('Reject/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@Reject');

        Route::get('pengajuan/pembelian', [PengajuanWarehouseController::class, 'pengpembelian']);
        Route::get('pengajuan/pembelian/tambah', [PengajuanWarehouseController::class, 'addpembelian']);
        Route::post('pengajuan/pembelian/simpan', [PengajuanWarehouseController::class, 'addpengajuanpembelian']);
        Route::get('pengajuan/pembelian/detail/{no_pengajuan}', [PengajuanWarehouseController::class, 'detailpengajuanpembelian']);


        // <----------------------DATA PEMBELIAN--------------------------->
        Route::get('pembelian/invoice', [PembelianWarehouseController::class, 'pembelian']);
        Route::get('pembelian/invoice/tambah/{id_PO}', [PembelianWarehouseController::class, 'addinvoice']);
        Route::get('pembelian/purchase', [PembelianWarehouseController::class, 'purchase']);
        Route::get('pembelian/invoice/tambah', [PembelianWarehouseController::class, 'addpembelian']);
        Route::post('pembelian/invoice/simpan', [PembelianWarehouseController::class, 'addpembelian2']);

        // <----------------------PENGATURAN--------------------------->
        Route::get('pengaturan/profil', [PengaturanController::class, 'profil']);
        Route::post('pengaturan/profil/simpan', [PengaturanController::class, 'updateProfil']);

    });

    Route::group(['prefix' => 'marketing/'], function () {
        // <----------------------DATA INSTANSI--------------------------->
        Route::get('instansi', [InstansiMktController::class, 'instansi']);
        Route::post('instansi/simpan', [InstansiMktController::class, 'addInstansi']);
        Route::post('instansi/simpan2', [InstansiMktController::class, 'addInstansi2']); //modal
        Route::get('instansi/tambah', [InstansiMktController::class, 'add']);
        Route::get('instansi/ubah/{id_instansi}', [InstansiMktController::class, 'editInstansi']);
        Route::post('instansi/ubah/simpan', [InstansiMktController::class, 'updateInstansi']);

        // <----------------------DATA PO--------------------------->
        Route::get('po', [POMktController::class, 'index']);
        Route::get('po/tambah', [POMktController::class, 'addpo']);
        Route::post('po/tambah/fetch', [POMktController::class, 'fetch'])->name('pomktcontroller.fetch');
        Route::post('po/tambah/instansi', [POMktController::class, 'instansi'])->name('pomktcontroller.instansi');
        Route::post('po/simpan', [POMktController::class, 'addpo2']);
        Route::get('po/ubah/{no_PO}', [POMktController::class, 'editpo']); //edit po
        Route::get('po/tambah/{no_PO}', [POMktController::class, 'add']); //tambah data di editpo
        Route::post('po/simpan2/draft', [POMktController::class, 'add2']);
        Route::post('po/proses/draft/{no_PO}', [POMktController::class, 'draft']);
        Route::post('po/batal/{id_PO}', [POMktController::class, 'batal']);
        // Route::post('po/simpan/draft', [POMktController::class, 'adddraft2']);
        Route::get('po/ubahdraft/{id_po}', [POMktController::class, 'editdraft']); //edit po
        Route::post('po/ubah/draft/simpan/{id_po}', [POMktController::class, 'editdraft2']); // edit keterangan di draft
        Route::get('po/detail/{no_PO}', [POMktController::class, 'detailpo']);
        Route::delete('po/deletepo/{id_po}', [POMktController::class, 'deletepo']);
        Route::delete('po/deletepo/{nid_PO}', [POMktController::class, 'deletepo']);
        Route::post('/po/tglpemasangan/{id_PO}', [POMktController::class, 'tglpemasangan']); // edit tanggal pemasangan

        // ----------------EMAIL&PDF------------
        Route::post('po/sendemail', [PDFController::class, 'email']);
        Route::get('po/cetak_pdf={id}', [PDFController::class, 'cetak_pdf'])->name('cetak_pdf');

        //  -------------------------RETUR-----------------------------
        Route::get('pengajuan/brgretur', [PengajuanMarketingController::class, 'tabelRetur']);
        Route::post('pengajuan/confirmpengajuan/{id_detailPengajuan}', [PengajuanMarketingController::class, 'proses']);
        Route::get('pengajuan/detail/{no_pengajuan}', [PengajuanMarketingController::class, 'detailretur']);
        //----------------------------- BARU -----------------------------------------------
        Route::get('pengajuan/brgbaru', [PengajuanMarketingController::class, 'tabelBaru']);
        Route::get('/addbaru', 'App\Http\Controllers\PengajuanController@addbaru');
        Route::post('pengajuan/confirmrekom/{id_detailPengajuan}', [PengajuanMarketingController::class, 'prosesrekom']);
        Route::post('/addbaru2', 'App\Http\Controllers\PengajuanController@addbaru2')->name('addbaru2');
        Route::get('pengajuan/editBaru/{id_pengajuan}', [PengajuanController::class, 'editBaru']);
        Route::post('/updateBaru', 'App\Http\Controllers\PengajuanController@updateBaru')->name('updateBaru');
        Route::delete('deletebaru/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@deletebaru');
        Route::get('pengajuan/detailrekom/{no_pengajuan}', [PengajuanMarketingController::class, 'detailbaru']);
        // -------------------------------- Pengajuan Pembelian -----------------------------------------
        Route::get('pengajuan/pembelian', [PengajuanMarketingController::class, 'pengpembelian']);
        Route::get('pengajuan/pembelian/detailpembelian/{no_pengajuan}', [PengajuanMarketingController::class, 'detailpembelian']);
        Route::get('pengajuan/pembelian/tambah', [PengajuanMarketingController::class, 'addpembelian']);
        Route::post('pengajuan/pembelian/simpan', [PengajuanMarketingController::class, 'addpembelian2']);
        Route::post('pengajuan/confirmpembelian/{id_detailPengajuan}', [PengajuanMarketingController::class, 'prosespembelian']);
        Route::post('pengajuan/edit/{id_detailPengajuan}', [PengajuanMarketingController::class, 'edit_jumlah']);

        // Route::post('pengajuan/pembelian/editable', [PengajuanMarketingController::class, 'editable'])->name('pengajuanmarketingcontroller.editable');
    });

    Route::group(['prefix' => 'teknisi/'], function () {
        // <----------------------DATA PEMINJAMAN--------------------------->
        Route::get('peminjaman', [PeminjamanTeknisiController::class, 'peminjaman']);
        Route::get('peminjaman/tambah', [PeminjamanTeknisiController::class, 'addpinjam']);
        Route::post('peminjaman/simpan', [PeminjamanTeknisiController::class, 'addpinjam2']);
        Route::get('peminjaman/ubah/{no_PO}', [PeminjamanTeknisiController::class, 'editpinjam']);
        Route::post('peminjaman/ubah/simpan', [PeminjamanTeknisiController::class, 'updatePinjam']);
        Route::post('peminjaman/kembali/{no_peminjaman}', [PeminjamanTeknisiController::class, 'kembali']);
        Route::post('peminjaman/detailkembali/{id_peminjaman}', [PeminjamanTeknisiController::class, 'detailkembali']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanTeknisiController::class, 'detailpeminjaman']);
        Route::post('peminjaman/tambah/fetch', [PeminjamanTeknisiController::class, 'fetch'])->name('peminjamanteknisicontroller.fetch');

        // <----------------------DATA PENGAJUAN--------------------------->
        Route::get('pengajuan/brgrekom', [PengajuanTeknisiController::class, 'tabelRekom']);
        Route::get('pengajuan/brgretur', [PengajuanTeknisiController::class, 'tabelRetur']);
        Route::get('pengajuan/rekomendasi/tambah', [PengajuanTeknisiController::class, 'addrekom']);
        Route::post('pengajuan/rekomendasi/simpan', [PengajuanTeknisiController::class, 'addrekom2']);
        // Route::get('pengajuan/rekomendasi/detail/{no_pengajuan}', [PengajuanTeknisiController::class, 'detailrekom']);
        Route::get('pengajuan/rekomendasi/detail/{no_pengajuan}', [PengajuanTeknisiController::class, 'detailrekom']);
        Route::get('pengajuan/rekomendasi/ubah/{id_pengajuan}', [PengajuanTeknisiController::class, 'editRekom']);
        Route::post('pengajuan/rekomendasi/ubah/simpan', [PengajuanTeknisiController::class, 'updateRekom']);

        Route::get('pengajuan/retur/tambah', [PengajuanTeknisiController::class, 'addretur']);
        Route::post('pengajuan/retur/tambah/kode', [PengajuanTeknisiController::class, 'kode'])->name('pengajuanteknisicontroller.kode');
        Route::post('pengajuan/retur/simpan', [PengajuanTeknisiController::class, 'addretur2']);
        Route::get('pengajuan/retur/detail/{no_pengajuan}', [PengajuanTeknisiController::class, 'detailretur']);
        Route::get('pengajuan/retur/ubah/{id_pengajuan}', [PengajuanTeknisiController::class, 'editRetur']);
        Route::post('pengajuan/retur/ubah/simpan', [PengajuanTeknisiController::class, 'updateRetur']);
    });

    Route::group(['prefix' => 'administrator/'], function () {
        Route::get('user', [UserController::class, 'users']);
        Route::get('log', [LogController::class, 'log']);
        Route::get('tambah', [UserController::class, 'addadmin']);
        Route::post('tambah/simpan', [UserController::class, 'addadmin2']);
        Route::get('edit/{id}', [UserController::class, 'editUser']);
        Route::post('edit/simpan', [UserController::class, 'updateUser']);
        Route::post('resetpassword', [UserController::class, 'resetPassword']);
    });
    Route::group(['prefix' => 'purchasing/'], function () {
        //--------------PEMBELIAN----------------
        Route::get('pembelian/invoice', [PembelianPurchasingController::class, 'pembelian']);
        Route::get('pembelian/invoice/tambah/{no_pengajuan}', [PembelianPurchasingController::class, 'addinvoice']);
        Route::get('pembelian/purchase', [PembelianPurchasingController::class, 'purchase']);
        Route::get('pembelian/invoice/tambah', [PembelianPurchasingController::class, 'addpembelian']);
        Route::post('pembelian/invoice/simpan', [PembelianPurchasingController::class, 'addpembelian2']);
        Route::get('/invoice/lunas/detail/{no_pengajuan}', [PembelianPurchasingController::class, 'detaillunas']);
        Route::get('/invoice/hutang/{no_pengajuan}', [PembelianPurchasingController::class, 'hutang']);
        Route::post('pembelian/hutang/simpan/{no_pengajuan}', [PembelianPurchasingController::class, 'bayar']);



        // ----------------PENGAJUAN------------
        Route::get('pengajuan/brgrekom', [PengajuanPurchasingController::class, 'tabelRekom']);
        Route::get('pengajuan/pembelian', [PengajuanPurchasingController::class, 'pengpembelian']);
        Route::get('pengajuan/pembelian/detailpengajuan/{no_pengajuan}', [PengajuanPurchasingController::class, 'detailpengajuan']);
        Route::post('pengajuan/confirmpengajuan/{id_detailPengajuan}', [PengajuanPurchasingController::class, 'prosespengajuan']);
        Route::get('pengajuan/pembelian/tambah', [PengajuanPurchasingController::class, 'addpembelian']);
        Route::post('pengajuan/pembelian/simpan', [PengajuanPurchasingController::class, 'addpembelian2']);
    });

    Route::group(['prefix' => 'admin/'], function () {
        Route::get('po', [PoAdminController::class, 'index']);
        Route::get('pengajuan/pembelian', [PengajuanAdminController::class, 'pengpembelian']);
    });

    Route::group(['prefix' => 'office/'], function () {
        Route::get('report/report', [ReportController::class, 'report']);
        Route::get('barang/stok', [StokOfficeController::class, 'stok']);
        Route::get('historystok/{kode_barang}', [StokOfficeController::class, 'history_stok']);
        Route::get('transaksi/masuk', [TrkMasukOfficeController::class, 'transaksimasuk']);
        Route::get('trk/detailmasukbaru/{no_transaksi}', [TrkMasukOfficeController::class, 'detailmasuk']);
        Route::get('transaksi/detailmasukretur/{no_transaksi}', [TrkMasukOfficeController::class, 'detailmasukretur']);
        Route::get('transaksi/detailkeluargaransi/{no_transaksi}', [TrkKeluarOfficeController::class, 'detailkeluargaransi']);
        Route::get('transaksi/detailkeluarinstalasi/{no_transaksi}', [TrkKeluarOfficeController::class, 'detailkeluarinstalasi']);
        Route::get('transaksi/detailkeluarretur/{no_transaksi}', [TrkKeluarOfficeController::class, 'detailkeluarretur']);

        Route::get('transaksi/keluar', [TrkKeluarOfficeController::class, 'transaksikeluar']);
        Route::get('po/datapo', [POOfficeController::class, 'po']);
        Route::get('po/datapo2', [POOfficeController::class, 'searchBystatus']);
        Route::get('so/dataso', [SOOfficeController::class, 'so']);
        Route::get('so/dataso2', [SOOfficeController::class, 'searchBystatus']);
        Route::get('peminjaman/datapinjam', [PeminjamanOfficeController::class, 'peminjaman']);
        Route::get('peminjaman/datapinjam2', [PeminjamanOfficeController::class, 'searchBydate']);
        Route::get('pembelian/datapembelian', [PembelianOfficeController::class, 'pembelian']);
        Route::get('po/detail/{no_PO}', [POOfficeController::class, 'detailpo']);
        Route::get('so/detail/{no_SO}', [SOOfficeController::class, 'detailso']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanOfficeController::class, 'detailpeminjaman']);
    });
});
