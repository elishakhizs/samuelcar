<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\ProductController;
use App\Models\Competitions;
use App\Models\entries;
use App\Livewire\shop;

Route::get('/', function () {
    return view('Home');
})->name('Home');

Route::get('/Giveaway', function () {
    return view('Giveaway');
})->name('Giveaway');

Route::get('/Contact', function () {
    return view('Contact');
})->name('Contact');

// Pay (default fallback)
Route::get('/Pay', function () {
    $competition = Competitions::first();
    // Check if a competition exists
    if (!$competition) {
        return redirect()->route('Home')->with('error', 'No competitions available.');
    }
     return view('Pay', compact('competition'));
})->name('Pay');

Route::get('/auth-page', function () {
    return view('auth-page');
})->name('auth-page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');





Route::post('/competition/{id}', [CompetitionController::class, 'show']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/competition/{id}/free-entry', [EntryController::class, 'EntryFree'])->name('competition.free-entry');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
Route::post('/basket/remove/{index}', [BasketController::class, 'remove'])->name('basket.remove');
Route::post('/basket/update/{index}', [BasketController::class, 'update'])->name('basket.update');

Route::get('/checkout', [BasketController::class, 'index'])->name('checkout');
Route::post('/checkout', [BasketController::class, 'store'])->name('checkout.store');

//store 
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');



/// ADMIN LIVE WIRE
Route::get('/admin/product', function () {
    return view('admin.product');
});