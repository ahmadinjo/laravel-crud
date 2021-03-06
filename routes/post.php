<?php
    
    use App\Http\Controllers\PostController;
    use Illuminate\Support\Facades\Route;
    
    /*Route::get('products/create', [ProductController::class, 'create']);
    Route::post('products', [ProductController::class, 'store'])->name('store_product');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::patch('products/{id}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{slug}', [ProductController::class, 'show'])->name('show_product');*/
    
    
    Route::resource('posts', PostController::class);
    Route::get('posts/{post}/category', [PostController::class, 'showCategory']);
    Route::get('posts/{post}/tags', [PostController::class, 'showTags']);
