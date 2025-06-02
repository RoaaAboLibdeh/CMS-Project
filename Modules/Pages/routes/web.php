<?php

use Illuminate\Support\Facades\Route;
use Modules\Pages\Http\Controllers\PagesController;
use Modules\Pages\Models\Page;
Route::get('{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->firstOrFail();
    // dd($page);
    return view('pages::show', ['page' => $page]);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pages', PagesController::class)->names('pages');
});



