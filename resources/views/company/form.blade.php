<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="clinics/style.css">
      <title>Document</title>
   </head>
   <body>
      <div class="card">
         <div class="text-center intro">
            <img src="https://www.bing.com/images/blob?bcid=rya2dENo2YgFbw" width="160">
            <span class="d-block account">Don't have account yet?</span>
            <span class="contact">Contact us at <a href="" class="mail">contact@bbbootstrap.com</a> and <br> we will take care of everything</span>    
         </div>
         <div class="mt-4 text-center">
            <h4 >Log In.</h4>
            <div class="mt-3 inputbox">
               <form method="POST" action="{{ route('company.login')}}">
                  @csrf
                  <input type="text" class="form-control" name="email" placeholder="Email">
                  <i class="fa fa-user"></i>
            </div>
            <div class="inputbox">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i class="fa fa-lock"></i>
            </div>
         </div>
         <div class="d-flex justify-content-between">
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
         <label class="form-check-label" for="flexCheckDefault">
         Keep me Logged in
         </label>
         </div>
         <div>
         <a href="#" class="forgot">Forgot Password?</a>
         </div>
         </div>
         <div class="mt-2">
         <button class="btn btn-primary btn-block">Log In</button>
         </div>
         </form>
      </div>
   </body>
</html>