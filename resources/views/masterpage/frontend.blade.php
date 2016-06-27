<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>NgeKEEP</title>

    <link rel="stylesheet" type="text/css"
      href="https://fonts.googleapis.com/css?family=Oswald&subset=cyrillic">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <style>
      body {
        font-family: 'Oswald';
      }
      .mt10 {
        margin-top: 10px;
      }

      a, button, code, div, img, input, label, li, p, pre, select, span, svg, table, td, textarea, th, ul {
        border-radius: 0 !important;
        box-shadow: none !important;
      }

      .btn {
        color: #FFF;
      }

      .btn.green {
        background-color: #32c5d2;
        border-color: #32c5d2;
      }

      .btn.green:hover {
        color: #FFF;
        background-color: #26a1ab;
        border-color: #2499a3;
      }

      .btn.blue {
        background-color: #3598dc;
        border-color: #3598dc;
      }

      .btn.blue:hover {
        color: #FFF;
        background-color: #217ebd;
        border-color: #1f78b5;
      }
    </style>
  </head>
  <body>
      <div class="container">
        @yield('content')
      </div>
  </body>
</html>
