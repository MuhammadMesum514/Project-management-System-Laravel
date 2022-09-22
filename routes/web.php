<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTeamsController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\ManagerProjectController;
use App\Http\Controllers\Manager\ManagerTaskController;
use App\Http\Controllers\User\userCalendar;
use App\Http\Controllers\User\followUpForms;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::controller(userCalendar::class)->group(function(){
//     Route::get('fullcalender', 'index');
//     Route::post('fullcalenderAjax', 'ajax');
// });

Route::prefix('user')->name('user.')->group(function(){
    
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
            
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::get('/home',[userCalendar::class,'index'])->name('home');
          Route::post('/fullcalenderAjax',[userCalendar::class,'ajax'])->name('fullcalenderAjax');

          Route::get('/followupform',[followUpForms::class,'showNewForm'])->name('followupform');
          //   Route::post('/logout',[userCalendar::class,'index'])->name('logout');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        // Route::view('/home','dashboard.admin.dashboard')->name('home');
        Route::get('/home',[AdminDashboardController::class,'index'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        
        // Team Routes;
        Route::get('/teams',[AdminTeamsController::class,'teams'])->name('teams');
        Route::post('/addteam',[AdminTeamsController::class,'createTeam'])->name('addteam');
        Route::post('/deleteteam',[AdminTeamsController::class,'deleteTeam'])->name('deleteteam');
        
        // Project Routes
        Route::get('/project/{id}',[AdminProjectController::class,'index'])->name('adminProjects');
        Route::get('/project/{teamId}/details/{projectId}',[AdminProjectController::class,'projectDetails'])->name('projectDetails');
        
        // AJAX Routes
        Route::get('/ajaxTeamLead',[AdminTeamsController::class,'teams'])->name('ajaxTeamLead');
        Route::get('/ajaxTeamMembers',[AdminTeamsController::class,'getTeamMembers'])->name('ajaxTeamMembers');
        
    });

});

Route::prefix('manager')->name('manager.')->group(function(){

       Route::middleware(['guest:manager','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.manager.login')->name('login');
            Route::view('/register','dashboard.manager.register')->name('register');
            Route::post('/create',[ManagerController::class,'create'])->name('create');
            Route::post('/check',[ManagerController::class,'check'])->name('check');

            Route::fallback(function () {
                Route::view('/login','dashboard.manager.login')->name('login');

                });
       });

       Route::middleware(['auth:manager','PreventBackHistory'])->group(function(){
            Route::get('/home',[ManagerDashboardController::class,'index'])->name('home');

            // manager Projects
            Route::get('/managerproject',[ManagerProjectController::class,'index'])->name('managerproject');
            Route::get('/editmanagerproject/{id}',[ManagerProjectController::class,'edit'])->name('editmanagerproject');
            Route::post('/addproject',[ManagerProjectController::class,'createProject'])->name('addproject');
            Route::post('/updateproject',[ManagerProjectController::class,'updateProject'])->name('updateproject');
            Route::post('/deleteproject',[ManagerProjectController::class,'deleteProject'])->name('deleteproject');
            
            // manager Tasks 
            Route::get('/managertasks/{projectId}',[ManagerTaskController::class,'index'])->name('managertasks');
            Route::post('/managertasks/createnewtask',[ManagerTaskController::class,'createTask'])->name('createnewtask');
            Route::post('/managertasks/managerUpdateTask',[ManagerTaskController::class,'updateTask'])->name('managerUpdateTask');
            Route::post('/managertasks/managerDeleteTask/{id}',[ManagerTaskController::class,'deleteTask'])->name('managerDeleteTask');
            // Route::get('/managertasksdetails/{taskId}',[ManagerTaskController::class,'managertaskDetails'])->name('managertasksdetails');
            Route::POST('/managertasksdetails',[ManagerTaskController::class,'managertaskDetails'])->name('managertasksdetails');
            
            // Route::post('/managertasks/{projectId}',['as'=>'showProjects','uses'=> 'ManagerTaskController@index'])->name('managertasks');
            
            // AJAX Routes
             Route::get('/ajaxTaskAssigned',[ManagerTaskController::class,'getAssignedTo'])->name('ajaxTaskAssigned');
             Route::get('/ajaxGetTasks/{id}',[ManagerTaskController::class,'getTasks'])->name('ajaxGetTasks');
             Route::get('/editTaskAjax/{id}',[ManagerTaskController::class,'editTasks'])->name('editTaskAjax');
        
            Route::post('logout',[ManagerController::class,'logout'])->name('logout');


            Route::fallback(function() {
                return redirect()->route('manager.home');
            // Route::get('/home',[ManagerDashboardController::class,'index'])->name('home');
            });
       });

});
