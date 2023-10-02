<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\{
    AuthController,
    UserController,
    DashboardController,
    AboutusController,
    PolicyController,
    TermConditionController,
    FaqController,
};
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





Route::get('/clear', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('optimize:clear', array(), $output);
    return $output->fetch();
});
Route::get('queue_work', function () {
    return Artisan::call('queue:work');
});

Route::get('get',function(){
    phpinfo();
});

/**
 * Admin routes
 */
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/admin/login', [AuthController::class, 'getLoginPage'])->name('login');
Route::post('admin/login', [AuthController::class, 'Login']);
Route::get('/admin/register', [AuthController::class, 'getRegisterPage']);
Route::post('admin/register', [AuthController::class, 'Register']);

Route::get('/admin/forgot-password', [AuthController::class, 'forgetPassword']);
Route::post('/admin/reset-password-link', [AuthController::class, 'resetPasswordLink']);
Route::get('/change_password/{id}', [AuthController::class, 'change_password']);
Route::post('/admin-reset-password', [AuthController::class, 'ResetPassword']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'getdashboard'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'getProfile'])->name('profile');
    Route::post('update-profile', [DashboardController::class, 'update_profile'])->name('profile.update');
    Route::post('change-email', [DashboardController::class, 'changeEmail'])->name('change.email');
    Route::post('change-password', [DashboardController::class, 'changePassword'])->name('change.password');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('users/status', [UserController::class, 'statusChange'])->name('users.status');
    
    Route::resource('users', UserController::class);
    Route::resource('about', AboutusController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('terms', TermConditionController::class);
    Route::resource('faq', FaqController::class);
});
