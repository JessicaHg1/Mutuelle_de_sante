<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CotisationController;
use App\Http\Livewire\Adherent;
use App\Http\Livewire\Beneficiaire;
use App\Http\Livewire\Cotisation;
use App\Http\Livewire\Cotisations\Cotiser;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Mutuelle;
use App\Http\Livewire\Partenariat;
use App\Http\Livewire\Pays;
use App\Http\Livewire\Prescription;
use App\Http\Livewire\Prestataire;
use App\Http\Livewire\Prestation;
use App\Http\Livewire\Soins;
use App\Http\Livewire\TestPDF;
use App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pays', Pays::class)->name('pays');

Route::get('/utilisateurs', User::class)->name('utilisateurs');

Route::get('/mutuelles', Mutuelle::class)->name('mutuelles');

Route::get('/adherents', Adherent::class)->name('adherents');

Route::get('/beneficiaires', Beneficiaire::class)->name('beneficiaires');

Route::get('/prestations', Prestation::class)->name('prestations');

Route::get('/prestataires', Prestataire::class)->name('prestataires');

Route::get('/cotisations', Cotisation::class)->name('cotisations');

Route::get('/reçu', [Cotisation::class, 'createPDF'])->name('reçu');

Route::get('/conventions', Partenariat::class)->name('conventions');

Route::post('/payer_cotisation', [CotisationController::class, 'store'])->name('payer_cotisation');

Route::get('/soins', Soins::class)->name('soins');

Route::get('/prescriptions', Prescription::class)->name('prescriptions');

Route::get('/dashbord', Dashboard::class)->name('dashboard');

Route::get('/pdf', TestPDF::class)->name('pdf');

Route::get('/test-p-d-f_pdf', [TestPDF::class, 'listeTestPdf'])->name('test-p-d-f_pdf');

Route::get('/test2', [TestPDF::class, 'test2'])->name('test2');

Route::get('/facture_test', [TestPDF::class, 'factureDom'])->name('facture_test');
