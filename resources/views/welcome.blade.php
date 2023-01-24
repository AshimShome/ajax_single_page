<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

   
    <div class="container">
     
      <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add product
      </button>
    <table class="table table-bordered m-2">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Quentity</th>
            <th scope="col">Acction</th>

           
          </tr>
        </thead>
        <tbody id="tData">
          
        </tbody>
      </table>
    
      <!-- Button trigger modal -->

</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form id="formSubmit">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <div class="row">
         <div class="col-12">
            <level>Name <span style="color: red">*</span></level>        
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
         </div>
         <div class="row mt-3">
            <div class="col-6 form-group">
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity"
                       required>
            </div>
            <div class="col-6  form-group">
              <input type="file" class="form-control" id="image" name="image" placeholder="Image"
              required>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col-6 form-group">
              
          </div>
          <div class="col-6  form-group">
            <img id="blah" src="#" alt="your image"  width="80px" height="100 px"/>

          </div>
      </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>

    </div>
  </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
       
         });

      //    $(document).on("submit",'#formSubmit',function(e){
      //     e.preventDefault();
      //     let formData=new formData($('#formSubmit')[0]); 
      //     // alert("ok");
      //     console.log(formData);
      //  });
        
       $(document).on('submit', '#formSubmit', function(event) {
                event.preventDefault();
                let data = new FormData($('#formSubmit')[0]);
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: `/product/store/`,
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // $("#port_data").trigger("reset");
                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'Your work has been saved',
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                        // portfolioShow();
                    },
                });
            });


        //  for preview image
        image.onchange = evt => {
           const [file] = image.files
             if (file) {
             blah.src = URL.createObjectURL(file)
             }
                }
    </script>
  </body>
</html>