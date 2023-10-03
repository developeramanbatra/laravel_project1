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
            <form method='post' action="{{ route('productroute.store')  }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Company Name</label>
                  <select name="companyId" class="form-control" required>
                    <option selected disabled value="">Choose Company</option>
                    @foreach($companydata as $item)
                      <option value="{{ $item->id }}">{{ $item->company_name }} </option>
                    @endforeach
                  </select>
                </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Product Name</label>
                  <input type="text" name='product_name' class="form-control" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Price</label>
                  <input type="number" name='price' class="form-control" aria-describedby="emailHelp" required>
              </div>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Quantity</label>
                  <input type="number" name='quantity' class="form-control" aria-describedby="emailHelp" required>
              </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

      <!-- AJAX Method for choosing Product after selecting brand or company or category   -->

  <div class="container">
    <div class="row justify-content-center align-items-center g-2">
      <div class="col-6">
              <label for="exampleInputEmail1" class="form-label">Company Name</label>
              <select name="company_id" id="company_id" class="form-control" required>
                <option selected disabled value="">Choose Company</option>
                @foreach($companydata as $item)
                  <option value="{{ $item->id }}">{{ $item->company_name }} </option>

                @endforeach
              </select>
      </div>
      <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">Choose Product</label>
          <select name='products' id='products' class="form-control" aria-describedby="emailHelp" required>

        </select>
      </div>
    </div>
  </div>
  <!-- eh script file kithe available hundi aa//......CDN of Jquery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#company_id').on('change', function() {
            var id = $(this).val();
            // alert(id)
            if(id) {
                $.ajax({
                    url: '../getproducts/'+id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data)
                        $('#products').empty();
                        $('#products').append('<option>Select Product</option>');
                        $.each(data, function(i, e){
                            $('#products').append('<option value='+e.id+'>'+e.product_name+'</option>');
                        }); 
                    }
                });
            }else{
                alert("no data found");
            }
        });
   });
  </script>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>