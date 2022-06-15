<?php
    
    use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store'])->name('store_product');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
Route::patch('products/{id}', [ProductController::class, 'update'])->name('update_product');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('delete_product');
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{slug}', [ProductController::class, 'show'])->name('show_product');
require __DIR__.'/auth.php';
