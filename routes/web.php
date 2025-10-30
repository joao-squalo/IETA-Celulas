<?php

use App\Http\Controllers\CellController;
use App\Livewire\Churches\ChurchCreate;
use App\Livewire\Churches\ChurchList;
use App\Livewire\Churches\ChurchShow;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get("/selecionarCelula", [CellController::class, 'selectCell'])->name('cells.select');
    Route::redirect('settings', 'settings/profile');

    Route::prefix('igrejas')->group(function () {
        Route::get('/', ChurchList::class)->name('churches.index');
        Route::get('/nova', ChurchCreate::class)->name('churches.new');
        Route::get('/{church}', ChurchShow::class)->name('churches.show');
    });




    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__ . '/auth.php';
