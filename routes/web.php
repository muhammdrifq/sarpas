<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\ACController;
use App\Http\Controllers\AlatAbsensiController;
use App\Http\Controllers\AnyCastController;
use App\Http\Controllers\AkrilikController;
use App\Http\Controllers\AlatCuciTanganController;
use App\Http\Controllers\BusaController;
use App\Http\Controllers\BateraiController;
use App\Http\Controllers\BackdropController;
use App\Http\Controllers\BackwooolController;
use App\Http\Controllers\BlowerController;
use App\Http\Controllers\BoxPVSController;
use App\Http\Controllers\CCTVController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\CowayHevaController;
use App\Http\Controllers\CerminController;
use App\Http\Controllers\CekSuhuController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\ChargerController;
use App\Http\Controllers\DrawerTroleyController;
use App\Http\Controllers\DestopSwitchController;
use App\Http\Controllers\DispenserController;
use App\Http\Controllers\ExhausetCosmoseController;
use App\Http\Controllers\ExtensenController;
use App\Http\Controllers\FilingCabinetController;
use App\Http\Controllers\FoldableController;
use App\Http\Controllers\FiguraController;
use App\Http\Controllers\GodoxController;
use App\Http\Controllers\HTController;
use App\Http\Controllers\HeadsetGamingController;
use App\Http\Controllers\HDMIController;
use App\Http\Controllers\JamDindingController;
use App\Http\Controllers\JetPamController;
use App\Http\Controllers\JackCanonController;
use App\Http\Controllers\KarpetController;
use App\Http\Controllers\KipasController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\KotakKayuController;
use App\Http\Controllers\LampuController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LemariController;
use App\Http\Controllers\LayarInfocusController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MicController;
use App\Http\Controllers\MixerController;
use App\Http\Controllers\MicrotickController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PayungController;
use App\Http\Controllers\PapanTulisController;
use App\Http\Controllers\PenghancurKertasController;
use App\Http\Controllers\PABXController;
use App\Http\Controllers\ProjectorController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\RanjangPasienController;
use App\Http\Controllers\ShowCaseController;
use App\Http\Controllers\StandTvController;
use App\Http\Controllers\SelectorController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\SkatController;
use App\Http\Controllers\SofaController;
use App\Http\Controllers\SocketController;
use App\Http\Controllers\ScandiskController;
use App\Http\Controllers\TabletController;
use App\Http\Controllers\TabungPemadamController;
use App\Http\Controllers\TanggaController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\TerminalKabelController;
use App\Http\Controllers\TiangTongkatController;
use App\Http\Controllers\ToaController;
use App\Http\Controllers\TorentController;
use App\Http\Controllers\TVController;
use App\Http\Controllers\TasController;
use App\Http\Controllers\TripodController;
use App\Http\Controllers\UPSController;
use App\Http\Controllers\WebCamController;
use App\Http\Controllers\WirelessController;

// INI ROUTE RELASI TABLE GEDUNG
use App\Http\Controllers\LtSGdSController;
use App\Http\Controllers\LtDGdSController;
use App\Http\Controllers\LttGdSController;
use App\Http\Controllers\LtEGdSController;
use App\Http\Controllers\LtSGdDController;
use App\Http\Controllers\LtdGdDController;
use App\Http\Controllers\LtTGdDController;
use App\Http\Controllers\LtEGdDController;
use App\Http\Controllers\BasementController;
use App\Http\Controllers\LtSGdTController;
use App\Http\Controllers\LtDGdTController;
use App\Http\Controllers\LtTGdTController;
use App\Http\Controllers\LtEGdTController;
use App\Http\Controllers\Gd4Controller;

// INI ROUTE PEMANGGILAN DATA RIWAYAT
use App\Http\Controllers\RiwayatController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-admin', function () {
    return view('layouts.admin');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/profil', function () {
    return view('profil');
});
Auth::routes();

Route::get('/home', function () {
    return view('home');
});
Auth::routes();
// Route::get('export_excel','InventarisController@export_excel');
Route::get('/inventaris/export_excel', [App\Http\Controllers\InventarisController::class, 'export_excel'])->name('export');
Route::post('/inventaris/import_excel', [App\Http\Controllers\InventarisController::class, 'import_excel'])->name('importInventaris');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('inventaris', InventarisController::class);
Route::resource('ac', ACController::class);
Route::resource('alatAbsensi', AlatAbsensiController::class);
Route::resource('anycast', AnyCastController::class);
Route::resource('akrilik', AkrilikController::class);
Route::resource('alatCuciTangan', AlatCuciTanganController::class);
Route::resource('busa', BusaController::class);
Route::resource('baterai', BateraiController::class);
Route::resource('backdrop', BackdropController::class);
Route::resource('backwoool', BackwooolController::class);
Route::resource('blower', BlowerController::class);
Route::resource('boxpvs', BoxPVSController::class);
Route::resource('cctv',CCTVController::class);
Route::resource('cpu',CPUController::class);
Route::resource('cowayheva',CowayHevaController::class);
Route::resource('cermin',CerminController::class);
Route::resource('ceksuhu',CekSuhuController::class);
Route::resource('container',ContainerController::class);
Route::resource('camera',CameraController::class);
Route::resource('charger',ChargerController::class);
Route::resource('drawertroley',DrawerTroleyController::class);
Route::resource('destopswitch',DestopSwitchController::class);
Route::resource('dispenser',DispenserController::class);
Route::resource('exhausetcosmose',ExhausetCosmoseController::class);
Route::resource('extensen',ExtensenController::class);
Route::resource('filingcabinet',FilingCabinetController::class);
Route::resource('foldable',FoldableController::class);
Route::resource('figura',FiguraController::class);
Route::resource('godox',GodoxController::class);
Route::resource('ht',HTController::class);
Route::resource('headsetgaming',HeadsetGamingController::class);
Route::resource('hdmi',HDMIController::class);
Route::resource('jamdinding',JamDindingController::class);
Route::resource('jetpam',JetPamController::class);
Route::resource('jackcanon',JackCanonController::class);
Route::resource('karpet',KarpetController::class);
Route::resource('kipas',KipasController::class);
Route::resource('kursi',KursiController::class);
Route::resource('komputer',KomputerController::class);
Route::resource('kotakkayu',KotakKayuController::class);
Route::resource('lampu',LampuController::class);
Route::resource('laptop',LaptopController::class);
Route::resource('lemari',LemariController::class);
Route::resource('layarinfocus',LayarInfocusController::class);
Route::resource('meja',MejaController::class);
Route::resource('mesin',MesinController::class);
Route::resource('mobil',MobilController::class);
Route::resource('mic',MicController::class);
Route::resource('mixer',MixerController::class);
Route::resource('microtick',MicrotickController::class);
Route::resource('monitor',MonitorController::class);
Route::resource('payung',PayungController::class);
Route::resource('papantulis',PapanTulisController::class);
Route::resource('penghancurkertas',PenghancurKertasController::class);
Route::resource('pabx',PABXController::class);
Route::resource('projector',ProjectorController::class);
Route::resource('printer',PrinterController::class);
Route::resource('rak',RakController::class);
Route::resource('ranjangpasien',RanjangPasienController::class);
Route::resource('showcase',ShowCaseController::class);
Route::resource('standtv',StandTvController::class);
Route::resource('selector',SelectorController::class);
Route::resource('scanner',ScannerController::class);
Route::resource('skat',SkatController::class);
Route::resource('sofa',SofaController::class);
Route::resource('socket',SocketController::class);
Route::resource('scandisk',ScandiskController::class);
Route::resource('tablet',TabletController::class);
Route::resource('tabungpemadam',TabungPemadamController::class);
Route::resource('tangga',TanggaController::class);
Route::resource('telephone',TelephoneController::class);
Route::resource('terminalkabel',TerminalKabelController::class);
Route::resource('tiangtongkat',TiangTongkatController::class);
Route::resource('toa',ToaController::class);
Route::resource('torent',TorentController::class);
Route::resource('tv',TVController::class);
Route::resource('tas',TasController::class);
Route::resource('tripod',TripodController::class);
Route::resource('ups',UPSController::class);
Route::resource('webcam',WebCamController::class);
Route::resource('wireless',WirelessController::class);

// INI ROUTE RELASI TABLE GEDUNG
Route::resource('ltsgds',LtSGdSController::class);
Route::resource('ltdgds',LtDGdSController::class);
Route::resource('lttgds',LttGdSController::class);
Route::resource('ltegds',LtEGdSController::class);
Route::resource('ltsgdd',LtSGdDController::class);
Route::resource('ltdgdd',LtdGdDController::class);
Route::resource('lttgdd',LtTGdDController::class);
Route::resource('ltegdd',LtEGdDController::class);
Route::resource('basement',BasementController::class);
Route::resource('ltsgdt',LtSGdTController::class);
Route::resource('ltdgdt',LtDGdTController::class);
Route::resource('lttgdt',LtTGdTController::class);
Route::resource('ltegdt',LtEGdTController::class);
Route::resource('gd4',Gd4Controller::class);

// INI ROUTE PEMANGGILAN DATA RIWAYAT

Route::resource('riwayat',RiwayatController::class);





