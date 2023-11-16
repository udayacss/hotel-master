<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GemCategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/test', function () {
    return Inertia::render('Test');
})->name('test');


Route::middleware(['auth:web'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('/profile', [UserController::class, 'profile'])->name('admin.user.profile');
        Route::post('/change-password', [UserController::class, 'changePassword'])->name('admin.user.changePassword');
        Route::post('/change-personal', [UserController::class, 'changePersonal'])->name('admin.user.changePersonal');
        Route::get('/edit', [UserController::class, 'list'])->name('admin.user.edit');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
    });

    Route::prefix('/role')->group(function () {
        Route::get('/', [RoleController::class, 'list'])->name('admin.role.list');
        Route::get('/profile', [RoleController::class, 'profile'])->name('admin.role.profile');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::post('/update', [RoleController::class, 'create'])->name('admin.role.update');
    });

    Route::prefix('/seller')->group(function () {
        Route::get('/', [SellerController::class, 'list'])->name('admin.seller.list');
        Route::get('/create', [SellerController::class, 'create'])->name('admin.seller.create');
        Route::post('/store', [SellerController::class, 'store'])->name('admin.seller.store');
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
