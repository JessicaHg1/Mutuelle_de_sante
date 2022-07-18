<?php

use App\Http\Livewire\Adherent;
use App\Http\Livewire\Beneficiaire;
use App\Http\Livewire\Cotisation;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Mutuelle;
use App\Http\Livewire\Prestataire;
use App\Http\Livewire\Prestation;
use App\Http\Livewire\Soins;
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

Route::get('/utilisateurs', User::class)->name('utilisateurs');

Route::get('/mutuelles', Mutuelle::class)->name('mutuelles');

Route::get('/prestations', Prestation::class)->name('prestations');

Route::get('/prestataires', Prestataire::class)->name('prestataires');

Route::get('/cotisaions', Cotisation::class)->name('cotisations');

Route::get('/soins', Soins::class)->name('soins');

Route::get('/dashbord', Dashboard::class)->name('dashboard');

Route::group(
    [
        "prefix" => "beneficiaires",
        'as' => 'beneficiaires.'
    ],
    function () {
        Route::get('/adherents', Adherent::class)->name('adherents');

        Route::get('/beneficiaire', Beneficiaire::class)->name('beneficiaire');
    }
);
