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
                    <th>Company Name</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <!-- <th>Actions</th> -->
                </tr>
                @foreach($productdata as $data)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$data->companyfunc->company_name}}</td>
                    <td>{{$data->product_name}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->quantity}}</td>
                    <!-- <td><img src="{{ asset('/companylogo/'.$data->company_logo) }}" class="img-fluid w-25 mx-auto d-block"></td> -->
                    <!-- <td>
                      <a href="{{ route('productroute.show',$data->id) }}">
                        <button class="btn btn-info">Show Details</button>
                      </a>
                      <a href="{{ route('productroute.edit',$data->id) }}">
                        <button class="btn btn-info">Edit</button>
                      </a>
                      <form method="post" action="{{ route('productroute.destroy',$data->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                      </form>
                    </td> -->
                </tr>
                @endforeach
        </table>
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