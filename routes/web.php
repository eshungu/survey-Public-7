<?php


Route::get('/', function () {
    return view('surveyWelcome');
});


// header("Access-Control-Allow-Origin: *");

// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/getFormSections', 'formSectionController@getFormSectionss');

// Route::get('/getForms', 'formController@getFormss');

Route::get('/getForms', 'formController@getFormsAndTheirAverages');

Route::get('/getListOfServices', 'formController@getServicesList');

Route::get('/getForm22222', 'formController@getForm22222');

Route::get('/getForm/{id}', 'formController@getForm');

Route::get('/getQuestion/{id}', 'formController@getQuestion');

Route::get('/forwardToRegister', 'RegisterController2@showRegistrationPage');

Route::post('/submitIdentification', 'traineeController@create3');

Route::post('/submitForm', 'ResponseController@answerForm');

Route::get('/surveyWelcomePage', 'ResponseController@respForumu')->name('surveyWelcomePage');

Route::get('/statisticalTables', 'ResponseController@statisticalTables')->name('statisticalTables')->middleware(['auth']);

Route::get('/ChartsAndComments', 'ResponseController@showChartsAndComments')->name('ChartsAndComments')->middleware(['auth']);

Route::get('/compareBanksByServices', 'ResponseController@comparePerformances')->name('compareBanksByServices')->middleware(['auth']);

Route::any('/ComparativeSum/{id}', 'formController@comparativeSummary')->name('ComparativeSum')->middleware(['auth']);

Route::get('/summaryCharts/{id}', 'formController@showSummaryCharts');

Route::get('/comparativeChartByService/{id}', 'formController@showComparativeChartByService');

Route::get('/recordNewTrainingSession', 'ResponseController@RecNewTraining')->name('recordNewTrainingSession')->middleware(['auth']);

Route::post('/saveNewTrainingSession', 'RegisterController2@createTrainingSession')->name('saveNewTrainingSession')->middleware(['auth']);

Route::any('/resultsSum/{id}', 'formController@getResultsSummary')->name('resultsSum')->middleware(['auth']);

Route::any('/resultsDet/{id}', 'formController@getResultsDetails')->name('resultsDet')->middleware(['auth']);

Route::any('/getComments', 'formController@zanaComments')->name('getComments')->middleware(['auth']);

Route::get('/exportToExcelResultsSum/{id}', 'formController@exportToExcelSumV2')->middleware(['auth']);

// Route::get('/viewChartResultsSum/{id}', 'formController@ChartResultsSum')->name('viewChartResultsSum')->middleware(['auth']);

Route::get('/exportToExcelResultsDet/{id}', 'formController@exportToExcelDetV2')->name('exportToExcelResultsDet')->middleware(['auth']);

Route::get('/questionFm', 'questionController@questForumu')->middleware(['auth']);

Route::post('/questionInsert', 'questionController@saveQuestion')->middleware(['auth']);

Route::get('/relationship', 'formController@relationship');

Route::get('/relationship2', 'formController@relationship2');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function (){
    return 'you are admin';
// })->middleware(['auth', 'auth.admin', 'verified']);
})->middleware(['auth', 'auth.admin']);

Route::get('/deleteUser/{id}','Admin\UserController2@destroy')->name('deleteUser');

Route::get('/updateUser/{id}','Admin\UserController2@update')->name('updateUser');

Route::namespace('Admin')
->prefix('admin')
->name('admin.')
// ->middleware(['auth', 'auth.admin', 'verified'])
->middleware(['auth', 'auth.admin'])
->group(function(){

    // Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);

    Route::resource('/users', 'UserController');
   
    Route::get('/impersonate/user/{id}', 'ImpersonateController@index')->name('impersonate');

});

//Route must be outside auth.admin middleware
Route::get('/admin.impersonate/destroy', 'Admin\ImpersonateController@destroy')
->name('admin.impersonate.destroy');

//--------------------------------------

// Route::get('/stevenPower', 'stevenController@getPower');

// Route::get('/stevenVol', 'stevenCylinder@getVolume');

// Route::get('/stevenMarks', 'stevenDecisions@getDecision');
// Auth::routes();