<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GemCategoryController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\Test\ReCorrectionController;
use App\Http\Controllers\API\Admin\Seller\SellerController as SellerSellerController;
use App\Http\Controllers\BoardController;
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


Route::get('/', [DashboardController::class, 'guest'])->name('admin.dashboard.index');
Route::post('/guest/store', [SellerController::class, 'storeGuest'])->name('guest.seller.store');

Route::middleware(['auth:web'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->can('admin.dashboard');
    Route::get('/rollback/subscription-approve/{id}', [ReCorrectionController::class, 'rollbackSubscriptionApprove']);

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('admin.user.list')->can('user.list');
        Route::get('/profile', [UserController::class, 'profile'])->name('admin.user.profile');
        Route::post('/change-password', [UserController::class, 'changePassword'])->name('admin.user.changePassword');
        Route::post('/change-personal', [UserController::class, 'changePersonal'])->name('admin.user.changePersonal');
        Route::get('/edit', [UserController::class, 'list'])->name('admin.user.edit')->can('user.edit');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create')->can('user.create');
        Route::get('/my', [DashboardController::class, 'my'])->name('admin.user.my')->can('user.my');
    });

    Route::prefix('/role')->group(function () {
        Route::get('/', [RoleController::class, 'list'])->name('admin.role.list')->can('role.list');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit')->can('role.edit');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create')->can('role.create');
        Route::delete('/{role_id}', [RoleController::class, 'delete'])->name('admin.role.delete')->can('role.delete');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store')->can('role.store');
        Route::post('/update', [RoleController::class, 'create'])->name('admin.role.update')->can('role.update');
    });

    Route::prefix('/seller')->group(function () {
        Route::get('/', [SellerController::class, 'list'])->name('admin.seller.list')->can('seller.list');
        Route::get('/create', [SellerController::class, 'create'])->name('admin.seller.create')->can('seller.create');
        Route::post('/store', [SellerController::class, 'store'])->name('admin.seller.store')->can('seller.store');
        Route::post('/approve', [SellerController::class, 'approve'])->name('admin.seller.approve')->can('seller.approve');
    });

    Route::prefix('/subscription')->group(function () {
        Route::get('/', [SubscriptionController::class, 'list'])->name('admin.subscription.list')->can('subscription.list');
        Route::post('/approve', [SubscriptionController::class, 'approve'])->name('admin.subscription.approve')->can('subscription.approve');
    });

    Route::prefix('/board')->group(function () {
        Route::get('/', [BoardController::class, 'list'])->name('admin.board.list')->can('board.list');
        Route::get('/preview', [BoardController::class, 'listPreview'])->name('admin.board.preview')->can('board.list');
        Route::get('/create', [BoardController::class, 'create'])->name('admin.board.create')->can('board.create');
        Route::post('/store', [BoardController::class, 'store'])->name('admin.board.store')->can('board.store');
    });

    Route::prefix('/image')->group(function () {
        Route::post('/upload', [ImageController::class, 'upload'])->name('admin.image.upload');
        Route::get('/delete', [ImageController::class, 'delete'])->name('admin.image.delete');
    });

    Route::prefix('/export-csv')->group(function () {
        Route::get('/customers', [ExportController::class, 'exportCustomerAsCsv'])->name('admin.export.exportCustomerAsCsv');
    });

    Route::get('/export/{id}', [PdfController::class, 'export'])->name('admin.pdf.export');

    Route::prefix('/api')->group(function () {

        Route::prefix('/general')->group(function () {
            Route::get('/nav', [GeneralSettingsController::class, 'getNavData'])->name('api.getNavData');
        });
        Route::prefix('/seller')->group(function () {
            Route::get('/search', [SellerSellerController::class, 'searchSeller'])->name('api.searchSeller');
        });
        Route::prefix('/admin')->group(function () {
            Route::get('/withdraw', [SellerSellerController::class, 'withdraw'])->name('api.withdraw');
        });
    });
});
