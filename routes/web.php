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

/*------------------------------ A D M I N   R O U T E S ------------------------------*/

Route::get('{any}/admin', 'AdminController@access')->where('any', '.*');

Route::get('admin', 'AdminController@access');

Route::post('adminLogin', 'AdminController@login');

Route::get('controlPanel/{parameter?}', 'AdminController@controlPanel')->middleware('validateAdmin');

Route::get('filterCourses', 'AdminController@filterCourses')->middleware('validateAdmin');

Route::post('addCourse', 'AdminController@addCourse')->middleware('validateAdmin');

Route::post('editCourse', 'AdminController@editCourse')->middleware('validateAdmin');

Route::get('duplicateCourse/{parameter}', 'AdminController@duplicateCourse')->middleware('validateAdmin');

Route::post('deleteCourse', 'AdminController@deleteCourse')->middleware('validateAdmin');

Route::post('addNew', 'AdminController@addNew')->middleware('validateAdmin');

Route::post('editNew', 'AdminController@editNew')->middleware('validateAdmin');

Route::post('deleteNew', 'AdminController@deleteNew')->middleware('validateAdmin');

Route::post('addOffice', 'AdminController@addOffice')->middleware('validateAdmin');

Route::post('editOffice', 'AdminController@editOffice')->middleware('validateAdmin');

Route::post('deleteOffice', 'AdminController@deleteOffice')->middleware('validateAdmin');

Route::post('addContact', 'AdminController@addContact')->middleware('validateAdmin');

Route::post('editContact', 'AdminController@editContact')->middleware('validateAdmin');

Route::post('deleteContact', 'AdminController@deleteContact')->middleware('validateAdmin');

Route::post('addQuestionnaire', 'AdminController@addQuestionnaire')->middleware('validateAdmin');

Route::post('editQuestionnaire', 'AdminController@editQuestionnaire')->middleware('validateAdmin');

Route::post('deleteQuestionnaire', 'AdminController@deleteQuestionnaire')->middleware('validateAdmin');

Route::get('duplicateQuestionnaire/{parameter}', 'AdminController@duplicateQuestionnaire')->middleware('validateAdmin');

Route::post('downloadQuestionnaireCredentials', 'AdminController@downloadQuestionnaireCredentials')->middleware('validateAdmin');

Route::post('uploadImage/{id}/{type}', 'AdminController@uploadImage')->middleware('validateAdmin');

Route::post('editPage', 'AdminController@editPage')->middleware('validateAdmin');

Route::post('fileManager', 'AdminController@fileManager')->middleware('validateAdmin');

Route::post('excelToCourses', 'AdminController@excelToCourses')->middleware('validateAdmin');

Route::post('massiveUploadFromExcel', 'AdminController@massiveUploadFromExcel')->middleware('validateAdmin');

Route::get('closeSession', 'AdminController@closeSession')->middleware('validateAdmin');

/*------------------------------ Q U A L I T Y   R O U T E S  ------------------------------*/

Route::get('questionnaire', 'QuestionnaireController@access');

Route::post('questionnaireLogin', 'QuestionnaireController@login');

Route::get('questionnaire/{parameter}', 'QuestionnaireController@questionnaire');

Route::post('sendQuestionnaire', 'QuestionnaireController@evaluate');

/*------------------------------ R O O T   R O U T E S  ------------------------------*/

Route::get('innobonos', function () {
    return view('innobonos');
});

Route::get('/', 'RootController@index');

Route::get('search', 'RootController@search');

Route::get('aboutUs', 'RootController@aboutUs');

Route::get('oxfordTestOfEnglish', 'RootController@oxfordTestOfEnglish');

Route::post('oxfordInscription/{parameter}', 'RootController@oxfordInscription')->middleware('honeypot');

Route::get('certificates', 'RootController@certificates');

Route::get('joinUs', 'RootController@joinUs');

Route::post('sendCV', 'RootController@userCV')->middleware('honeypot');

Route::get('news', 'RootController@news');

Route::get('contact/{location?}', 'RootController@getLocations');

Route::get('courses/{location?}/{type?}/{name?}', 'RootController@getCourses');

Route::get('offices/{location?}/{name?}', 'RootController@getOffices');

Route::get('new/{name}', 'RootController@getNew');

Route::post('courseInscription/{parameter}', 'RootController@inscription')->middleware('honeypot');

Route::post('officeInscription/{parameter}', 'RootController@officeInscription')->middleware('honeypot');

Route::post('subscribeToNewsletter', 'RootController@subscribeToNewsletter')->middleware('honeypot');

Route::get('cancelSubscription/{parameter}', 'RootController@cancelSubscription');

Route::post('contactUs/{parameter}', 'RootController@contactUs')->middleware('honeypot');

/*------------------------------ L E G A L   R O U T E S  ------------------------------*/

Route::get('configCookies', 'RootController@configCookies');

Route::get('privacyPolicy', 'RootController@privacy');

Route::get('cookiesPolicy', 'RootController@cookies');

Route::get('securityPolicy', 'RootController@security');

/*------------------------------ T R A N S P A R E N C Y   P O R T A L   R O U T E S  ------------------------------*/

Route::get('transparencyPortal', 'RootController@transparencyPortal');

Route::get('normative', 'RootController@tpNormative');

Route::get('financialEconomics', 'RootController@tpFinancialEconomics');

Route::get('grantsAndSubsidies', 'RootController@tpGrantsAndSubsidies');

Route::get('institutions', 'RootController@tpInstitutions');

Route::get('contracts', 'RootController@tpContracts');

Route::get('transparencyCommissioner', 'RootController@tpTransparencyCommissioner');

Route::get('organization', 'RootController@tpOrganization');

Route::get('covenants', 'RootController@tpCovenants');

Route::get('accessToInformation', 'RootController@tpAccessToInformation');
