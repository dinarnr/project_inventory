<?php

use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\LogController;
use App\Http\Controllers\Warehouse\DataBarangController;
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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

        Route::post('transaksi/edit/jumlah/{id_transaksi}', [TrkMasukController::class, 'editjumlah']);//modal edit jumlah
        Route::get('transaksi/detailmasukretur/{no_transaksi}', [TrkMasukController::class, 'detailmasukretur']);
        //KELUAR
        Route::get('transaksi/keluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('brgkeluar', [TrkKeluarController::class, 'brgkeluar']);
        Route::get('brgkeluar/addkeluar', [TrkKeluarController::class, 'addkeluar']);
        Route::get('/transaksikeluar', [TrkKeluarController::class, 'transaksikeluar']);
        Route::get('transaksi/keluarbaru/tambah', [TrkKeluarController::class, 'addkeluarbaru']);
        Route::get('transaksi/keluargaransi/tambah', [TrkKeluarController::class, 'addkeluarbaru']);
        Route::post('transaksi/keluargaransi/simpan', [TrkKeluarController::class, 'keluargaransi']);
        
        Route::get('transaksi/keluarretur/tambah', [TrkKeluarController::class, 'addkeluarretur']);
        Route::post('transaksi/keluarretur/simpan', [TrkKeluarController::class, 'addkeluarretur2']);
    
        Route::get('transaksi/keluarinstalasi/tambah', [TrkKeluarController::class, 'transaksiinstalasi']);
        Route::post('transaksi/keluarinstalasi/tambah/fetch', [TrkKeluarController::class, 'fetch'])->name ('trkkeluarcontroller.fetch');
        // Route::post('transaksi/keluarinstalasi/simpan', [TrkKeluarController::class, 'keluarinstalasi']);

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
        Route::post('confirmpo/{id_PO}', 'App\Http\Controllers\PoController@confirmpo');
        Route::post('reject/{id_PO}', 'App\Http\Controllers\PoController@reject');
        // Route::get('so/keluarinstalasi/tambah/{no_PO}', [SOController::class, 'transaksiinstalasi']);
        // Route::post('/addinstalasi/fetch', 'SOController@fetch')->name ('socontroller.fetch');

        // <----------------------DATA PEMINJAMAN--------------------------->
        Route::get('peminjaman', [PeminjamanController::class, 'peminjaman']);
        Route::post('peminjaman/kembali/{no_peminjaman}', [PeminjamanController::class, 'kembali']);
        Route::post('peminjaman/confirm/{no_peminjaman}', [PeminjamanController::class, 'confirm']);
        Route::get('peminjaman/detail/{no_peminjaman}', [PeminjamanController::class, 'detailpeminjaman']);

        // ---------------------------PENGAJUAN--------------------
        // //----------------------------- RETUR -----------------------------------------------
        Route::get('pengajuan/brgretur', [PengajuanWarehouseController::class, 'tabelRetur']);
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
        Route::post('pengajuan/pembelian/simpan', [PengajuanWarehouseController::class, 'addpembelian2']);

        // <----------------------DATA PEMBELIAN--------------------------->
        Route::get('pembelian/invoice', [PembelianWarehouseController::class, 'pembelian']);
        Route::get('pembelian/invoice/tambah/{id_PO}', [PembelianWarehouseController::class, 'addinvoice']);
        Route::get('pembelian/purchase', [PembelianWarehouseController::class, 'purchase']);
        Route::get('pembelian/invoice/tambah', [PembelianWarehouseController::class, 'addpembelian']);
        Route::post('pembelian/invoice/simpan', [PembelianWarehouseController::class, 'addpembelian2']);
        //  Route::post('lunas/{id_pembelian}', 'App\Http\Controllers\PembelianController@lunas');
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
        Route::post('po/simpan2/draft', [POMktController::class, 'add2']);
        Route::post('po/proses/draft/{no_PO}', [POMktController::class, 'draft']);
        Route::post('po/batal/{id_PO}', [POMktController::class, 'batal']);
        // Route::post('po/simpan/draft', [POMktController::class, 'adddraft2']);
        Route::post('po/ubah/draft/{id_po}', [POMktController::class, 'editisidraft']); // edit keterangan di draft
        Route::get('po/detail/{no_PO}', [POMktController::class, 'detailpo']);
         // ----------------PENGAJUAN------------
        //  -------------------------RETUR-----------------------------
         Route::get('pengajuan/brgretur', [PengajuanMarketingController::class, 'tabelRetur']);
         Route::get('pengajuan/pembelian', [PengajuanMarketingController::class, 'pengpembelian']);
         Route::get('pengajuan/pembelian/tambah', [PengajuanMarketingController::class, 'addpembelian']);
         Route::post('pengajuan/pembelian/simpan', [PengajuanMarketingController::class, 'addpembelian2']); 
         //----------------------------- BARU -----------------------------------------------
        Route::get('pengajuan/brgbaru', [PengajuanMarketingController::class, 'tabelBaru']);
        Route::get('/addbaru', 'App\Http\Controllers\PengajuanController@addbaru');
        Route::post('/addbaru2', 'App\Http\Controllers\PengajuanController@addbaru2')->name('addbaru2');
        Route::get('pengajuan/editBaru/{id_pengajuan}', [PengajuanController::class, 'editBaru']);
        Route::post('/updateBaru', 'App\Http\Controllers\PengajuanController@updateBaru')->name('updateBaru');
        Route::delete('deletebaru/{id_pengajuan}', 'App\Http\Controllers\PengajuanController@deletebaru');
        Route::get('pengajuan/detailbaru/{id_pengajuan}', [PengajuanController::class, 'detailbaru']);
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

        // <----------------------DATA PENGAJUAN--------------------------->
        Route::get('pengajuan/brgrekom', [PengajuanTeknisiController::class, 'tabelRekom']);
        Route::get('pengajuan/brgretur', [PengajuanTeknisiController::class, 'tabelRetur']);
        Route::get('pengajuan/rekomendasi/tambah', [PengajuanTeknisiController::class, 'addrekom']);
        Route::post('pengajuan/rekomendasi/simpan', [PengajuanTeknisiController::class, 'addrekom2']);
        Route::get('pengajuan/rekomendasi/ubah/{id_pengajuan}', [PengajuanTeknisiController::class, 'editRekom']);
        Route::post('pengajuan/rekomendasi/ubah/simpan', [PengajuanTeknisiController::class, 'updateRekom']);
        Route::get('pengajuan/retur/tambah', [PengajuanTeknisiController::class, 'addretur']);
        Route::post('pengajuan/retur/simpan', [PengajuanTeknisiController::class, 'addretur2']);
        Route::get('pengajuan/retur/ubah/{id_pengajuan}', [PengajuanTeknisiController::class, 'editRetur']);
        Route::post('pengajuan/retur/ubah/simpan', [PengajuanTeknisiController::class, 'updateRetur']);
    });

    Route::group(['prefix' => 'administrator/'], function () {
        Route::get('/user', [UserController::class, 'users']);
        Route::get('/log', [LogController::class, 'log']);
        Route::get('/tambah', [UserController::class, 'addadmin']);
        Route::post('/tambah/simpan', [UserController::class, 'addadmin2']);
        Route::post('/ubah/simpan/{id}', [UserController::class, 'updateUser']);
    });
    Route::group(['prefix' => 'purchasing/'], function () {
        Route::get('pembelian/invoice', [PembelianPurchasingController::class, 'pembelian']);
        Route::get('pembelian/invoice/tambah/{id_PO}', [PembelianPurchasingController::class, 'addinvoice']);
        Route::get('pembelian/purchase', [PembelianPurchasingController::class, 'purchase']);
        Route::get('pembelian/invoice/tambah', [PembelianPurchasingController::class, 'addpembelian']);
        Route::post('pembelian/invoice/simpan', [PembelianPurchasingController::class, 'addpembelian2']);
        // ----------------PENGAJUAN------------
        Route::get('pengajuan/brgretur', [PengajuanPurchasingController::class, 'tabelRetur']);
        Route::get('pengajuan/pembelian', [PengajuanPurchasingController::class, 'pengpembelian']);
        Route::get('pengajuan/pembelian/tambah', [PengajuanPurchasingController::class, 'addpembelian']);
        Route::post('pengajuan/pembelian/simpan', [PengajuanPurchasingController::class, 'addpembelian2']); 

        
    });
    Route::group(['prefix' => 'admin/'], function () {
        Route::get('po', [PoAdminController::class, 'index']);
        Route::get('pengajuan/pembelian', [PengajuanAdminController::class, 'pengpembelian']);
    });

    Route::group(['prefix' => 'office/'], function () {
        Route::get('po', [PoAdminController::class, 'index']);
        Route::get('pengajuan/pembelian', [PengajuanAdminController::class, 'pengpembelian']);
    });
});
