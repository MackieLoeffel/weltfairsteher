<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ResponsiveSlides.js &middot; Responsive jQuery slideshow</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../responsiveslides.css">
  <link rel="stylesheet" href="galleryLayout.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {
        
      $("#slider").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {},
        after: function () {}
      });

    });
  </script>
</head>
<body>
  <div id="wrapper">

    <!-- Slideshow -->
    <div class="callbacks_container">
      <ul class="rslides" id="slider">
        <li>
          <img src="images/1.jpg" alt="">
          <p class="caption">This is a caption</p>
        </li>
        <li>
          <img src="images/2.jpg" alt="">
          <p class="caption">This is another caption</p>
        </li>
        <li>
          <img src="images/3.jpg" alt="">
          <p class="caption">The third caption</p>
        </li>
      </ul>
    </div>
  </div>
</body>
</html>
