<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <title>Hello, world!</title>
  </head>
  <body>
  
   


      
      


<div class="container">
    <div class="row">
        <div class="logo_img">
          <img src="{{asset('frontend/img/logo.jpg')}}" alt="logo">
        </div>
    </div>
</div>


<!-- <div class="wrap">
    <div class="search">
       <input type="text" class="searchTerm" placeholder="Search Company">
       <button type="submit" class="searchButton">
         <i class="fa fa-search"></i>
      </button>
    </div>
  </div> -->

  <div class="wrap">
  <div class="search">
  <form action="{{ route('search') }}" method="GET">
        <input type="text" name="query" placeholder="Search Company?" required>
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
  




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>