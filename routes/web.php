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

Route::get('generate-docs', function(){

    $headers = array(

        "Content-type"=>"text/html",

        "Content-Disposition"=>"attachment;Filename=myfile.doc"

    );



    $content = '<html>

            <head><meta charset="utf-8"></head>

            <body>

                <p>My Content</p>

                <ul><li>Cat</li><li>Cat</li></ul>

            </body>

            </html>';



    return \Response::make($content,200, $headers);

});

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});


Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('dashboard.show');
});

Route::get('/logout', function () {
    // return view('welcome');
    Auth::logout();
    return redirect()->route('login');
    // return redirect()->route('dashboard.show');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','ShowController@showDashboard')->name('dashboard.show');
Route::get('member','ShowController@showMember')
->name('member.show');
Route::get('member/create','ShowController@createMember')
->name('member.create');
Route::get('member/edit/{id}','ShowController@editMember')
->name('member.edit');
Route::get('appointment','ShowController@showAppointment')->name('appointment.show');
Route::get('appointment/edit/{id}','ShowController@editAppointment')->name('appointment.edit');
Route::get('appointment/Games','ShowController@showAppointmentGame')->name('appointment.game');
Route::get('appointment/update-rate','ShowController@showUpdaterate')->name('appointment.update-rate');
Route::get('payroll','ShowController@showPayroll')->name('payroll.show');
Route::get('payrun','ShowController@showPayrun')->name('payrun.show');
Route::get('payslip/{id}','ShowController@showPayslip')->name('payslip.show');

Route::get('system/admin','ShowController@showAdmin')->name('system.admin');
Route::get('system/role','ShowController@showRole')->name('system.role');
Route::get('system/auditlog','ShowController@showAuditlog')->name('system.auditlog');

Route::post('member/save','SaveController@saveMember')->name('member.save');
Route::post('member/update','SaveController@updateMember')->name('member.update');


Route::post('member/income/save','SaveController@saveIncome')->name('member.income.save');
Route::get('member/income/delete/{id}','SaveController@deleteIncome')->name('member.income.delete');
Route::post('member/expense/save','SaveController@saveExpense')->name('member.expense.save');
Route::get('member/expense/delete/{id}','SaveController@deleteExpense')->name('member.expense.delete');

Route::post('payroll/generate','SaveController@createPayslip')->name('payroll.generate');
Route::post('appointment/update','SaveController@updateAppointment')->name('appointment.update');
Route::post('appointment/excel-import','SaveController@appoint')->name('appointment.import');
Route::get('appointment/deletefile/{id}','SaveController@deleteFile')->name('appointment.game.delete');

