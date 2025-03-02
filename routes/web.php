<?php

use App\Http\Controllers\TransactionReportController;
use App\Livewire\Transaction\Index;
use App\Models\Party;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransController;
//use App\Http\Controllers\TransactionController;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        $customers = Party::where('party_type', 1)->where('user_id', auth()->id())->where('is_active', true)->get();
        $suppliers = Party::where('party_type', 2)->where('user_id', auth()->id())->where('is_active', true)->get();
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
    Route::get('/download-customers-pdf', [\App\Http\Controllers\CustomerReportController::class, 'exportPDF'])->name('customers.pdf');
    Route::get('/download-suppliers-pdf', [\App\Http\Controllers\SupplierReportController::class, 'exportPDF'])->name('supplier.pdf');
    Route::get('/transactions/pdf/{partyId}', [TransController::class, 'generatePDF'])->name('transactions.pdf');
    Route::get('customer-xls', App\Livewire\Customer\Index::class)->name('customers.index');

    Route::get('dash', App\Livewire\Pages\Dashboard::class)->name('dash');
    Route::get('cust', App\Livewire\Pages\Customer::class)->name('customer.page');
    Route::get('supl', App\Livewire\Pages\Supplier::class)->name('supplier.page');
    Route::get('trans/{id}', App\Livewire\Pages\Transaction::class)->name('transaction.page');
    Route::get('components', App\Livewire\Pages\Components::class)->name('components');

});
