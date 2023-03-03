<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

</head>

<body>
    <style>
        .Fav_color {
            width: 50px;
            height: 50px;
            padding: 10px;
            margin: auto;
        }
    </style>
    <div class="p-1">
        <div class="p-3 d-flex  mx-5">
            <a class="ms-2 btn btn-success fs-4" href="{{ route('student.index') }}">back</a>
            <div class="text-center w-100">
                <h2>Student All Data</h2>
            </div>
        </div>
        <table class="table table-primary table-responsive table-bordered">
            <thead class="table-borderless text-center table-dark">
                <th>ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Student Password </th>
                <th>Contact</th>
                <th>Semester</th>
                <th>Hobby</th>
                <th>Gender</th>
                <th>Favorite Color</th>
                <th>Intrest in coding</th>
                <th>Date of Birth</th>
                <th>Month</th>
                <th>Website</th>
                <th>Photo</th>
                <th>Update</th>
                <th>Create</th>
                <th>Action</a>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ Str::of($student->password)->mask('*', 5) }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->semester }}</td>
                    <td>{{ $student->hobby }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>Birth
                        <div class="Fav_color shadow-lg border border-dark rounded"
                            style="background-color:{{ $student->color }};"></div>
                    </td>
                    <td>{{ $student->interest }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->month }}</td>
                    <td>{{ $student->url }}</td>
                    <td> <img src="{{ url('storage/' . $student->photo) }}" width="100px"
                            alt="{{ $student->photo }}">
                    </td>
                    <td>{{ $student->updated_at }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td class="text-center">
                        <form action="{{ route('student.destroy', ['student' => $student->id]) }}" class="d-flex" method="post">
                            @method('delete')
                            @csrf
                            <div>
                                <a href="{{ route('student.edit', ['student' => $student->id]) }}"
                                    class="btn btn-warning">edit</a>
                            </div>
                            <div>

                                <button type="submit" class="btn btn-danger">delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
