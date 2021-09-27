<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="/assets/dcode.css">
    <meta name="viewport" content="width=device-widthy, initial-scale=1.0">
    <style>
        .w-5 {
            display: none;
        }

        body {
            font-family: sans-serif;
            background: linear-gradient(100deg, #2980b9, #8e44ad);
            color: white;
        }

        .content-table {
            border-collapse: collapse;
            margin: 25 px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
        }

        .content-table thead tr {
            background-color: white;
            color: #2980b9;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #8e44ad;

        }

        .content-table tbody tr:last-of-type {
            border-bottom: 4px solid #dddddd;
        }

        .w-5 {
            display: none;
        }

        button[type="submit"] {
            width: 5%;
            height: 30px;
            border: 1px solid;
            background: white;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            color: purple;
        }

        button[type="submit"]:hover {
            border-color: #2691d9;
            transition: -5s;
        }
    </style>
</head>

<body>
    <h1>Courses</h1>
    <table class="content-table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Course's name</td>
            <td>Teacher's name</td>
            <td>Year</td>
            <td>Operation</td>
        </tr>
        </thead>
        <tbody>
        @foreach($collection as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->coursename}}</td>
            <td>{{$item->teacher}}</td>
            <td>{{$item->year}}</td>
            <td>
                <a style="color: white;" href={{'deleteCourseData/'.$item->id}}>Delete</a>
                <a style="color: white;" href={{'editCourseData/'.$item->id}}>Edit</a>
                <a style="color: white;" href={{'showCourseStudents/'.$item->id}}>Students</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <span>
        {{$collection->links()}}
    </span><br><br>
    <form action="/adminProfile">
        <button type="submit">Admin</button><br><br>
    </form>
</body>

</html>