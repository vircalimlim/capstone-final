<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    
    <style>
      .overlay{
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        height: 100vh;
        width: 100vw;
        z-index: 2;
        background: rgba(0,0,0, .6);
      }
      img{
        height: 100vh;
        width: 100%;
        object-fit: fill;
      }
      .login-btn{
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        text-align: center;
        z-index: 3;
        overflow-x: scroll;
      }
      .middle{
        display: table-cell; 
        vertical-align: middle;
      }
      
      header{
        z-index: 4;
        position: sticky;
        width: 100%;
        top: 0;
        left: 0;
      }
      boddy{
        height: 100vh;
        
      }

    </style>
</head>
<body class="h-10d0 overflsow-auto">

<div class="overlay">

</div>

      <header class="mb-6">
        <div class="bg-primary text-light px-3 py-4">
          <h3>Barangay Health Record Management System</h3>
        </div>
      </header>

<div class="container text-light">

<div class="login-btn my-6">
  
  <div class="middle">
  
  <div class="p-3">
 <!-- <h2 class="text-white p-3">Barangay Health Record Management System for Barangay Abonagan Malasiqui, Pangasinan</h2> -->
    <div class="col-12">
      <h3>Mission</h3>
      <p class="h5 font-weight-light">To provide patient-centered healthcare with excellence in quality, service, and access.</p>
    </div>
  </div>
  
  <div class="p-3">
    <div class="col-12">
      <h3>Vision</h3>
      <p class="h5 font-weight-light">A community in which all people achieve their full potential for health and well-being across the lifespan.  We work to be trusted by patients, a valued partner in the community, and creators of positive change.</p>
    </div>
  </div>
  
  <a href="/login" class="btn btn-lg  btn-primary mb-6">Login Now</a>
  
  </div>
</div>

  <img src="https://library.kissclipart.com/20181003/fhw/kissclipart-health-clinic-clip-art-clipart-clinic-community-he-c3f0d9747a1ba433.png">

</div>

        <footer class="fixed-bottom bg-info text-light py-3 px-3 text-center">
          <strong>Copyright &copy; 2021. </strong>
            All rights reserved.
        </footer>

</body>
</html>
