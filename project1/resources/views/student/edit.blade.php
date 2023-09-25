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
  
<div class="container">
    <div class="row">
        <div class="col">
          @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }}  </div>
          @endif

          <!-- Check Student Json -->
          {{$student}} <!-- <----------Comment this not important -->

            <form method='post' action="{{ route('studentroute.update',$student->id)  }}">
              @csrf
              @method("patch")
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" name='firstname' class="form-control" aria-describedby="emailHelp" value="{{  $student->firstname   }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" name='lastname' class="form-control" aria-describedby="emailHelp"  value="{{  $student->lastname   }}" >
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Roll no</label>
                <input type="text" name='rollno' class="form-control" aria-describedby="emailHelp"  value="{{  $student->rollno   }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contact</label>
                <input type="text" name='contact' class="form-control" aria-describedby="emailHelp"  value="{{  $student->contact   }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name='email' class="form-control" aria-describedby="emailHelp"  value="{{  $student->email   }}" required>
            </div>
            
           
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>