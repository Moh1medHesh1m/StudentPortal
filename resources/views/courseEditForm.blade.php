<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course Update</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: 1.5px solid;
        }

        button[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        button[type="submit"]:hover {
            border-color: #2691d9;
            transition: -5s;
        }

        .signup_link {
            text-align: center;
            font-weight: bold;
        }

        .signup_link a {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #2691d9;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>Course Update</h1>
        <form action='/editCourseData' method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$course->id}}" />
            <input class="txt_field" type="text" name="coursename" value="{{$course->coursename}}" /><br>
            <span style="color:red">@error ('coursename') {{$message}} @enderror</span>
            <input class="txt_field" type="text" name="teacher" value="{{$course->teacher}}" /><br>
            <span style="color:red">@error ('teacher') {{$message}} @enderror</span>
            <input class="txt_field" type="text" name="year" value="{{$course->year}}" /><br>
            <span style="color:red">@error ('year') {{$message}} @enderror</span><br><br>
            <button type="submit">Update</button><br><br>
            <div class="signup_link">
                <a href="/adminProfile">Admin Profile</a> <br>
            </diV>
        </form>
    </div>
</body>

</html>