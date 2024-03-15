<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Permission\UserController;
use App\Http\Controllers\Permission\RoleController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Permission\PermissionForController;

//Admin Auth & Registration....................................................
use App\Http\Controllers\Backend\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\CommonSettingController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\CompanyListController;
use App\Http\Controllers\Backend\Admin\JobListController;
use App\Http\Controllers\Backend\Admin\NotificationController;
use App\Http\Controllers\Backend\Admin\PluginController;

use App\Http\Controllers\Backend\Pages\BlogController;
use App\Http\Controllers\Backend\Pages\AboutController;
use App\Http\Controllers\Backend\Pages\ContactController;

//Company Auth & Registration..................................................
use App\Http\Controllers\Company\Auth\CompanyRegisterController;
use App\Http\Controllers\Company\Auth\CompanyLoginController;
use App\Http\Controllers\Company\Auth\CompanyForgotPasswordController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\CompanyEmployeeController;
use App\Http\Controllers\Company\CompanyJobController;
use App\Http\Controllers\Company\CompanyNotificationController;
use App\Http\Controllers\Company\CompanyPluginController;

//Candidate(user) Auth & Registration..................................................
use App\Http\Controllers\Frontend\AttendeAuth\AttendeAuthController;
use App\Http\Controllers\Frontend\AttendeAuth\AttendeForgotPasswordController;

//Frontend Controller
use App\Http\Controllers\Frontend\Auth\UserForgotPasswordController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\EmployeeController;
use App\Http\Controllers\Frontend\ResumeController;




//Frontend Forget password
Route::controller(UserForgotPasswordController::class)->group(function () {
	Route::get('user-forget-password', 'showForgetPasswordForm')->name('user.forget.password.get');
	Route::post('user-forget-password', 'submitForgetPasswordForm')->name('user.forget.password.post'); 
	Route::get('user-reset-password/{token}', 'showResetPasswordForm')->name('user.reset.password.get');
	Route::post('user-reset-password', 'submitResetPasswordForm')->name('user.reset.password.post');
});


//Frontend Page Route star..........................................
Route::get('/',[IndexController::class,'index'])->name('welcome');
Route::get('/about',[PageController::class,'aboutPage'])->name('about.page');
Route::get('/job/list',[PageController::class,'allJobs'])->name('job.page');
Route::get('/blog/list',[PageController::class,'allBlogs'])->name('blog.page');
Route::get('/category/list',[PageController::class,'allCategories'])->name('category.page');
Route::get('/contact',[PageController::class,'contactPage'])->name('contact.page');
Route::post('/store/contact/info',[PageController::class,'storeContactInfo'])->name('store.contact.info');

Route::get('/job/details/{id}',[PageController::class,'jobDetailsById'])->name('job.detail');
Route::get('/blog/details/{id}',[PageController::class,'blogDetailsById'])->name('blog.detail');

Route::get('/job/by/category/{id}',[PageController::class,'jobByCategoryId'])->name('job.by.category');
Route::get('/blog/by/category/{id}',[PageController::class,'blogByCategoryId'])->name('blog.by.category');

Route::post('job/search', [PageController::class, 'search'])->name('job.search');


Route::middleware(['auth','prevent-back-history'])->group(function(){
    //Dashboard Route
	Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'home')->name('home');
		Route::get('/dashboard', 'dashboard')->name('dashboard');

		Route::get('/apply/job/{job_id}', 'applyJob')->name('apply.job');
		Route::get('/update/resume/by/apply/job/{job_id}', 'editResumeByJob')->name('edit.resume.by.apply.job');
		Route::post('/update/resume/apply/job/{resume_id}', 'updateResumeByJob')->name('update.resume.by.apply.job');

        Route::get('/create/resume/by/apply/job/{job_id}', 'createResumeByJob')->name('create.resume.by.apply.job');
        Route::post('/store/resume/apply/job', 'storeResumeByJob')->name('store.resume.by.apply.job');

        Route::post('/store/job/application', 'storeJobApplication')->name('store.job.application');

	    Route::get('/applied/job/list', 'appliedJobList')->name('applied.job.list');
	    Route::get('/view/applied/job/details/info/{id}', 'appliedJobDetails')->name('view.applied.job.details');

		Route::get('/logout', 'logout')->name('logout');
	});


    //Resume Route
	Route::controller(ResumeController::class)->group(function () {
		Route::get('/resume', 'index')->name('resume');
		Route::get('/create/resume', 'create')->name('create.resume');
		Route::post('/store/resume', 'store')->name('store.resume');
		Route::get('/edit/resume/{id}', 'edit')->name('edit.resume');
		Route::post('/update/resume/{id}', 'update');
		Route::get('/delete/resume/{id}', 'delete')->name('delete.resume');
    });

   //User Profile Route
	Route::controller(EmployeeController::class)->group(function () {
		Route::get('/view/profile',  'viewUserProfile')->name('view.profile');
		Route::get('/edit/profile',  'editUserProfile')->name('edit.profile');
		Route::post('/update/profile',  'updateUserProfile')->name('update.profile');
		Route::get('/change/password',  'changeUserPassword')->name('change.password');
		Route::post('/update/password',  'updateUserChangePassword')->name('update.password');
		Route::get('/view/profile/details',  'viewProfileDetails')->name('view.profile.details');
    });


});



//All Backend(Company) Starts Here............................................................................................

//Company Auth Route
Route::get('/company/register',[CompanyRegisterController::class,'showCompanyRegisterForm'])->name('company.register');
Route::post('/company/register',[CompanyRegisterController::class,'createCompany']);

Route::get('/company/login',[CompanyLoginController::class,'showCompanyLoginForm'])->name('company.login');
Route::post('/company/login',[CompanyLoginController::class,'companyLogin'])->name('post.company.login');

Route::get('company-forget-password', [CompanyForgotPasswordController::class, 'showCompanyForgetPasswordForm'])->name('company.forget.password.get');

Route::post('company/forget-password', [CompanyForgotPasswordController::class, 'submitCompanyForgetPasswordForm'])->name('company.forget.password.post'); 

Route::get('reset-password/{token}', [CompanyForgotPasswordController::class, 'showCompanyResetPasswordForm'])->name('company.reset.password.get');
Route::post('reset-password', [CompanyForgotPasswordController::class, 'submitCompanyResetPasswordForm'])->name('company.reset.password.post');


Route::middleware(['auth:company','prevent-back-history'])->group(function(){

    //CommonSetting Route
	Route::controller(CompanyController::class)->group(function () {
		Route::get('/company/dashboard','dashboard')->name('company.dashboard');
		Route::get('/company/logout','logout')->name('company.logout');
		Route::get('/company/view/profile',  'viewCompanyProfile')->name('view.company.profile');
		Route::get('/company/edit/profile',  'editCompanyProfile')->name('edit.company.profile');
		Route::post('/company/update/profile',  'updateCompanyProfile')->name('update.company.profile');
		Route::get('/company/change/password',  'changeCompanyPassword')->name('company.change.password');
		Route::post('/company/update/password',  'updateCompanyPassword')->name('update.company.password');

		Route::get('/candidate/job/list', 'candidateJobList')->name('candidate.job.list');
		Route::get('/view/candidate/job/details/info/{id}', 'candidateJobDetails')->name('view.candidate.job.details');
		Route::get('/delete/candidate/job/list', 'deleteCandidateJobList')->name('delete.candidate.job.list');
	});

	//Company Job Route
	Route::controller(CompanyJobController::class)->group(function () {
		Route::get('/company/job', 'index')->name('jobs');
		Route::get('/company/create/job', 'create')->name('create.job');
		Route::post('/company/store/job', 'store')->name('store.job');
		Route::get('/company/view/job/{id}', 'view')->name('view.job');
		Route::get('/company/edit/job/{id}', 'edit')->name('edit.job');
		Route::post('/company/update/job/{id}', 'update')->name('update.job');
		Route::get('/company/delete/job/{id}', 'delete')->name('delete.job');
		Route::get('inactive/job/{id}', 'inactive')->name('inactive.job');
		Route::get('active/job/{id}', 'active')->name('active.job');
	});

	//Company Employee Route
	Route::controller(CompanyEmployeeController::class)->group(function () {
		Route::get('/company/employee/list', 'index')->name('company.employee');
		Route::get('/company/employee/create', 'create')->name('create.company.employee');
		Route::post('/company/employee/store', 'store')->name('store.company.employee');
		Route::get('/company/employee/edit/{id}', 'edit')->name('edit.company.employee');
		Route::post('/company/employee/update/{id}', 'update')->name('update.company.employee');
		Route::get('/company/employee/delete/{id}', 'delete')->name('delete.company.employee');
	});

	//Company Notification  Route
	Route::controller(CompanyNotificationController::class)->group(function () {
		Route::get('company/markAsRead/{id}', 'MarkAsRead')->name('markReadCompany');
	});

Route::controller(CompanyPluginController::class)->group(function () {
	Route::get('/company/plugin', 'index')->name('company.plugin');
});


}); //End Middleware Group




//All Backend(Admin) Starts Here............................................................................................

//Admin Auth Route

Route::get('/admin/login',[LoginController::class,'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('admin-forget-password', [AdminForgotPasswordController::class, 'showAdminForgetPasswordForm'])->name('admin.forget.password.get');
Route::post('forget-password', [AdminForgotPasswordController::class, 'submitAdminForgetPasswordForm'])->name('admin.forget.password.post'); 
Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'showAdminResetPasswordForm'])->name('admin.reset.password.get');
Route::post('reset-password', [AdminForgotPasswordController::class, 'submitAdminResetPasswordForm'])->name('admin.reset.password.post');


// Start Middleware Group
Route::middleware(['auth:admin','prevent-back-history'])->group(function(){

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/admin/view/profile', [AdminController::class, 'viewAdminProfile'])->name('view.admin.profile');
Route::get('/admin/edit/profile', [AdminController::class, 'editAdminProfile'])->name('edit.admin.profile');
Route::post('/admin/update/profile', [AdminController::class, 'updateAdminProfile'])->name('update.admin.profile');
Route::get('/admin/change/password', [AdminController::class, 'changeAdminPassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'updateAdminChangePassword'])->name('update.admin.password');

//CommonSetting Route
Route::controller(CommonSettingController::class)->group(function () {
Route::get('/admin/setting', 'index')->name('setting');
Route::get('/admin/create/setting', 'create')->name('create.setting');
Route::post('/admin/store/setting', 'store')->name('store.setting');
Route::get('/admin/edit/setting/{id}', 'edit')->name('edit.setting');
Route::post('/admin/update/setting/{id}', 'update')->name('update.setting');
Route::get('/admin/delete/setting/{id}', 'delete')->name('delete.setting');
});

//About Page Route
Route::controller(AboutController::class)->group(function () {
Route::get('/admin/about', 'index')->name('about');
Route::get('/admin/create/about', 'create')->name('create.about');
Route::post('/admin/store/about', 'store')->name('store.about');
Route::get('/admin/edit/about/{id}', 'edit')->name('edit.about');
Route::post('/admin/update/about/{id}', 'update')->name('update.about');
Route::get('/admin/delete/about/{id}', 'delete')->name('delete.about');
});

//Category Route
Route::controller(CategoryController::class)->group(function () {
Route::get('/admin/category', 'index')->name('categories');
Route::get('/admin/create/category', 'create')->name('create.category');
Route::post('/admin/store/category', 'store')->name('store.category');
Route::get('/admin/edit/category/{id}', 'edit')->name('edit.category');
Route::post('/admin/update/category/{id}', 'update')->name('update.category');
Route::get('/admin/delete/category/{id}', 'delete')->name('delete.category');
});


//Plugin Route
Route::controller(PluginController::class)->group(function () {
	Route::get('/plugin', 'index')->name('plugins');

	Route::get('/inactive/blog/{id}', 'inactiveBlog')->name('inactive.blog.plugin');
	Route::get('/active/blog/{id}', 'activeBlog')->name('active.blog.plugin');

	Route::get('/inactive/employee/{id}', 'inactiveEmployee')->name('inactive.employee.plugin');
	Route::get('/active/employee/{id}', 'activeEmployee')->name('active.employee.plugin');

	Route::get('/inactive/page/{id}', 'inactivePage')->name('inactive.page.plugin');
	Route::get('/active/page/{id}', 'activePage')->name('active.page.plugin');
});

//Blog Route
Route::controller(BlogController::class)->group(function () {
Route::get('/admin/blog/list', 'index')->name('blogs');
Route::get('/admin/create/blog', 'create')->name('create.blog');
Route::post('/admin/store/blog', 'store')->name('store.blog');
Route::get('/admin/edit/blog/{id}', 'edit')->name('edit.blog');
Route::post('/admin/update/blog/{id}', 'update')->name('update.blog');
Route::get('/admin/delete/blog/{id}', 'delete')->name('delete.blog');
Route::get('/admin/inactive/blog/{id}', 'inactive')->name('inactive.blog');
Route::get('/admin/active/blog/{id}', 'active')->name('active.blog');
});

//Company List Route 
Route::controller(CompanyListController::class)->group(function () {
Route::get('/admin/company/list', 'index')->name('company.list');
Route::get('/admin/view/company/details/{id}', 'view')->name('view.company.list');
Route::get('/admin/delete/company/list/{id}', 'delete')->name('delete.company.list');
Route::get('/admin/inactive/company/list/{id}', 'inactive')->name('inactive.company.list');
Route::get('/admin/active/company/list/{id}', 'active')->name('active.company.list');
});

//Job List Route
Route::controller(JobListController::class)->group(function () {
Route::get('/admin/job/list', 'index')->name('job.list');
Route::get('/admin/view/job/details/{id}', 'view')->name('view.job.list');
Route::get('/admin/delete/job/list/{id}', 'delete')->name('delete.job.list');
Route::get('/admin/inactive/job/list/{id}', 'inactive')->name('inactive.job.list');
Route::get('/admin/active/job/list/{id}', 'active')->name('active.job.list');
});


//Contact List Route
Route::controller(ContactController::class)->group(function () {
Route::get('/admin/view/contact/info', 'viewContactInfo')->name('view.contact.info');
Route::get('/admin/contact/details/info/{id}', 'contactDetailsInfo')->name('contact.details.info');
Route::get('/admin/delete/contact/info/{id}', 'deleteContactInfo')->name('delete.contact.info');
});


//Admin Acl Route.....................................................

//User Route
Route::controller(UserController::class)->group(function () {
	Route::get('admin/user', 'index')->name('user');
	Route::get('admin/create-user', 'create')->name('create.user');
	Route::post('admin/store/user', 'store')->name('store.user');
	Route::get('admin/edit/user/{id}', 'edit')->name('edit.user');
	Route::post('admin/update/user/{id}', 'update')->name('update.user');
	Route::get('admin/delete/user/{id}', 'delete')->name('delete.user');
});

//Role Route
Route::controller(RoleController::class)->group(function () {
	Route::get('admin/role', 'index')->name('role');
	Route::get('admin/create-role', 'create')->name('create.role');
	Route::post('admin/store/role', 'store')->name('store.role');
	Route::get('admin/edit/role/{id}', 'edit')->name('edit.role');
	Route::post('admin/update/role/{id}', 'update')->name('update.role');
	Route::get('admin/delete/role/{id}', 'delete')->name('delete.role');
});

//Permission For Route
Route::controller(PermissionController::class)->group(function () {
	Route::get('admin/permission', 'index')->name('permission');
	Route::get('/admin/create/permission', 'create')->name('create.permission');
	Route::post('admin/store/permission', 'store')->name('store.permission');
	Route::get('edit/permission/{id}', 'edit')->name('edit.permission');
	Route::post('update/permission/{id}', 'update')->name('update.permission');
	Route::get('delete/permission/{id}', 'delete')->name('delete.permission');
});

//Permission For Route
Route::controller(PermissionForController::class)->group(function () {
	Route::get('admin/permission-for', 'index')->name('permissionfor');
	Route::get('/admin/create/permission-for', 'create')->name('create.permissionfor');
	Route::post('admin/store/permission-for', 'store')->name('store.permissionfor');
	Route::get('edit/permission-for/{id}', 'edit')->name('edit.permissionfor');
	Route::post('update/permission-for/{id}', 'update')->name('update.permissionfor');
	Route::get('delete/permission-for/{id}', 'delete')->name('delete.permissionfor');
});


Route::controller(NotificationController::class)->group(function () {
	Route::get('admin/markAsRead/{id}', 'MarkAsRead')->name('markRead');
	Route::get('admin/order/markAsRead/notification/{notificationId}/{order_id}', 'OrderMarkAsReadById');
	Route::get('admin/booking/markAsRead/notification/{notificationId}/{booking_id}', 'BookingMarkAsReadById');
	Route::get('admin/delete/notification/{notificationId}', 'Delete');
});

}); //End Middleware Group



Auth::routes();

