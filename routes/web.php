<?php

use App\Http\Controllers\companyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\quotesController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/dashboard')->group(function () {
        route::get('/', [adminController::class, 'check'])->name('check');

        route::get('/companies', [companyController::class, 'index'])->name('companies.index');
        Route::prefix('/companies')->group(function () {
            Route::controller(companyController::class)->group(function () {
                route::name('companies.')->group(function () {
                    route::get('/create', 'create')->name('create');
                    route::get('/search', 'search')->name('search');
                    route::post('/', 'store')->name('store');
                    Route::prefix('/{company}')->group(function () {
                        route::prefix('/edit')->group(function () {
                            route::get('/', 'edit')->name('edit');
                            route::prefix('/users')->group(function () {
                                route::get('/', 'userIndex')->name('users');
                                route::name('users.')->group(function () {
                                    route::post('/', 'userAdd')->name('add');
                                    route::get('/{user}', 'userEdit')->name('edit');
                                    route::post('/{user}', 'userDestroy')->name('destroy');
                                    route::post('/{user}/update', 'userUpdate')->name('update');
                                });
                            });
                            route::prefix('quotes')->group(function () {
                                route::get('/', 'guotesIndex')->name("guotes");
                                route::post('/email', 'email')->name("guotes.email");
                            });
                        });
                        route::post('/update', 'update')->name('update');
                        route::post('/', 'destroy')->name('destroy');
                    });
                });
            });
        });
        Route::prefix('/roles')->group(function () {
            Route::controller(roleController::class)->group(function () {
                route::name('roles.')->group(function () {
                    route::get('/', 'index')->name('index');
                    route::get('/search', 'search')->name('search');
                    route::get('/create', 'create')->name('create');
                    route::post('/', 'store')->name('store');
                    route::prefix('/{role}')->group(function () {
                        route::get('/edit', 'edit')->name('edit');
                        route::post('/update', 'update')->name('update');
                        route::post('/', 'destroy')->name('destroy');
                    });
                });
            });
        });
        route::prefix('/users')->group(function () {
            route::controller(adminController::class)->group(function () {
                route::name('users.')->group(function () {
                    route::get('/', 'index')->name('index');
                    route::get('/search', 'search')->name('search');
                    route::get('/create', 'create')->name('create');
                    route::post('/', 'store')->name('store');
                    route::prefix('/{user}')->group(function () {
                        route::get('/edit', 'edit')->name('edit');
                        route::post('/update', 'update')->name('update');
                        route::post('/', 'destroy')->name('destroy');
                    });
                });
            });
        });
        route::prefix('/quotes')->group(function () {
            route::controller(quotesController::class)->group(function () {
                route::name('quotes.')->group(function () {
                    route::get('/', 'index')->name('index');

                    route::get('/search', 'search')->name('search');
                    route::get('/create', 'create')->name('create');
                    route::post('/', 'store')->name('store');
                    route::prefix('/{quote}')->group(function () {
                        route::get('/edit', 'edit')->name('edit');
                        route::get('/show', 'showQuote')->name('show');
                        route::put('/update', 'update')->name('update');
                        route::delete('/', 'destroy')->name('destroy');
                    });
                });
            });
        });
    });
    route::prefix('/user')->group(function () {
        route::controller(userController::class)->group(function () {
            route::name('user.')->group(function () {
                route::get('/company', 'index')->name('index');
                route::prefix('/company/{company}')->group(function () {
                    route::get('/', 'show')->name('show');
                    route::get("/employees", "employs")->name('companyEmployies');
                    route::get("/quotes", "quotes")->name('companyQuotes');
                    route::put("/quotes/accept", 'accept')->name('companyaccept');
                    route::post("/quotes/download", 'downloadPDF')->name('companyQuote.download');
                    route::post('quotes/download/file', 'downloadFile')->name('companyQuote.downloadFile');
                });
            });
        });
    });
});


require __DIR__ . '/auth.php';
