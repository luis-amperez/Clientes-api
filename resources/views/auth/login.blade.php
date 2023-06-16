<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('css/login.css') }}">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <title>Login</title>
</head>
<body>
    <div class="wrapper fadeInDown container">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->

          <div class="fadeIn first">
            <img src="https://www.pngitem.com/pimgs/m/273-2738719_user-login-icon-png-transparent-background-login-icon.png" id="icon" alt="User Icon" />
          </div>
      
          <!-- Login Form -->
          <form method="POST" action="{{route('login')}}">
            <input type="text" id="login" class="fadeIn second" name="email" required placeholder="login">
            <input type="hidden" name="_token" id="token_cliente" value="{{ csrf_token() }}">
            <input type="password" id="password" class="fadeIn third" required name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
          @isset($response)
          @if ($response->status() != 200)  
            <div class="alert alert-danger col-xl-10 col-md-10 offset-lg-1 offset-md-1 py-2" style="padding: 10px;" role="alert">
              {{$response['msg']}}
            </div>
            
          @endif
        @endisset
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
      
        </div>
      </div>
      <br>

</body>
</html>