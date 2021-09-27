<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teacher Update</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;

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

            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 10px 0;
            width: 100%;
            padding: 0 5px;
            height: 30px;
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
        <h1>Teacher Update</h1>
        <form action='/editTeacherData' method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}" /><br>
            <input class="txt_field" type="username" name="username" value="{{$user->username}}" /><br>
            <span style="color:red">@error ('username') {{$message}} @enderror</span>
            <input class="txt_field" type="password" name="password" value="{{$user->password}}" /><br>
            <span style="color:red">@error ('password') {{$message}} @enderror</span>
            <input class="txt_field" type="email" name="email" value="{{$user->email}}" /><br>
            <span style="color:red">@error ('email') {{$message}} @enderror</span>
            <button type="submit">Update</button><br><br>
            <div class="signup_link">
                <a href="/adminProfile">Admin Profile</a> <br><br>
            </div>
        </form>
    </div>
</body>

</html>