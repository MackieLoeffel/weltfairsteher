  
        <link rel="stylesheet" type="text/css" href="index_gallery/css/rslides_layout.css">
        <link rel="stylesheet" type="text/css" href="index_gallery/css/index_gallery_layout.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="index_gallery/js/responsiveslides.min.js"></script>
        
        <script>
          $(function() {
            $(".rslides").responsiveSlides({
                auto: false,
                pager: false,
                nav: true,
                speed: 200,
                namespace: "callbacks",
                before: function () {},
                after: function () {}
            });
          });
        </script>

        <div class="callbacks_container">
            <ul class="rslides">
                <li>
                  <img src="index_gallery/images/Slide1.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide2.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide3.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide4.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide5.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide6.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide7.svg" alt="">
                </li>
                <li>
                  <img src="index_gallery/images/Slide8.svg" alt="">
                </li>
            </ul>
        </div>