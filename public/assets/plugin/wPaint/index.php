<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" />
  

  <!-- filestart -->
  <link rel="Stylesheet" type="text/css" href="./demo/demo.css" />
  <script type="text/javascript" src="./lib/jquery.1.10.2.min.js"></script>
  <!-- fileend -->
</head>
<body>
  <!-- headstart -->
  <header>
    <a id="header-logo" href="http://websanova.com"></a>

    <div id="header-links">
      <a href="http://websanova.com">Blog</a>
      <a href="http://websanova.com/plugins">Plugins</a>
      <a href="http://websanova.com/extensions">Extensions</a>
      <a href="http://websanova.com/services">Services</a>
    </div>
  </header>
  <!-- headend -->

  <div id="content">
    <h1 id="plugin-name">wPaint.js</h1>

    <div class="content-box">
      <!-- jQuery UI -->
      <script type="text/javascript" src="./lib/jquery.ui.core.1.10.3.min.js"></script>
      <script type="text/javascript" src="./lib/jquery.ui.widget.1.10.3.min.js"></script>
      <script type="text/javascript" src="./lib/jquery.ui.mouse.1.10.3.min.js"></script>
      <script type="text/javascript" src="./lib/jquery.ui.draggable.1.10.3.min.js"></script>
      
      <!-- wColorPicker -->
      <link rel="Stylesheet" type="text/css" href="./lib/wColorPicker.min.css" />
      <script type="text/javascript" src="./lib/wColorPicker.min.js"></script>

      <!-- wPaint -->
      <link rel="Stylesheet" type="text/css" href="./wPaint.min.css" />
      <script type="text/javascript" src="./wPaint.min.js"></script>
      <script type="text/javascript" src="./plugins/main/wPaint.menu.main.min.js"></script>
      <script type="text/javascript" src="./plugins/text/wPaint.menu.text.min.js"></script>
      <script type="text/javascript" src="./plugins/shapes/wPaint.menu.main.shapes.min.js"></script>
      <script type="text/javascript" src="./plugins/file/wPaint.menu.main.file.min.js"></script>

      <div id="wPaint" style="position:relative; width:500px; height:200px; background-color:#7a7a7a; margin:70px auto 20px auto;"></div>

      <center style="margin-bottom: 50px;">
        <input type="button" value="toggle menu" onclick="console.log($('#wPaint').wPaint('menuOrientation')); $('#wPaint').wPaint('menuOrientation', $('#wPaint').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');"/>
      </center>

      <center id="wPaint-img"></center>

      <script type="text/javascript">
        var images = [
          '/test/uploads/wPaint.png',
        ];

        function saveImg(image) {
          var _this = this;

          $.ajax({
            type: 'POST',
            url: '/test/upload.php',
            data: {image: image},
            success: function (resp) {

              // internal function for displaying status messages in the canvas
              _this._displayStatus('Image saved successfully');

              // doesn't have to be json, can be anything
              // returned from server after upload as long
              // as it contains the path to the image url
              // or a base64 encoded png, either will work
              resp = $.parseJSON(resp);

              // update images array / object or whatever
              // is being used to keep track of the images
              // can store path or base64 here (but path is better since it's much smaller)
              images.push(resp.img);

              // do something with the image
              $('#wPaint-img').attr('src', image);
            }
          });
        }

        function loadImgBg () {

          // internal function for displaying background images modal
          // where images is an array of images (base64 or url path)
          // NOTE: that if you can't see the bg image changing it's probably
          // becasue the foregroud image is not transparent.
          this._showFileModal('bg', images);
        }

        function loadImgFg () {

          // internal function for displaying foreground images modal
          // where images is an array of images (base64 or url path)
          this._showFileModal('fg', images);
        }

        // init wPaint
        $('#wPaint').wPaint({
          menuOffsetLeft: -35,
          menuOffsetTop: -50,
          saveImg: saveImg,
          loadImgBg: loadImgBg,
          loadImgFg: loadImgFg
        });
      </script>
    </div>
  </div>

  <!-- footstart -->
  <footer>
    <div id="footer-icons">
      <!--a id="youtube-icon" href="http://websanova.com/youtube" target="_blank"></a-->
      <a id="stumbleupon-icon" href="http://websanova.com/stumbleupon" target="_blank"></a>
      <a id="linkedin-icon" href="http://websanova.com/linkedin" target="_blank"></a>
      <a id="facebook-icon" href="http://websanova.com/facebook" target="_blank"></a>
      <a id="googleplus-icon" href="http://websanova.com/googleplus" target="_blank"></a>
      <a id="twitter-icon" href="http://websanova.com/twitter" target="_blank"></a>
      <a id="github-icon" href="http://websanova.com/github" target="_blank"></a>
      <a id="rss-icon" href="http://websanova.com/feed" target="_blank"></a>
    </div>
  </footer>
  <!-- footend -->
</body>
</html>