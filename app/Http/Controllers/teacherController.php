<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;

class teacherController extends Controller
{
    function getRegisterInfo(Request $registerReq)
    {
        $registerReq->validate([
            'username' => 'required | max:15',
            'password' => 'required | min:8',
            'email' => 'required',
            'id' => 'required | min:5'
        ]);
        if (User::find($registerReq->id)) {
            return view('Wrong');
        } else {
            $user = new User();
            $user->gpa = 0;
            $user->year = 0;
            $user->username = $registerReq->username;
            $user->password = $registerReq->password;
            $user->email = $registerReq->email;
            $user->id = $registerReq->id;
            $user->save();
            return redirect('teacherRegister');
        }
    }

    function editTeacherData(Request $studentEditRequest)
    {
        $studentEditRequest->validate([
            'username' => 'required | max:15',
            'password' => 'required | min:8',
            'email' => 'required'
        ]);
        $username = $studentEditRequest->username;
        $password = $studentEditRequest->password;
        $email = $studentEditRequest->email;
        $id = $studentEditRequest->id;
        DB::update('update users set username = ?, password = ?, email = ? where id = ?', [$username, $password, $email, $id]);
        return redirect('changeForm');
    }

    function showTeacherStudents()
    {
        $variable = session('user');
        $user = DB::table('users')
            ->whereIn('username', [$variable])
            ->get();
        $course = DB::table('courses')->whereIn('id', [$user[0]->id])->get();
        $collection = DB::table('users')->whereIn('year', [$course[0]->year])->get();
        return view('teacherProfile',  ['course' => $course[0]], ['collection' => $collection]);
    }

    function getVideoRegisterInfo(Request $videoRegisterReq)
    {
        $videoRegisterReq->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required ',
            'year' => 'required'
        ]);
        if (Video::find($videoRegisterReq->id)) {
            return view('Wrong');
        } else {
            $video = new Video();
            $video->id = $videoRegisterReq->id;
            $video->title = $videoRegisterReq->title;
            $video->description = $videoRegisterReq->description;
            $video->year = $videoRegisterReq->year;
            $del = "/";
            $str1 = $videoRegisterReq->file('fileVideo')->store('videos');
            $token1 = strtok($str1, $del);
            $token1 = strtok($del);
            $video->image = $token1;
            $str2 = $videoRegisterReq->file('fileImage')->store('course_image');
            $token2 = strtok($str2, $del);
            $token2 = strtok($del);
            $video->course_images = $token2;
            $video->save();
            return redirect('uploadVideo');
        }
    }
}
