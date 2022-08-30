<?php

namespace Modules\VideoService\Routes;

use Auth;
use Illuminate\Support\Facades\Route;
use Modules\VideoService\Http\Controller\Admin\FormatController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('format', FormatController::class)->names('format');
});

