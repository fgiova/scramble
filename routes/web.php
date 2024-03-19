<?php

use Dedoc\Scramble\Http\Middleware\RestrictedDocsAccess;
use Illuminate\Support\Facades\Route;

Route::middleware(config('scramble.middleware', [RestrictedDocsAccess::class]))->prefix(config('scramble.doc_route', 'docs'))->group(function () {
    Route::get('/api.json', function (Dedoc\Scramble\Generator $generator) {
        return $generator();
    })->name('scramble.docs.index');

    Route::view('/api', 'scramble::docs')->name('scramble.docs.api');
});
