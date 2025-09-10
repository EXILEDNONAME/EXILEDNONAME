<!DOCTYPE html>
<html>

<head>
  <title>
    @php $title = DB::table('system_settings')->first(); @endphp
    {{ $title->application_name; }} - 404 | Not Found
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="author" content="EXILEDNONAME">
  <meta name="keywords" content="Creative">
  <meta name="robots" content="all">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/page-errors/css/animate.css">
  <link rel="stylesheet" href="{{ env('APP_URL') }}/assets/page-errors/css/stylesheet.css">
</head>

<body>
  <div class="wrapper wow">
    <center>
      <div class="wow bounceInDown" data-wow-delay="4s">
        <br>
        <h2> 404 | NOT FOUND </h2>
        <div class="text">
          Sorry, the page you're looking for doesn't exist.
        </div>
        <p></p>
        <a href="/dashboard" class="le-btn"> GO BACK </a>
      </div>
    </center>
    <div id="texture" class="bg-image" data-bg-image="{{ env('APP_URL') }}/assets/page-errors/images/texture.png"></div>
    <div id="hole" class="wow bounceInUp" data-wow-delay="3s"></div>
    <div id="moon" class="wow bounceInUp" data-wow-delay="2s"></div>
    <div id="hand" class="wow bounceInUp" data-wow-delay="3.5s">
      <div class="text">
        THIS PAGE NOT FOUND ...
      </div>
    </div>
    <div id="grass" class="wow bounceInUp" data-wow-delay="1s"></div>
    <div id="grass2" class="wow bounceInUp" data-wow-delay="1.5s"></div>
  </div>

  <a class="goto-top" href="#gotop"></a>
  <script src="{{ env('APP_URL') }}/assets/page-errors/js/jquery-1.9.0.min.js"></script>
  <script src="{{ env('APP_URL') }}/assets/page-errors/js/jquery-migrate-1.4.1.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}/assets/page-errors/js/plax.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}/assets/page-errors/js/wow.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}/assets/page-errors/js/fontsmoothie.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}/assets/page-errors/js/jquery.spritely.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}/assets/page-errors/js/script.js"></script>
</body>

</html>