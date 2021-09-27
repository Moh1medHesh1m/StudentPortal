<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;

class UserController extends Controller
{
    function getLoginInfo(Request $loginReq)
    {
        $loginReq->validate([
            'username' => 'required | max:15',
            'password' => 'required | min:8'
        ]);
        $loginRequestInfo = $loginReq->input();
        $user = User::where('username', '=', $loginReq->username)->first();
        if ($user) {
            if ($user->password == $loginReq->password) {
                if ($user->username == "admin") {
                    $loginReq->session()->put('username', $loginRequestInfo['username']);
                    return redirect('adminProfile');
                } else if (($loginReq['radio'] == 'staff') && (($user->password) != "adminpassword") && (($user->year) == 0)) {
                    $loginReq->session()->put('username', "Teacher");
                    $loginReq->session()->put('user', $loginRequestInfo['username']);
                    return redirect('showTeacherStudents');
                } else if ((($user->id) != 0) && (($user->username) != "admin") && (($user->year) != 0)) {
                    $loginReq->session()->put('username', $loginRequestInfo['username']);
                    return redirect('showStudentCourses');
                } else {
                    return view('loginFailure');
                }
            } else {
                return view('loginFailure');
            }
        } else {
            return view('loginFailure');
        }
    }

    function getRegisterInfo(Request $registerReq)
    {
        $registerReq->validate([
            'username' => 'required | max:15',
            'password' => 'required | min:8',
            'id' => 'required | max:4',
            'email' => 'required',
            'gpa' => 'required',
            'year' => 'required'
        ]);
        if (User::find($registerReq->id)||!($registerReq->file)) {
            return view('Wrong');
        } else {
            $user = new User();
            $user->username = $registerReq->username;
            $user->password = $registerReq->password;
            $user->id = $registerReq->id;
            $user->email = $registerReq->email;
            $user->gpa = $registerReq->gpa;
            $user->year = $registerReq->year;
            $user->image = $registerReq->file('file')->store('images');
            $user->save();
            return redirect('register');
        }
    }

    function getCourseRegisterInfo(Request $courseRegReq)
    {
        $courseRegReq->validate([
            'coursename' => 'required',
            'teacher' => 'required',
            'id' => 'required | min:5',
            'year' => 'required'
        ]);
        if (Course::find($courseRegReq->id)) {
            return view('Wrong');
        } else {
            $course = new Course();
            $course->id = $courseRegReq->id;
            $course->coursename = $courseRegReq->coursename;
            $course->teacher = $courseRegReq->teacher;
            $course->year = $courseRegReq->year;
            $course->save();
            return redirect('addCourse');
        }
    }

    public function showStudentsDataWithYear($year)
    {
        $collection = DB::select('select * from users where id != 0 and year = ?', [$year]);
        return view('studentsShowOnly', ['collection' => $collection]);
    }

    public function showStudentsData()
    {
        $collection = DB::select('select * from users where id != 0 and year != 0');
        return view('studentsList', ['collection' => $collection]);
    }

    function showCoursesData()
    {
        $collection = Course::paginate(5);
        return view('coursesList', ['collection' => $collection]);
    }

    public function deleteStudentData(Request $dReq)
    {
        $user = DB::table('users')->where('id', $dReq->id);
        $user->delete();
        return redirect('deleteChangeForm');
    }

    function showStudentData(Request $cReq)
    {
        $user = User::find($cReq->id);
        if ($user) {
            if (($user->year) == 0) {
                return view('teacherEditForm', ['user' => $user]);
            } else {
                return view('studentEditForm', ['user' => $user]);
            }
        } else {
            return view('Wrong');
        }
    }

    function editStudentData(Request $studentEditRequest)
    {
        $studentEditRequest->validate([
            'username' => 'required | max:15',
            'password' => 'required | min:8',
            'email' => 'required',
            'gpa' => 'required',
            'year' => 'required',
        ]);
        $username = $studentEditRequest->username;
        $password = $studentEditRequest->password;
        $email = $studentEditRequest->email;
        $gpa = $studentEditRequest->gpa;
        $year = $studentEditRequest->year;
        $id = $studentEditRequest->id;
        if ($studentEditRequest->file) {
            $image = $studentEditRequest->file('file')->store("images");
            DB::update('update users set username = ?, password = ?, email = ?, gpa = ?, image = ?, year = ? where id = ?', [$username, $password, $email, $gpa, $image, $year, $id]);
        } else {
            DB::update('update users set username = ?, password = ?, email = ?, gpa = ?, year = ? where id = ?', [$username, $password, $email, $gpa, $year, $id]);
        }
        return redirect('changeForm');
    }

    public function deleteCourseData($id)
    {
        $course = DB::table('courses')->where('id', $id);
        $course->delete();
        return redirect('showCoursesData');
    }

    function showCourseData($id)
    {
        $course = Course::find($id);
        return view('courseEditForm', ['course' => $course]);
    }

    function editCourseData(Request $courseEditRequest)
    {
        $courseEditRequest->validate([
            'coursename' => 'required',
            'teacher' => 'required',
            'year' => 'required'
        ]);
        $coursename = $courseEditRequest->coursename;
        $teacher = $courseEditRequest->teacher;
        $year = $courseEditRequest->year;
        $id = $courseEditRequest->id;
        DB::update('update courses set coursename = ?, teacher = ?, year = ? where id = ?', [$coursename, $teacher, $year, $id]);
        return redirect('showCoursesData');
    }

    function showStudentCourses()
    {
        $variable = session('username');
        $user = DB::table('users')
            ->whereIn('username', [$variable])
            ->get();
        $collection = DB::table('courses')->whereIn('year', [$user[0]->year])->get();
        return view('studentProfile', ['user' => $user[0]], ['collection' => $collection]);
    }

    function showCourseStudents($id)
    {
        $course = DB::table('courses')->whereIn('id', [$id])->get();
        $collection = DB::table('users')->whereIn('year', [$course[0]->year])->get();
        return view('courseProfile', ['course' => $course[0]], ['collection' => $collection]);
    }
}
