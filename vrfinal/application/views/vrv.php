<!DOCTYPE html>
<html lang="en">

<head>
  <title>VR view</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>vidfiles/style.css">
</head>

<body>
  <div id="error" class="dialog">
    <div class="wrap">
      <h1 class="title">Error</h1>
      <p class="message">An unknown error occurred.</p>
    </div>
  </div>

  <div id="play-overlay">
    <img src="<?php echo base_url(); ?>vidfiles/images/ic_play_arrow_white_24dp.svg" />
  </div>

  <a id="watermark" href="http://g.co/vr/view" target="_blank">
    <img src="<?php echo base_url(); ?>vidfiles/images/ic_info_outline_black_24dp.svg" />
  </a>

  <script>
    WebVRConfig = {
      BUFFER_SCALE: 0.5,
      TOUCH_PANNER_DISABLED: false
    };
  </script>

  <script src="<?php echo base_url(); ?>vidfiles/build/three.js"></script>
  <script src="<?php echo base_url(); ?>vidfiles/build/embed.js"></script>
</body>

</html>
