<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="table-responsive container">
        <table class="table table-secondary">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Roll No</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach($student as $data)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$data->firstname}}</td>
                    <td>{{$data->lastname}}</td>
                    <td>{{$data->rollno}}</td>
                    <td>{{$data->contact}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                      <a href="{{ route('studentroute.show',$data->id) }}">
                        <button class="btn btn-info">Show Details</button>
                      </a>
                      <a href="{{ route('studentroute.edit',$data->id) }}">
                        <button class="btn btn-info">Edit</button>
                      </a>
                      <!-- <a href="{{ route('studentroute.destroy',$data->id) }}"> -->
                        <!-- anchor tag can't be used for delete in laravel -->
                      <form method="post" action="{{ route('studentroute.destroy',$data->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                      </form>
                      <!-- </a> -->
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

    {{$student->links()}}     <!-- This is for pagination previous next button Links Or Buttons  -->
    

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>