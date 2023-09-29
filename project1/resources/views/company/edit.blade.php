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
        <div class="col-9">
          @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }}  </div>
          @endif
            <h1 class="text-center display-1">Register</h1>
            <form method='post' action="{{ route('companyroute.update',$companydata->id)  }}" enctype="multipart/form-data">     <!-- line (route) In update diff from index form -->
              @csrf
              @method('patch')              <!-- line In update diff from index form -->
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Company Name</label>
                  <input type="text" name='company_name' class="form-control" aria-describedby="emailHelp" value="{{  $companydata->company_name  }}" required>
              </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Company Logo</label>
                  <input type="file" name='company_logo' class="form-control" aria-describedby="emailHelp" >        <!-- In Laravel old image is automatically selected if the new is not choosen -->
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