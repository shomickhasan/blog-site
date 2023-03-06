
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('backeend')}}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('backeend')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{asset('backeend')}}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('backeend')}}/css/bracket.css">
    <link rel="stylesheet" href="{{asset('backeend')}}/css/bracket.dark.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center ht-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-br-primary bd bd-white-1 rounded">
        <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">Please Regestration & create your own Blog</div>
      <form action="{{Route('signup')}}" method="POST">
        @csrf
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control form-control-dark" name="name" placeholder="Enter your name"/>
          </div><!-- form-group -->
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control form-control-dark" name="email" placeholder="Enter your email"/>
          </div><!-- form-group -->
          <div class="form-group">
            <label for="">Date of Borth</label>
            <input type="date" class="form-control form-control-dark" name="dateOfBirth" placeholder="Enter your Date of Birth"/>
          </div><!-- form-group -->
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control form-control-dark" name="password" placeholder="Enter your Password"/>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>
      </form>

        <div class="mg-t-40 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('backeend')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('backeend')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('backeend')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backeend')}}/lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
