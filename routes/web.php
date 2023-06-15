<?php

use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\PendingApprovalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ServicesController;
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

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/sendtestemail', function () {
    return view('sendtestemail');
})->name('sendtestemail');

Route::get('/send-email/{email}', [MailController::class, 'sendEmail']);

Route::get('/home', [DashboardController::class, 'displayBusinesses'])->name('home');

Route::get('/userboard', function () {
    return view('asas');
})->middleware(['auth'])->name('userboard');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//For Businesses
Route::group(['middleware' => ['auth', 'role:business']], function () {
    Route::get('/business/myprofile', [DashboardController::class, 'businessprofile'])->name('dashboard.myprofile');
    //View Business of single business no user logged in
    Route::get('/business/businessdashboard/{id}', [BusinessController::class, 'show'])->name('business.businessdashboard');
    //Edit the business admin data
    Route::post('business/update', [BusinessController::class, 'updateBusiness'])->name('business.update');
    //Edit the business admin data insertclientservice
    //Upload Logo for business
    Route::post('business/uploadLogo', [BusinessController::class, 'uploadLogo']);
    //Edit the business admin data insertclientservice
    Route::post('/business/businessdashboard/insertclientservice', [ServicesController::class, 'insertclientservice'])->name('business.businessdashboard.insertclientservice');
    Route::post('business/businessdashboard/insertIndustry', [IndustryController::class, 'insertIndustry'])->name('business.businessdashboard.insertIndustry');
    Route::get('business/businessdashboard/deleteBusinessandUser/{id}', [BusinessController::class, 'deleteBusinessandUser'])->name('business.businessdashboard.deleteBusinessandUser');
    Route::post('business/businessdashboard/insertIndustry', [PendingApprovalsController::class, 'insertIndustry'])->name('business.businessdashboard.insertIndustry');

});

//For Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/adminpanel', [AdminpanelController::class, 'displayAll'])->name('adminpanel');
    Route::post('/admin/adminpanel/insertService', [ServicesController::class, 'insert'])->name('admin.adminpanel.insertService');
    Route::get('/admin/adminpanel/destroy/{id}', [ServicesController::class, 'deleteService']);
    Route::get('/admin/adminpanel/deleteMuni/destroy/{id}', [MunicipalityController::class, 'destroy']);
    Route::get('/admin/adminpanel/deleteDistrict/destroy/{id}', [MunicipalityController::class, 'destroy']);
    Route::post('admin/adminpanel/insertIndustry', [IndustryController::class, 'store'])->name('admin.adminpanel.insertIndustry');
    Route::post('admin/adminpanel/insertMunicipality', [MunicipalityController::class, 'store'])->name('admin.adminpanel.insertMunicipality');
    Route::post('admin/adminpanel/insertDistrict', [DistrictsController::class, 'store'])->name('admin.adminpanel.insertDistrict');
    Route::post('admin/adminpanel/insertProvince', [ProvinceController::class, 'store'])->name('admin.adminpanel.insertProvince');

    Route::post('admin/adminpanel/deleteIndustry/{id}', [IndustryController::class, 'deleteIndustry'])->name('admin.adminpanel.deleteIndustry');
    Route::post('admin/adminpanel/deleteProvince/{id}', [ProvinceController::class, 'destroy'])->name('admin.adminpanel.deleteProvince');

    Route::get('adminpanel/deleteBusiness/{id}', [AdminpanelController::class, 'deleteBusinessAdmin'])->name('adminpanel.deleteBusiness');
    Route::get('adminpanel/activateBusiness/{id}', [AdminpanelController::class, 'activatebusiness'])->name('adminpanel.activateBusiness');
    Route::get('adminpanel/deactivateBusiness/{id}', [AdminpanelController::class, 'deactivatebusiness'])->name('adminpanel.deactivateBusiness');

    //Route to Approve industry
    Route::post('adminpanel/approveIndustry/{id}', [AdminpanelController::class, 'approveindustry'])->name('adminpanel.approveIndustry');
    //Route to Decline industry
    Route::get('adminpanel/declineIndustry/{id}', [AdminpanelController::class, 'declineindustry'])->name('adminpanel.declineIndustry');
});

//Change the district options
Route::get('/home/changeDistrict', [DashboardController::class, 'changeDistrict'])->name('home.changeDistrict');
Route::get('/home/changeMunicipality', [DashboardController::class, 'changeMunicipality'])->name('home.changeMunicipality');
//Display the businesses search results on home page
Route::get('/home/action', [DashboardController::class, 'action'])->name('home.action');
//View Business of single business no user logged in
Route::get('/viewBusiness/{id}', [BusinessController::class, 'showBusiness'])->name('viewBusiness');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__ . '/auth.php';
