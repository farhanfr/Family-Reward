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
    return view('auth.auth_parent');
});


//Auth
Route::post('/loginparent', 'Common\LoginParentController');
Route::post('/loginchild', 'Common\LoginChildController');
Route::post('/registerparent', 'Common\RegisterParentController');
Route::get('/logoutparent', 'Common\LogoutController@logoutParent');
Route::get('/logoutchild', 'Common\LogoutController@logoutChild');
Route::get('/tologinchild', function (){
    return view('auth.auth_child');
});
Route::get('/toregisterparent', function (){
    return view('auth.auth_register_parent');
});

//==============Parent==============
Route::get('/dashboardparent', 'Parent\DashboardController@dashboardParent');
Route::get('/childlist', 'Parent\GetChildController');
Route::get('childlist/detailChild/{id}', 'Parent\GetDetailChildController');
Route::post('/addchild', 'Parent\AddChildController');
Route::post('/addTask', 'Parent\AddTaskController');
Route::post('/addReward', 'Parent\AddRewardController');
Route::post('/addMessage', 'Parent\AddMessageController');
Route::get('/addrewarddone/{id}', 'Parent\AddRewardDoneController');
Route::get('/addtaskdone/{id}', 'Parent\AddTaskDoneController');
Route::post('/addreport', 'Parent\AddReportController');
Route::get('/deleterewarddone/{id}', 'Parent\DeleteRewardDoneController');
Route::get('/deletetaskdone/{id}', 'Parent\DeleteTaskDoneController');
Route::get('/deletetask/{id}', 'Parent\DeleteTaskController');
Route::get('/deletereward/{id}', 'Parent\DeleteRewardController');
Route::get('/deletechild/{id}', 'Parent\DeleteChildController');
Route::get('/childlist/getdetailtask/{id}', 'Parent\GetDetailTaskController');
Route::get('/childlist/getdetailreward/{id}', 'Parent\GetDetailRewardController');
Route::get('/childlist/getprofilechild/{id}', 'Parent\GetDetailChildProfileController');
Route::post('/updatetask', 'Parent\UpdateTaskController');
Route::post('/updatereward', 'Parent\UpdateRewardController');
Route::post('/updatechildprofile', 'Parent\UpdateChildProfileController');
Route::post('/updateparentprofile', 'Parent\UpdateProfileParentController');
Route::get('/parentprofile', 'Parent\GetDetailParentController');
Route::get('/toreport',function (){
   return view('parent.report');
});

//==============Child==============
Route::get('/dashboardchild', 'Child\DashboardController@dashboardChild');
Route::get('/listtaskchild', 'Child\GetListTaskController');
Route::get('/listrewardchild', 'Child\GetListRewardController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

