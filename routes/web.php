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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});





//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', function () {
        return view('admin.admin_template');
    });
    
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('department', 'DepartmentController');
    Route::resource('section', 'SectionController');
    Route::resource('category', 'CategoryController');
    Route::resource('location', 'LocationController');
    Route::resource('manufacture', 'ManufactureController');
    Route::resource('assets', 'AssetsController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('license', 'licenseController');
    Route::resource('accessories', 'AccessoriesController');
    Route::resource('workflow','WorkFlowController');
    Route::resource('workFlowDetail','WorkFlowDetailController');
    Route::resource('serviceRequest','ServiceRequestController');

    Route::get('users.datauser', 'UserController@getData')->name('users.datauser');
    Route::get('usersd/{id}', 'UserController@destroy')->name('users.destroyd');
    Route::get('userss/getRegion','UserController@getRegion');
    Route::get('users.showProfile.{id}','UserController@showProfile')->name('users.showProfile');
    Route::patch('users.updateProfile.{id}','UserController@updateProfile')->name('users.updateProfile');

    Route::get('rolesd/{id}','RoleController@destroy')->name('roles.destroyd');
    Route::get('roles.dataroles', 'RoleController@getData')->name('roles.dataroles');
    
    Route::get('department.datadepartment','DepartmentController@getData')->name('department.datadepartment');
    
    Route::get('section.datasection','SectionController@getData')->name('section.datasection');


    Route::get('category.datacategory','CategoryController@datacategory')->name('category.datacategory');
    
    Route::get('location.datalocation','LocationController@datalocation')->name('location.datalocation');

    Route::get('manufacture.datamanufacture','ManufactureController@datamanufacture')->name('manufacture.datamanufacture');

    Route::get('assets.dataassets','AssetsController@dataassets')->name('assets.dataassets');
    Route::get('assets.searchAsset','AssetsController@searchAsset')->name('assets.searchAsset');

    Route::get('supplier.datasupplier','SupplierController@datasupplier')->name('supplier.datasupplier');

    Route::get('license.datalicense','LicenseController@datalicense')->name('license.datalicense');

    Route::get('accessories.dataaccessories','AccessoriesController@dataaccessories')->name('accessories.dataaccessories');

    Route::get('workflow.dataworkflow','WorkFlowController@getData')->name('workflow.dataworkflow');
    Route::get('workflow.getuser','WorkFlowController@getUser')->name('workflow.getuser');
    Route::post('workflow.simpan','WorkFlowController@simpan')->name('workflow.simpan');
    Route::get('workflow/editDetail/{id}','WorkFlowController@editDetail')->name('workflow.editDetail');
    Route::patch('workflow.updateDetail','WorkFlowController@updateDetail')->name('workflow.updateDetail');
    Route::post('workflow.editSort','WorkFlowController@editSort')->name('workflow.editSort');
    Route::post('workflow.destroyDetail','WorkFlowController@destroyDetail')->name('workflow.destroyDetail');
    Route::post('workflow.storeDetail','WorkFlowController@storeDetail')->name('workflow.storeDetail');

    Route::post('serviceRequest.draft','ServiceRequestController@draft')->name('serviceRequest.draft');
    Route::get('serviceRequest.listDraft','ServiceRequestController@listDraft')->name('serviceRequest.listDraft');
    Route::get('serviceRequest.create','ServiceRequestController@create')->name('serviceRequest.create');
    Route::post('serviceRequest.delete','ServiceRequestController@delete')->name('serviceRequest.delete');
});
