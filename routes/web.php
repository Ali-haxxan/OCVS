<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\VaccinesController;
// use App\Http\Middleware\authcheck;

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


// Parents Portal

Route::get('/', [UserAuth::class, 'login']);
Route::get('/register', [UserAuth::class, 'register'])->middleware('userLoggedin');
Route::post('/create', [UserAuth::class, 'create'])->name('user.create');
Route::post('/check', [UserAuth::class, 'check'])->name('user.login');
Route::get('/register-baby', [UserAuth::class, 'home'])->middleware("isLogged");
Route::get('/registered-babies', [UserAuth::class, 'RegisteredBabies'])->middleware("isLogged");    
Route::get('/fetch-child', [UserAuth::class, 'fetchChild'])->middleware("isLogged");
Route::get('/edit-child/{id}', [UserAuth::class, 'editRegisteredchild']); 
Route::post('/delete-child/{id}', [UserAuth::class, 'deleteRegisteredchild']);
Route::post('/update-child/{id}', [UserAuth::class, 'Childupdate']);
Route::get('/vaccination-vanue', [UserAuth::class, 'VaccinationVanue'])->middleware("isLogged");
Route::get('/vaccination-date', [UserAuth::class, 'VaccinationDate'])->middleware("isLogged");  
Route::get('/feedback', [UserAuth::class, 'Feedback'])->middleware("isLogged");
Route::post('/user-feedback/{id}', [UserAuth::class, 'UserFeedback']);
Route::get('/get-certificate', [UserAuth::class, 'GetCertificate'])->middleware("isLogged");
Route::post('/certificate/{id}', [UserAuth::class, 'fetchcertificate'])->middleware("isLogged");
Route::get('/fetch-certificate', [UserAuth::class, 'certificate'])->middleware("isLogged");
Route::post('/child-create/{id}', [ChildController::class, 'ChildCreate']);
Route::get('/logout', [UserAuth::class, 'logout']);




// Admin Portal

Route::get('/admin', [AdminAuth::class, 'login'])->middleware('adminLoggedin');
Route::get('/admin/register', [AdminAuth::class, 'register'])->middleware('adminLoggedin');
Route::post('/admin/create', [AdminAuth::class, 'create'])->name('admin.create');
Route::post('/admin/check', [AdminAuth::class, 'check'])->name('admin.login');
Route::get('/admin/medical-staff', [AdminAuth::class, 'home'])->middleware('isAdminLogged');
//  staff   routes
Route::post('/admin/add-staff', [StaffController::class, 'store'])->middleware('isAdminLogged');
Route::get('/admin/fetch-staff', [StaffController::class, 'fetch'])->middleware('isAdminLogged');
Route::get('/admin/edit-staff/{id}', [StaffController::class, 'edit'])->middleware('isAdminLogged');     
Route::put('/admin/update-staff/{sid}', [StaffController::class, 'update'])->middleware('isAdminLogged');
Route::delete('/admin/delete-staff/{id}', [StaffController::class, 'delete'])->middleware('isAdminLogged'); 
Route::post('/admin/staff-proceded/{id}', [AdminAuth::class, 'staffproceded'])->middleware('isAdminLogged'); 
//center routes
Route::post('/admin/add-center', [CenterController::class, 'store'])->middleware('isAdminLogged');
Route::get('/admin/fetch-center', [CenterController::class, 'fetch'])->middleware('isAdminLogged');
Route::get('/admin/edit-center/{id}', [CenterController::class, 'edit'])->middleware('isAdminLogged');     
Route::put('/admin/update-center/{id}', [CenterController::class, 'update'])->middleware('isAdminLogged');
Route::delete('/admin/delete-center/{id}', [CenterController::class, 'delete'])->middleware('isAdminLogged');
Route::post('/admin/center-proceded/{id}', [AdminAuth::class, 'proceded'])->middleware('isAdminLogged');
// vaccine routes
Route::post('/admin/add-vaccine', [VaccinesController::class, 'store'])->middleware('isAdminLogged');
Route::get('/admin/fetch-vaccine', [VaccinesController::class, 'fetch'])->middleware('isAdminLogged');
Route::get('/admin/edit-vaccine/{id}', [VaccinesController::class, 'edit'])->middleware('isAdminLogged');     
Route::put('/admin/update-vaccine/{id}', [VaccinesController::class, 'update'])->middleware('isAdminLogged');
Route::delete('/admin/delete-vaccine/{id}', [VaccinesController::class, 'delete'])->middleware('isAdminLogged');

Route::get('/admin/centers', [AdminAuth::class, 'centers'])->middleware('isAdminLogged');
Route::get('/admin/vaccines', [AdminAuth::class, 'vaccines'])->middleware('isAdminLogged');
Route::get('/admin/home-requests', [AdminAuth::class, 'HomeRequests'])->middleware('isAdminLogged');
Route::get('/admin/center-requests', [AdminAuth::class, 'CenterRequests'])->middleware('isAdminLogged');
Route::get('/admin/at-birth', [AdminAuth::class, 'AtBirth'])->middleware('isAdminLogged');
Route::get('/admin/6th-week', [AdminAuth::class, 'SixWeek'])->middleware('isAdminLogged');
Route::get('/admin/10th-week', [AdminAuth::class, 'TenWeek'])->middleware('isAdminLogged');
Route::get('/admin/14th-week', [AdminAuth::class, 'FourtheenWeek'])->middleware('isAdminLogged');
Route::get('/admin/9th-month', [AdminAuth::class, 'NineMonth'])->middleware('isAdminLogged');
Route::get('/admin/15th-month', [AdminAuth::class, 'FifteenMonth'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated1/{id}', [AdminAuth::class, 'vaccinated1'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated1/{id}', [AdminAuth::class, 'unvaccinated1'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated2/{id}', [AdminAuth::class, 'vaccinated2'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated2/{id}', [AdminAuth::class, 'unvaccinated2'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated3/{id}', [AdminAuth::class, 'vaccinated3'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated3/{id}', [AdminAuth::class, 'unvaccinated3'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated4/{id}', [AdminAuth::class, 'vaccinated4'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated4/{id}', [AdminAuth::class, 'unvaccinated4'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated5/{id}', [AdminAuth::class, 'vaccinated5'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated5/{id}', [AdminAuth::class, 'unvaccinated5'])->middleware('isAdminLogged');
Route::post('/admin/child-vaccinated6/{id}', [AdminAuth::class, 'vaccinated6'])->middleware('isAdminLogged');
Route::post('/admin/child-unvaccinated6/{id}', [AdminAuth::class, 'unvaccinated6'])->middleware('isAdminLogged');
Route::get('/admin/home-child', [AdminAuth::class, 'HomeChilds'])->middleware('isAdminLogged');
Route::get('/admin/center-child', [AdminAuth::class, 'CenterChilds'])->middleware('isAdminLogged');
        // Notification 
Route::get('/admin/notification/at-birth', [AdminAuth::class, 'AtBirthNotification'])->middleware('isAdminLogged');
Route::get('/admin/notification/6th-week', [AdminAuth::class, 'SixWeekNotification'])->middleware('isAdminLogged');
Route::get('/admin/notification/10th-week', [AdminAuth::class, 'TenWeekNotification'])->middleware('isAdminLogged');
Route::get('/admin/notification/14th-week', [AdminAuth::class, 'FourtheenWeekNotification'])->middleware('isAdminLogged');
Route::get('/admin/notification/9th-month', [AdminAuth::class, 'NineMonthNotification'])->middleware('isAdminLogged');
Route::get('/admin/notification/15th-month', [AdminAuth::class, 'FifteenMonthNotification'])->middleware('isAdminLogged');

Route::post('/admin/notification1/{id}', [AdminAuth::class, 'notification1'])->middleware('isAdminLogged');
Route::post('/admin/notification3/{id}', [AdminAuth::class, 'notification3'])->middleware('isAdminLogged');
Route::post('/admin/notification4/{id}', [AdminAuth::class, 'notification4'])->middleware('isAdminLogged');
Route::post('/admin/notification5/{id}', [AdminAuth::class, 'notification5'])->middleware('isAdminLogged');
Route::post('/admin/notification6/{id}', [AdminAuth::class, 'notification6'])->middleware('isAdminLogged');
Route::post('/admin/notification2/{id}', [AdminAuth::class, 'notification2'])->middleware('isAdminLogged');

Route::get('/admin/user-feedback', [AdminAuth::class, 'feedback'])->middleware('isAdminLogged');
Route::get('/admin/generate-certificates', [AdminAuth::class, 'GenerateCertificates'])->middleware('isAdminLogged');
Route::get('/admin/generated-certificates', [AdminAuth::class, 'GeneratedCertificates'])->middleware('isAdminLogged');
Route::get('/admin/generate-reports', [AdminAuth::class, 'GenerateReports'])->middleware('isAdminLogged');
Route::get('/admin/logout/{id}', [AdminAuth::class, 'logout']);

