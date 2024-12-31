<?php

use App\Models\Party;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $customers = Party::where('party_type', 1);
        $suppliers = Party::where('party_type', 2);
        return view('dashboard', compact('customers', 'suppliers'));
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('customers', App\Livewire\Customer\Index::class)->name('customers.index');
    Route::get('suppliers', App\Livewire\Supplier\Index::class)->name('suppliers.index');
    Route::get('transactions/{id}', App\Livewire\Transaction\Index::class)->name('transactions.index');
    Route::get('reg-users', App\Livewire\RegisterUser\Index::class)->name('register-users');
    Route::get('transaction-report/{partyId}', [TransController::class, 'generateTransactionReport'])->name('transactions.report');

});
