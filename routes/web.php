<?php

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
    return view('welcome');
});
Route::get('/', function () {
  return redirect('adminloginpage');
});

Route::any('/adminloginpage','AdminController@loginpage');
Route::any('check', 'AdminController@check')->name('check');
Route::group(['middleware' => ['admin']], function() {

Route::get('dashboard', 'AdminController@dashboard');

Route::any('admin','AdminController@login');
Route::any('addrootscheme', 'RootSchemeController@create');
Route::any('addscheme', 'SchemeController@create');
Route::get('rootschemes', 'RootSchemeController@index');
Route::any('editrootscheme/{id}', 'RootSchemeController@editrootscheme');
Route::get('deleterootscheme/{id}', 'RootSchemeController@destroy');
Route::get('deleteterm/{id}', 'TermsController@destroy');
Route::any('editscheme/{id}', 'SchemeController@editscheme');
Route::get('deletescheme/{id}', 'SchemeController@destroy');
Route::get('terms', 'TermsController@index');
Route::any('addterms', 'TermsController@create');
Route::any('editterm/{id}', 'TermsController@editterms');
Route::get('assignedterms','AssignTermsController@index');
Route::any('assignterms','AssignTermsController@create');
Route::any('editassignterms/{id}','AssignTermsController@editassignterms');
Route::get('schemes', 'SchemeController@index');
Route::any('addMember', 'MemberController@otpverify');

Route::any('addinquiry', 'InquiryController@add');
Route::any('members', 'MemberController@index')->name('memberindex');
Route::any('inquiry', 'InquiryController@index');
Route::any('closeinquiry/{id}', 'InquiryController@closeinquiry');
//Route::any('/admin', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

Route::any('addReason', 'ReasonController@create');
Route::any('editReason/{id}', 'ReasonController@editReason');
Route::get('reasons', 'ReasonController@index');
Route::any('assignPackage', 'MemberController@createPayment');

Route::any('assignPackageOrRenewalPackage', 'PackageController@assignPackage');
Route::any('editrole/{id}', 'RoleController@editRole');
Route::any('editMember/{id1}', 'MemberController@editMember');
Route::get('deleterole/{id}', 'RoleController@destroy');
Route::any('addrole', 'RoleController@create');
Route::get('roles', 'RoleController@index');
Route::get('users', 'UserController@index');
Route::any('addUser', 'UserController@create');
// Route:;any('áddInquery', 'AddInquery@')
Route::any('edituser/{id}', 'UserController@edituser');

Route::get('deleteuser/{id}', 'UserController@destroy');
Route::post('/MemberController/check', 'MemberController@check')->name('MemberController.check');
Route::post('/PackageController/getuser', 'PackageController@getuser')->name('PackageController.getuser');
Route::post('/MemberController/scheme', 'MemberController@scheme')->name('scheme');
Route::get('/MemberController/create', 'MemberController@create')->name('create');
Route::post('/MemberController/createuser', 'MemberController@createuser')->name('createuser');
Route::post('/MemberController/edituser', 'MemberController@edituser')->name('edituser');
Route::post('/MemberController/schemeActualPrice', 'MemberController@schemeActualPrice')->name('schemeActualPrice');
Route::post('/MemberController/checkmobile', 'MemberController@checkmobile')->name('MemberController.checkmobile');
	Route::post('changedate', 'PackageController@changedate')->name('changedate');
Route::post('changeenddate', 'PackageController@changeenddate')->name('changeenddate');



Route::get('paymenttypes', 'PaymentTypeController@index');
Route::any('addpaymenttype', 'PaymentTypeController@create');
Route::any('editpaymenttype/{id}', 'PaymentTypeController@editpaymenttype');
Route::get('deletepaymenttype/{id}', 'PaymentTypeController@destroy');
Route::get('settings', 'SettingController@index');
Route::any('addCashCredit', 'PaymentController@create');
Route::any('posture', 'PostureController@create');
Route::any('packageEdit/{id}', 'PackageController@packageEdit')->name('packagEdit');
Route::any('editpackage/{id}', 'PackageController@editpackage');
Route::any('invoice', 'PaymentController@invoice')->name('invoice');
Route::any('Printconsentform', 'ProfileController@Printconsentform')->name('Printconsentform');
Route::any('paymentreceipt', 'ProfileController@paymentreceipt')->name('paymentreceipt');
Route::post('/SchemeController/check', 'SchemeController@check')->name('SchemeController.check');

Route::get('demo-generate-pdf','ProfileController@demoGeneratePDF');

Route::any('addinquiry', 'InquiryController@add');
Route::any('addinquirydata', 'InquiryController@create')->name('addinquirydata');
Route::any('addCompany', 'CompanyController@create');
Route::get('company', 'CompanyController@index');
Route::any('editcompany/{id}', 'CompanyController@editcompany');
Route::any('followup', 'FollowupController@index');
Route::any('addfollowup/{id}', 'FollowupController@addfollowup');
Route::any('viewfollowup/{id}','FollowupController@viewfollowup');
Route::any('editfollowupmodel/{id}','FollowupController@editfollowupmodel');
Route::any('viewfollowupcall/{id}','FollowupController@viewfollowupcall');
Route::any('viewfollowupprofile/{id}','FollowupController@viewfollowupprofile');
Route::get('confirminquiry/{id}', 'InquiryController@confirminquiry');
Route::any('editfollowup/{id}', 'FollowupController@editfollowup');
Route::any('notificationstatus','FollowupController@notificationvia')->name('notificationstatus');

Route::any('smsverify','InquiryController@otpverify')->name('smsverify');
Route::any('redendsms','InquiryController@otpverify')->name('redendsms');
Route::post('smspostverify','InquiryController@postverify')->name('postverify');



Route::any('editinquiry/{id}', 'InquiryController@editinquiry');
Route::get('memberProfile/{id}','ProfileController@profile');
Route::any('consentform','ProfileController@consentform');
Route::post('/PackageController/getusername', 'PackageController@getusername')->name('PackageController.getusername');
Route::post('/MemberController/createmember', 'MemberController@createmember')->name('createmember');
Route::any('verify','MemberController@otpverify')->name('otpverify');
Route::post('postverify','MemberController@postverify')->name('postverify');
Route::post('/NotesController/addnote', 'NotesController@addnote')->name('addnote');
Route::post('/NotesController/deletenote', 'NotesController@deletenote')->name('deletenote');
	Route::post('/NotesController/viewnote', 'NotesController@viewnote')->name('viewnote');
Route::post('/NotesController/editnote', 'NotesController@editnote')->name('editnote');
Route::post('/NotesController/imageupload', 'NotesController@imageupload')->name('imageupload');
Route::get('idpendingreport','MemberController@idpendingreport');
Route::any('makePayment/{id}','PaymentController@remainingpayment');
Route::any('IDupload','ProfileController@IDupload');
Route::post('editmember/{id}', 'MemberController@editMember');  
Route::any('viewconfirmedinquiry','InquiryController@viewconfirmedinquiry');
Route::any('convertmember/{id}','InquiryController@convertmember');
Route::any('resendotp/{mobileno}','MemberController@otpresendverify')->name('resendotp');
Route::any('paymentforreceiptno/{ReceiptNo}', 'ProfileController@paymentforreceiptNo')->name('paymentforreceiptNo');
Route::any('summry','PaymentController@summry');

Route::any('editsetting/{id}', 'SettingController@editsetting');
});


Route::get('get-curl', 'SmsController@getCURL');
Route::any('test','TestController@test')->name('test');
Route::any('testuu','TestController@testuserupload')->name('testuu');

Route::group(['prefix' => 'personaltrainer'], function () {

   Route::any('addptlevel', ['middleware' => 'admin','as' => 'addptlevel', 'uses' => 'PersonalTrainerController@addptlevel']);
   Route::post('addptleveldatacreate', ['middleware' => 'admin','as' => 'addptleveldatacreate', 'uses' => 'PersonalTrainerController@addptleveldatacreate']);
    Route::any('editptlevel/{id}', ['middleware' => 'admin','as' => 'editptlevel', 'uses' => 'PersonalTrainerController@editptlevel']);
   Route::any('assignptlevel', ['middleware' => 'admin','as' => 'assignptlevel', 'uses' => 'PersonalTrainerController@assignptlevel']);
   Route::any('addpttime', ['middleware' => 'admin','as' => 'addpttime', 'uses' => 'PersonalTrainerController@assignPTTime']);
   Route::any('assignmembertotrainer', ['middleware' => 'admin','as' => 'assignmembertotrainer', 'uses' => 'PersonalTrainerController@assignmembertotrainer']);
   Route::any('manageassignedmember', ['middleware' => 'admin','as' => 'manageassignedmember', 'uses' => 'PersonalTrainerController@manageassignedmember']);

});
Route::get('assignptlevelmobileno',['middleware' => 'admin','as'=>'assignptlevelmobileno','uses'=>'PersonalTrainerController@assignptlevelajax']);

Route::get('assignptmembermobileno',['middleware' => 'admin','as'=>'assignptmembermobileno','uses'=>'PersonalTrainerController@assignptmemberajax']);

Route::get('assignptmemberpackage',['middleware' => 'admin','as'=>'assignptmemberpackage','uses'=>'PersonalTrainerController@assignptpackageajax']);

Route::get('edittimeofmember',['middleware' => 'admin','as'=>'edittimeofmember','uses'=>'PersonalTrainerController@edittimeofmemberajax']);

Route::get('ajaxgetjoindate',['middleware' => 'admin','as'=>'ajaxgetjoindate','uses'=>'PersonalTrainerController@ajaxgetjoindate']);

Route::get('assigntimeslot',['middleware' => 'admin','as'=>'assigntimeslot','uses'=>'PersonalTrainerController@assigntimeslotajax']);

Route::post('assignpttomember',['middleware' => 'admin','as'=>'assignpttomember','uses'=>'PersonalTrainerController@assignpttomember']);

Route::post('editassignpttomember',['middleware' => 'admin','as'=>'editassignpttomember','uses'=>'PersonalTrainerController@editassignpttomember']);

Route::get('setpercentage', ['middleware' => 'admin','uses'=>'PersonalTrainerController@setpercentage'])->name('setpercentage');

Route::post('addassignptlevel', ['middleware' => 'admin','uses'=>'PersonalTrainerController@addassignptlevel'])->name('addassignptlevel');

Route::get('ajaxgetptslot',['middleware' => 'admin','as'=>'ajaxgetptslot','uses'=>'PersonalTrainerController@ajaxgetptslot']);

Route::get('ajaxgetptslot',['middleware' => 'admin','as'=>'ajaxgetptslot','uses'=>'PersonalTrainerController@ajaxgetptslot']);

Route::post('editassignptlevel', ['middleware' => 'admin','uses'=>'PersonalTrainerController@editassignptlevel'])->name('editassignptlevel');

Route::post('claimptsession', ['middleware' => 'admin','uses'=>'PersonalTrainerController@claimptsession'])->name('claimptsession');

Route::any('assignPTTime', ['middleware' => 'admin','uses'=>'PersonalTrainerController@assignPTTime'])->name('assignPTTime');

Route::any('editpttime', ['middleware' => 'admin','uses'=>'PersonalTrainerController@editpttime'])->name('editpttime');

Route::get('checkfromdate', ['middleware' => 'admin','uses'=>'PersonalTrainerController@checkfromdateajax'])->name('checkfromdate');


Route::post('/UserController/check', 'UserController@check')->name('UserController.check');


Route::get('getnotification',['middleware' => 'admin','as'=>'getnotification','uses'=>'FollowupController@ajaxgetnotification']);



