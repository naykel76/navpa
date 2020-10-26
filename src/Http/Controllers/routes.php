<?php

use Illuminate\Support\Facades\Route;
use Naykel\Navpa\Http\Controllers\PageController;
/** -------------------------------------------------------------------------
 *  =!= IMPORTANT =!= IMPORTANT =!= IMPORTANT =!= IMPORTANT =!= IMPORTANT =!=
 * --------------------------------------------------------------------------
 * Add page routes for this package directly to the application web.php file.
 * This is to unsure that the page routes are loaded last. I am sure there is
 * some other fancy pants way to handle routes direct from the package and set
 * it to load last but it will do for now!
 */


// NK:TD need 'auth.admin'
Route::middleware([])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('pages', PageController::class)->except(['show']);
});




//  /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
// ///////////////////////////////////////////////////////////////////////////////
// Route::get('/', [PageController::class, 'home'])->name('home');   /////////////
// Route::get('/{page}', [PageController::class, 'show'])->name('page.show'); ///
// ///////////////////////////////////////////////////////////////////////////////
// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
