<?php
    
    use App\Http\Controllers\TagController;
    use Illuminate\Support\Facades\Route;
    
    /*Route::get('products/create', [ProductController::class, 'create']);
    Route::post('products', [ProductController::class, 'store'])->name('store_product');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::patch('products/{id}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{slug}', [ProductController::class, 'show'])->name('show_product');*/
    
    
    Route::resource('tags', TagController::class);
