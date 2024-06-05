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
  
   


<!--       
      <style>

     body{
        margin: 0px;
        padding: 0px;;
        background: #f2f2f2;
        font-family: 'Open Sans', sans-serif;
        background-color: white;
      }



      </style> -->


<div class="container">
    <div class="row">
        <div class="logo_imgSearch">
                <img src="{{asset('frontend/img/logo.jpg')}}" alt="logo">
        </div>

        <div class="wrapSearch">
          <div class="searchSearch">
             <input type="text" class="searchTermSearch" placeholder="Search Company">
             <button type="submit" class="searchButtonSearch">
               <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
    </div>
</div>




<div class="container">
  <div class="row">

    <table class="table table-hover">
    
      <tbody>

      @foreach ($companies as $company)
        
     
        <tr>
          <td>{{$company->company_name}}</td>
        
          <td>
            
            <a href="{{$company->company_website}}"> <img src="{{asset('frontend/img/domain.png')}}" alt=""> </a>
            <a href="{{$company->company_phone}}"><img src="{{asset('frontend/img/phone.png')}}" alt=""> </a>

            <a href="{{$company->company_mail}} "><img src="{{asset('frontend/img/mail.png')}}" alt=""></a>

          </td>
        </tr>
      
        @endforeach
      </tbody>
    </table>
  </div>
</div>

  




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>