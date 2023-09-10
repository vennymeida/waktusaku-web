<?php

use App\Http\Controllers\AlljobsController;
use App\Http\Controllers\DetailPerusahaan;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KategoriPekerjaanController;
use App\Http\Controllers\LokerPerusahaan;
use App\Http\Controllers\LowonganPekerjaanController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\PelamarListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\LamarController;
use App\Http\Controllers\LamarPerusahaan;
use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PerusahaanListController;
use App\Http\Controllers\ProfileKeahlianController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Kecamatan;
use App\Models\LowonganPekerjaan;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\MelamarController;
use App\Http\Controllers\StatusLamarController;

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

// Route::get('/login', function () {
//     if (auth()->check()) {
//         return redirect('/dashboard');
//     } else {
//         return view('auth/login');
//     }
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/all-jobs', [AlljobsController::class, 'index'])->name('all-jobs.index');
Route::get('/all-jobs/{loker}', [AlljobsController::class, 'show'])->name('all-jobs.show');
Route::get('/detail-perusahaan/{detail}', [DetailPerusahaan::class, 'show'])->name('detail-perusahaan.show');
Route::get('/contact-us', function () {
    return view('contact');
});
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');
Route::get('/about-us', function () {
    return view('about');
});

// Route::get('/login', function () {
//     if (auth()->check()) {
//         return redirect('/dashboard');
//     } else {
//         return view('auth/login');
//     }
// })->name('login');

Route::get('/login', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->hasRole('super-admin')) {
            return redirect('/dashboard');
        } elseif ($user->hasRole('Pencari Kerja') || $user->hasRole('Perusahaan')) {
            return redirect('/welcome');
        }
    } else {
        return view('auth/login');
    }
})->name('login');



Route::group(['middleware' => ['auth', 'verified']], function () {
    // Route::get('/dashboard', function () {
    //     return view('welcome');
    // });
    Route::get('/dashboard', function () {
        return view('home');
    });
    // Route::get('/welcome', [WelcomeController::class, 'index']);
    // Route::GET('/profile', [ProfileUserController::class, 'profile']);
    // Route::get('/profile', function () {
    //     return view('profile.index');
    // });
    Route::get('/welcome', [WelcomeController::class, 'index']);
    Route::GET('/profile', [ProfileUserController::class, 'profile']);
    Route::get('/profile', function () {
        return view('profile.index');
    });
    Route::get('/profile-admin', function () {
        return view('profile.super-admin');
    });
    Route::GET('/profile-edit', [ProfileUserController::class, 'profile'])
        ->name('profile.edit');
    Route::get('/getKelurahans', [ProfileUserController::class, 'getKelurahans'])->name('getKelurahans');
    Route::PUT('/update-profile-information', [ProfileUserController::class, 'update'])
        ->name('profile.user.update');
    Route::PUT('/update-perusahaan-information', [PerusahaanController::class, 'update'])
        ->name('profile.perusahaan.update');
    //user list

    Route::get('profile/keahlian/edit', [ProfileKeahlianController::class, 'edit'])->name('profile.keahlian.edit');
    Route::put('profile/keahlian/update', [ProfileKeahlianController::class, 'update'])->name('profile.keahlian.update');
    Route::delete('profile/keahlian/delete', [ProfileKeahlianController::class, 'deleteKeahlian'])->name('profile.keahlian.delete');
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pengalaman', PengalamanController::class);
    Route::resource('pelatihan', PelatihanController::class);

    Route::prefix('user-management')->group(function () {
        Route::resource('user', UserController::class);
        Route::match(['get', 'post'], '/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
            ->name('user.verify-email');
        Route::delete('/verify-email/{id}/{hash}', [UserController::class, 'verifyEmail'])
            ->name('user.delete-verify-email');
        Route::post('import', [UserController::class, 'import'])->name('user.import');
        Route::get('export', [UserController::class, 'export'])->name('user.export');
        Route::get('demo', DemoController::class)->name('user.demo');
        Route::post('user/update-roles/{user}', [UserController::class, 'updateRoles'])->name('user.update-roles'); // <- Add this line
        Route::get('/user/show/{user}', [UserController::class, 'view'])->name('user.view');


        Route::resource('pelamar', PelamarListController::class);
        Route::get('/pelamar', 'App\Http\Controllers\PelamarListController@index')->name('pelamar.index');

        Route::resource('perusahaan', PerusahaanListController::class);
        Route::get('/perusahaan', 'App\Http\Controllers\PerusahaanListController@index')->name('perusahaan.index');

        Route::get('/message', [ContactUsController::class, 'index'])->name('message.index');
        Route::delete('/message/{contactUs}', [ContactUsController::class, 'destroy'])->name('message.destroy');
    });

    Route::prefix('menu-management')->group(function () {
        Route::resource('menu-group', MenuGroupController::class);
        Route::resource('menu-item', MenuItemController::class);
    });
    Route::group(['prefix' => 'role-and-permission'], function () {
        //role
        Route::resource('role', RoleController::class);
        Route::get('role/export', ExportRoleController::class)->name('role.export');
        Route::post('role/import', ImportRoleController::class)->name('role.import');

        //permission
        Route::resource('permission', PermissionController::class);
        Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
        Route::post('permission/import', ImportPermissionController::class)->name('permission.import');

        //assign permission
        Route::get('assign', [AssignPermissionController::class, 'index'])->name('assign.index');
        Route::get('assign/create', [AssignPermissionController::class, 'create'])->name('assign.create');
        Route::get('assign/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign.edit');
        Route::put('assign/{role}', [AssignPermissionController::class, 'update'])->name('assign.update');
        Route::post('assign', [AssignPermissionController::class, 'store'])->name('assign.store');

        //assign user to role
        Route::get('assign-user', [AssignUserToRoleController::class, 'index'])->name('assign.user.index');
        Route::get('assign-user/create', [AssignUserToRoleController::class, 'create'])->name('assign.user.create');
        Route::post('assign-user', [AssignUserToRoleController::class, 'store'])->name('assign.user.store');
        Route::get('assing-user/{user}/edit', [AssignUserToRoleController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign-user/{user}', [AssignUserToRoleController::class, 'update'])->name('assign.user.update');
    });

    Route::prefix('menu-pekerjaan')->group(function () {
        Route::resource('keahlian', KeahlianController::class);
        Route::resource('kategori', KategoriPekerjaanController::class);
        Route::resource('loker', LowonganPekerjaanController::class);
        Route::resource('pelamarkerja', LamarController::class);
    });

    Route::resource('lamarperusahaan', LamarPerusahaan::class);

    Route::prefix('location-management')->group(function () {
        // kecamatan
        Route::resource('kecamatan', KecamatanController::class);
        Route::post('kecamtan/import', [KecamatanController::class, 'import'])->name('kecamatan.import');

        // kelurahan
        Route::resource('kelurahan', KelurahanController::class);
        Route::post('kelurahan/import', [KelurahanController::class, 'import'])->name('kelurahan.import');
    });
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmark/toggle', [BookmarkController::class, 'toggleBookmark'])->name('bookmark.toggle');
    Route::post('/bookmark/remove', [BookmarkController::class, 'removeBookmark'])->name('bookmark.remove'); // Add this line
    Route::post('/bookmark/add', [BookmarkController::class, 'addBookmark'])->name('bookmark.add'); // Add this line
    Route::post('/melamar', [MelamarController::class, 'store'])->name('melamar.store');

    //loker-perusahaan
    Route::resource('loker-perusahaan', LokerPerusahaan::class);
    Route::get('/status-lamaran', [StatusLamarController::class, 'index'])->name('melamar.status');
    Route::resource('dashboard', DashboardController::class);
});
