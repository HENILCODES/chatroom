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

    <div class="container" style="width: 600px">
        <div class="my-2">
            <div class="text-center">
                <h1>Student Detail</h1>
            </div>
            <div class="text-start">
                <a class="text-start btn btn-success bi bi-arrow-left-square fs-5"
                    href="{{ route('student.index') }}">back</a>
            </div>
        </div>
        <table class="table table-light table-striped">
            <tr>
                <td class="ps-5 fw-bold">Name</td>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">Email</td>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">password</td>
                <td>{{ $student->password }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">contact</td>
                <td>{{ $student->contact }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">semester</td>
                <td>{{ $student->semester }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">hobby</td>
                <td>{{ implode(',',$student->hobby) }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">color</td>
                <td>
                    <div class="Fav_color shadow-lg border border-dark rounded"
                        style="background-color:{{ $student->color }};"></div>
                </td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">interset</td>
                <td>{{ $student->interest }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">Dob</td>
                <td>{{ $student->dob }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">month</td>
                <td>{{ $student->month }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">website</td>
                <td>{{ $student->url }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">photo</td>
                <td><img src="{{ url('storage/' . $student->photo) }}" width="100px" alt="{{ $student->photo }}">
                </td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">create</td>
                <td>{{ $student->created_at }}</td>
            </tr>
            <tr>
                <td class="ps-5 fw-bold">Update</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
            <tr>
                <td colspan="2" class="bg-light text-center">
                    <form action="{{ route('student.destroy', ['student' => $student->id]) }}" method="post">
                        <a href="{{ route('student.edit', ['student' => $student->id]) }}"
                            class="btn btn-warning bi bi-pencil me-4">edir</a>
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger bi bi-trash">delete</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
