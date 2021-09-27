<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Failure</title>
        <style>
            button[type="submit"] {
            width: 10%;
            height: 60px;
            border: 1px solid;
            background: red;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            color: white;
        }

        button[type="submit"]:hover {
            border-color: #2691d9;
            transition: -5s;
        }
        </style>
    </head>
    <body>
    <h1 style="color: red;">Wrong username or password!</h1>
    <form action="/">
        <button type="submit">Home</button><br><br>
    </form>
    <form action="login">
        <button type="submit">Try again</button><br><br>
    </form>
    </body>
</html>