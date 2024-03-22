<?php

use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\PendingApprovalsController;
use App\Http\Controllers\PowerupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


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

Route::get('/marketplace', function () {
    return view('marketplace');
})->name('marketplace');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/business/registration', [BusinessController::class, 'bus_reg'])->name('registration');
Route::get('/business/registration/show', [ServicesController::class, 'show'])->name('business.registration.show');
Route::get('/home/registration', [DashboardController::class, 'changeIndustry'])->name('home.changeIndustry');

Route::get('/sendtestemail', function () {
    return view('sendtestemail');
})->name('sendtestemail');

Route::get('/send-email/{email}', [MailController::class, 'sendEmail']);

Route::get('/', [DashboardController::class, 'displayBusinesses'])->name('home');

Route::get('/userboard', function () {
    return view('asas');
})->middleware(['auth'])->name('userboard');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//For Businesses
Route::group(['middleware' => ['auth', 'role:business|admin']], function () {
    Route::get('/business/myprofile', [DashboardController::class, 'businessprofile'])->name('dashboard.myprofile');
    Route::get('/business/submit-form', [PowerupController::class, 'store'])->name('dashboard.submit-form');
//View Business of single business no user logged in
    Route::get('/bdashboard', [BusinessController::class, 'show'])->name('bdashboard');
    Route::get('/bdashboard/website/', function () {
        return view('business.viewbusiness.powerups._website');
    })->name('bdashboard.website');
    //Acounting Powerup
    Route::get('/bdashboard/{powerup}', [PowerupController::class, 'index']);
    Route::POST('/bdashboard/accounting/activatepowerup', [PowerupController::class, 'activatepowerup'])->name('bdashboard.accounting.activatepowerup');

    
    //Edit the business admin data
    Route::post('business/update', [BusinessController::class, 'updateBusiness'])->name('business.update');
    //Edit the business admin data insertclientservice
    //Upload Logo for business
    Route::post('business/uploadLogo', [BusinessController::class, 'uploadLogo']);
    Route::post('business/cropLogo', [BusinessController::class, 'cropLogo'])->name('business.cropLogo');

    //Edit the business admin data insertclientservice
    Route::post('/business/businessdashboard/insertclientservice', [ServicesController::class, 'insertclientservice'])->name('business.businessdashboard.insertclientservice');
    Route::post('business/businessdashboard/insertIndustry', [IndustryController::class, 'insertIndustry'])->name('business.businessdashboard.insertIndustry');
    Route::get('business/businessdashboard/deleteBusinessandUser/{id}', [BusinessController::class, 'deleteBusinessandUser'])->name('business.businessdashboard.deleteBusinessandUser');
    Route::post('business/businessdashboard/insertIndustry', [PendingApprovalsController::class, 'insertIndustry'])->name('business.businessdashboard.insertIndustry');
    Route::get('/multistep-form', function () {
        session(['current_step' => 1]);
        return view('multistep-form');
    });
    Route::post('/submit', function () {
        // Handle form submission here

        // Increment the step in session
        session(['current_step' => session('current_step') + 1]);

        // Redirect to the next step or thank you page
        if (session('current_step') <= 4) {
            return redirect('/multistep-form');
        } else {
            // Reset the current_step session after completing all steps
            session()->forget('current_step');
            return redirect('/thank-you')->with('success', 'Form submitted successfully!');
        }
    })->name('submit');
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
Route::get('/home/changeTown', [DashboardController::class, 'changeTown'])->name('home.changeTown');
//Display the businesses search results on home page
Route::get('/home/action', [DashboardController::class, 'action'])->name('home.action');
//View Business of single business no user logged in
Route::get('/business/{businessName}', [BusinessController::class, 'showBusiness'])->name('viewBusiness');


Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::post('contact/contact', [ContactFormController::class, 'contact'])->name('contact.contact');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'resend'])->middleware(['auth', 'throttle:3,1'])->name('verification.resend');

require __DIR__ . '/auth.php';

//search 
Route::get('/search', [SearchController::class, 'search'])->name('search');

