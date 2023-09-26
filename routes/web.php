<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GemCategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Admin\PriceListController;
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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


Route::middleware(['auth:web'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('/profile', [UserController::class, 'profile'])->name('admin.user.profile');
        Route::post('/change-password', [UserController::class, 'changePassword'])->name('admin.user.changePassword');
        Route::post('/change-personal', [UserController::class, 'changePersonal'])->name('admin.user.changePersonal');
    });
    Route::prefix('/quotation')->group(function () {
        Route::get('/', [QuotationController::class, 'index'])->name('admin.quotation.index');
        Route::post('/store', [QuotationController::class, 'store'])->name('admin.quotation.store');
        Route::get('/create', [QuotationController::class, 'create'])->name('admin.quotation.create');
    });
    Route::prefix('/price-list')->group(function () {
        Route::get('/', [PriceListController::class, 'index'])->name('admin.price_list.index');
        Route::post('/store', [PriceListController::class, 'store'])->name('admin.price_list.store');
        Route::get('/create', [PriceListController::class, 'create'])->name('admin.price_list.create');
    });


    Route::prefix('/gem-cat')->group(function () {
        Route::get('/', [GemCategoryController::class, 'list'])->name('admin.gem_cat.list');
        Route::post('/', [GemCategoryController::class, 'store'])->name('admin.gem_cat.store');
        Route::get('/create', [GemCategoryController::class, 'create'])->name('admin.gem_cat.create');
        Route::get('/{id}', [GemCategoryController::class, 'edit'])->name('admin.gem_cat.edit');
        Route::post('/update', [GemCategoryController::class, 'update'])->name('admin.gem_cat.update');
        Route::delete('/{id}', [GemCategoryController::class, 'delete'])->name('admin.gem_cat.delete');
    });

    Route::prefix('/image')->group(function () {
        Route::post('/upload', [ImageController::class, 'upload'])->name('admin.image.upload');
        Route::get('/delete', [ImageController::class, 'delete'])->name('admin.image.delete');
    });

    Route::prefix('/export-csv')->group(function () {
        Route::get('/customers', [ExportController::class, 'exportCustomerAsCsv'])->name('admin.export.exportCustomerAsCsv');
    });

    Route::get('/export/{id}', [PdfController::class, 'export'])->name('admin.pdf.export');
});
