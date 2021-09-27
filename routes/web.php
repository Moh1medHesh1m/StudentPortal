<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\teacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    if (session()->has('username')) {
        if (session('username') == "admin") {
            return view('adminProfile');
        } 
        else if(session('username') == "Teacher")
        {
            return redirect('showTeacherStudents');
        }
        else {
            return redirect('showStudentCourses');
        }
    }
    return view('login');
});

Route::get('/logout', function () {
    if (session()->has('username')) {
        session()->pull('username');
        session()->pull('user');
    }
    return view('login');
});

Route::post('/getLoginInfo', [UserController::class, 'getLoginInfo']);

Route::get('/adminProfile', function () {
    return view('adminProfile');
});

Route::get('/teacherProfile', function () {
    return view('teacherProfile');
});

Route::get('/teacherRegister', function () {
    return view('teacherRegister');
});

Route::get('/studentProfile', function () {
    return view('studentProfile');
});

Route::get('/loginFailure', function () {
    return view('studentProfile');
});


Route::get('/register', function () {
    return view('register');
});

Route::post('/getRegisterInfo', [UserController::class, 'getRegisterInfo']);

Route::post('/getVideoRegisterInfo', [teacherController::class, 'getVideoRegisterInfo']);

Route::post('/getTeacherRegisterInfo', [teacherController::class, 'getRegisterInfo']);

Route::get('/addCourse', function () {
    return view('addCourse');
});

Route::post('/getCourseRegisterInfo', [UserController::class, 'getCourseRegisterInfo']);

Route::get('/studentsList', function () {
    return view('studentsList');
});

Route::get('showStudentsDataWithYear/{year}', [UserController::class, 'showStudentsDataWithYear']);

Route::get('/showStudentsData', [UserController::class, 'showStudentsData']);

Route::get('/coursesList', function () {
    return view('coursesList');
});

Route::get('/showCoursesData', [UserController::class, 'showCoursesData']);

Route::post('/deleteStudentData', [UserController::class, 'deleteStudentData']);

Route::post('/editStudentDataChange', [UserController::class, 'showStudentData']);

Route::post('editStudentData', [UserController::class, 'editStudentData']);

Route::post('editTeacherData', [teacherController::class, 'editTeacherData']);

Route::get('/deleteCourseData/{id}', [UserController::class, 'deleteCourseData']);

Route::get('editCourseData/{id}', [UserController::class, 'showCourseData']);

Route::post('editCourseData', [UserController::class, 'editCourseData']);

Route::get('/showStudentCourses', [UserController::class, 'showStudentCourses']);

Route::get('/courseProfile', function () {
    return view('courseProfile');
});

Route::get('showCourseStudents/{id}', [UserController::class, 'showCourseStudents']);

Route::get('/showTeacherStudents', [teacherController::class, 'showTeacherStudents']);

Route::get('/changeForm', function () {
    return view('changeForm');
});

Route::get('/Wrong', function () {
    return view('Wrong');
});

Route::get('/teacherEditForm', function () {
    return view('teacherEditForm');
});

Route::get('/deleteChangeForm', function () {
    return view('deleteChangeForm');
});

Route::get('/uploadVideo', function () {
    return view('uploadVideo');
});

Route::get('/front', function () {
    return view('front');
});

Route::get('/front/{year}',[VideoController::class,'show']);

Route::get('/videos/{id}',[VideoController::class,'print']);
