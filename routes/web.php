<?php

use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\LogController;
use App\Http\Controllers\Warehouse\DataBarangController;
use App\Http\Controllers\Warehouse\KategoriController;
use App\Http\Controllers\Warehouse\TrkMasukController;
use App\Http\Controllers\Warehouse\TrkKeluarController;
use App\Http\Controllers\Warehouse\InstansiController;
use App\Http\Controllers\Warehouse\PoController;
use App\Http\Controllers\Warehouse\SoController;
use App\Http\Controllers\Warehouse\SupplierController;
use App\Http\Controllers\Warehouse\PeminjamanController;

use App\Http\Controllers\Marketing\InstansiMktController;
use App\Http\Controllers\Marketing\POMktController;

use App\Http\Controllers\Teknisi\PeminjamanTeknisiController;

use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\TransaksiController;
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


//LOGIN
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin');;
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth', 'cekdivisi:teknisi,warehouse,marketing,admin,purchasing,administrator'], function () {

    Route::get('dashboard/home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'warehouse/'], function () {
        // <----------------------DATA BARANG--------------------------->
        Route::get('barang', [DataBarangController::class, 'barang']);
        Route::get('barang/tambah', [DataBarangController::class, 'addbarang']);
        Route::post('barang/simpan', [DataBarangController::class, 'addbarang2']);
        Route::get('barang/ubah/{id_master}', [DataBarangController::class, 'editBarang']);
        Route::put('barang/ubah/simpan', [DataBarangController::class, 'updateBarang']);

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
        Route::get('transaksi/masukretur/tambah', [TrkMasukController::class, 'addmasukretur']);
        Route::post('transaksi/masukretur/simpan', [TrkMasukController::class, 'addmasukretur2']);
        Route::get('transaksi/detailmasukbaru/{no_transaksi}', [TrkMasukController::class, 'detailmasuk']);
        Route::get('transaksi/detailmasukretur/{no_transaksi}', [TrkMasukController::class, 'detailmasukretur']);
        //KELUAR
        Route::get('transaksi/keluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('brgkeluar', [TrkKeluarController::class, 'brgkeluar']);
        Route::get('brgkeluar/addkeluar', [TrkKeluarController::class, 'addkeluar']);
        Route::get('/transaksikeluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('transaksi/keluarbaru/tambah', [TrkKeluarController::class, 'addkeluarbaru']);
        // Route::post('transaksi/keluarbaru/simpan', [TrkKeluarController::class, 'addkeluarbaru2']);
        Route::post('transaksi/keluarbaru/simpan', [TrkKeluarController::class, 'keluargaransi']);
        Route::get('transaksi/keluarretur/tambah', [TrkKeluarController::class, 'addkeluarretur']);
        Route::post('transaksi/keluarretur/simpan', [TrkKeluarController::class, 'addkeluarretur2']);
        Route::post('/addkeluarbaru/fetch', 'TrkKeluarController@fetch')->name ('trkkeluarcontroller.fetch');

        // <----------------------DATA SUPPLIER--------------------------->
        Route::get('supplier', [SupplierController::class, 'supplier']);
        Route::get('supplier/tambah', [SupplierController::class, 'add']);
        Route::post('supplier/simpan', [SupplierController::class, 'addSupplier']);
        // Route::get('supplier', 'App\Http\Controllers\SupplierController@supplier');
        // Route::post('supplier/insert', [SupplierController::class, 'insert']);
        Route::get('supplier/ubah/{id_supplier}', [SupplierController::class, 'editSup']);
        Route::post('supplier/ubah/simpan', [SupplierController::class, 'updateSup']);

        // <----------------------DATA INSTANSI--------------------------->
        // Route::get('instansi', [InstansiController::class, 'instansiview']);
        Route::get('instansi', [InstansiController::class, 'instansi']);
        Route::post('instansi/simpan', [InstansiController::class, 'addInstansi']);
        Route::post('instansi/simpan2', [InstansiController::class, 'addInstansi2']);
        Route::get('instansi/tambah', [InstansiController::class, 'add']);
        Route::get('instansi/ubah/{id_instansi}', [InstansiController::class, 'editInstansi']);
        Route::post('instansi/ubah/simpan', [InstansiController::class, 'updateInstansi']);

        // <----------------------DATA SO--------------------------->
        Route::get('so/dataSO', [SoController::class, 'dataSO']);
        Route::get('po/detail/{no_PO}', [POController::class, 'detailpo']);
        Route::post('po/tambahketerangan/{id_po}', [POController::class, 'addket']);
        Route::post('confirmpo/{id_PO}', 'App\Http\Controllers\PoController@confirmpo');
        Route::post('reject/{id_PO}', 'App\Http\Controllers\PoController@reject');

        Route::get('so/keluarinstalasi/tambah/{no_PO}', [SOController::class, 'transaksiinstalasi']);
        Route::post('/addinstalasi/fetch', 'SOController@fetch')->name ('socontroller.fetch');


 

        // <----------------------DATA PEMINJAMAN--------------------------->
        Route::get('peminjaman', [PeminjamanController::class, 'peminjaman']);
        Route::post('peminjaman/kembali/{no_peminjaman}', [PeminjamanController::class, 'kembali']);
        Route::post('peminjaman/confirm/{no_peminjaman}', [PeminjamanController::class, 'confirm']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanController::class, 'detailpeminjaman']);
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
        Route::post('po/simpan', [POMktController::class, 'addpo2']);
        Route::get('po/ubah/{no_PO}', [POMktController::class, 'editpo']); //edit po
        Route::get('po/tambah/{no_PO}', [POMktController::class, 'add']); //tambah data di editpo
        Route::post('po/simpan2', [POMktController::class, 'add2']);
        Route::post('po/draft/{no_PO}', [POMktController::class, 'draft']);
        Route::post('po/batal/{id_PO}', [POMktController::class, 'batal']);
        Route::post('po/simpan/draft', [POMktController::class, 'adddraft2']);
        Route::post('po/ubah/draft/{id_po}', [POMktController::class, 'editisidraft']); // edit keterangan di draft
        Route::get('po/detail/{no_PO}', [POMktController::class, 'detailpo']);
    });


    Route::group(['prefix' => 'teknisi/'], function () {
        // <----------------------DATA PEMINJAMAN--------------------------->
        Route::get('peminjaman', [PeminjamanTeknisiController::class, 'peminjaman']);
        Route::get('peminjaman/tambah', [PeminjamanTeknisiController::class, 'addpinjam']);
        Route::post('peminjaman/simpan', [PeminjamanTeknisiController::class, 'addpinjam2']);
        Route::get('peminjaman/ubah/{no_PO}', [PeminjamanTeknisiController::class, 'editpinjam']); 
        Route::post('peminjaman/ubah/simpan', [PeminjamanTeknisiController::class, 'updatePinjam']);
        Route::post('peminjaman/kembali/{no_peminjaman}', [PeminjamanTeknisiController::class, 'kembali']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanTeknisiController::class, 'detailpeminjaman']);
    });

    Route::group(['prefix' => 'administrator/'], function(){
        Route::get('/user', [UserController::class,'users']);
        Route::get('/log', [LogController::class,'log']);
        Route::get('/tambah',[UserController::class,'addadmin']);
        Route::post('/tambah/simpan', [UserController::class,'addadmin2']); 
        Route::post('/ubah/simpan/{id}', [UserController::class,'updateUser']); 
    });

    // <----------------------DATA PENGAJUAN--------------------------->
    //----------------------------- BARU -----------------------------------------------
    // Route::get('/brgbaru', 'App\Http\Controllers\PengajuanController@tabelBaru');
    // Route::get('/addbaru', 'App\Http\Controllers\PengajuanController@addbaru');
    // Route::post('/addbaru2', 'App\Http\Controllers\PengajuanController@addbaru2')->name('addbaru2');
    // Route::get('pengajuan/editBaru/{id_pengajuan}', [PengajuanController::class, 'editBaru']);
    // Route::post('/updateBaru', 'App\Http\Controllers\PengajuanController@updateBaru')->name('updateBaru');
    // Route::delete('deletebaru/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@deletebaru');
    // Route::get('pengajuan/detailbaru/{id_pengajuan}', [PengajuanController::class, 'detailbaru']);

    // //----------------------------- RETUR -----------------------------------------------
    // Route::get('/brgretur', 'App\Http\Controllers\PengajuanController@tabelRetur');
    // Route::get('/addretur', 'App\Http\Controllers\PengajuanController@addretur');
    // Route::post('/addretur2', 'App\Http\Controllers\PengajuanController@addretur2')->name('addretur2');
    // Route::get('pengajuan/editRetur/{id_pengajuan}', [PengajuanController::class, 'editRetur']);
    // Route::get('pengajuan/detailbaru/{id_pengajuan}', [PengajuanController::class, 'detailbaru']);
    // Route::post('/updateRetur', 'App\Http\Controllers\PengajuanController@updateRetur')->name('updateRetur');
    // Route::delete('deleteretur/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@deleteretur');
    // //----------------------------------- confirm//reject ---------------------------------------------------
    // Route::post('Confirm/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@Confirm');
    // Route::post('Reject/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@Reject');

    // Route::get('/pengpembelian', 'App\Http\Controllers\PengajuanController@pengpembelian');
    // Route::get('/addpembelian', 'App\Http\Controllers\PengajuanController@addpembelian');



    // <----------------------DATA PEMBELIAN--------------------------->
    // Route::get('/pembelian', 'App\Http\Controllers\PembelianController@pembelian');
    // Route::get('/addinvoice/{id_PO}', 'App\Http\Controllers\PembelianController@addinvoice');
    // Route::get('purchase', 'App\Http\Controllers\PembelianController@purchase');
    // Route::post('addpembelian2', 'App\Http\Controllers\PembelianController@addpembelian2');
    // Route::post('lunas/{id_pembelian}', 'App\Http\Controllers\PembelianController@lunas');



    // <----------------------DATA PEMINJAMAN--------------------------->
    // Route::get('peminjaman', 'App\Http\Controllers\PeminjamanController@peminjaman');
    // Route::get('peminjaman/addpinjam', 'App\Http\Controllers\PeminjamanController@addpinjam');
    // Route::post('/addpinjam2', 'App\Http\Controllers\PeminjamanController@addpinjam2')->name('addpinjam2');
    // Route::get('/peminjaman/{id_peminjaman}', 'App\Http\Controllers\PeminjamanController@editpinjam');
    // // Route::get('peminjaman/editpinjam/{id_peminjaman}', [PeminjamanController::class, 'editpinjam']);
    // Route::post('/updatePinjam', 'App\Http\Controllers\PeminjamanController@updatePinjam')->name('updatePinjam');
    // Route::delete('deletepinjam/{id_peminjaman}', 'App\Http\Controllers\PeminjamanController@deletepinjam');
    // Route::post('kembali/{no_peminjaman}', 'App\Http\Controllers\PeminjamanController@kembali');
    // Route::post('confirm/{no_peminjaman}', 'App\Http\Controllers\PeminjamanController@confirm');
    // Route::get('peminjaman/detail/{peminjaman}', 'App\Http\Controllers\PeminjamanController@detailpeminjaman');


    // // ADMINISTRASI
    // Route::get('administrator', 'App\Http\Controllers\AdministratorController@users');
    // Route::get('log', 'App\Http\Controllers\AdministratorController@log');
    // Route::get('administrator/addadmin', 'App\Http\Controllers\AdministratorController@addadmin');
    // Route::post('/addadmin2', 'App\Http\Controllers\AdministratorController@addadmin2')->name('addadmin2');

    // <----------------------DATA INSTANSI--------------------------->

    // Route::get('instansi', [InstansiMktController::class, 'instansiview']);
    // Route::get('instansi', [InstansiMktController::class, 'instansi']);
    // Route::post('/addInstansi', [InstansiMktController::class, 'addInstansi']);
    // Route::post('/addInstansi2', [InstansiMktController::class, 'addInstansi2']);
    // Route::get('instansi/addinstansi', [InstansiMktController::class, 'add']);
    // Route::get('instansi/editInstansi/{id_instansi}', [InstansiMktController::class, 'editInstansi']);
    // Route::post('/updateInstansi', [InstansiMktController::class, 'updateInstansi']);
});
