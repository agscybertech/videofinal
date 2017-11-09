<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $video->title; ?> </title>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
        <link href="<?php echo base_url(); ?>vidfiles/style_video.css" rel="stylesheet" type="text/css">
  </head>
  <body>    
    <?php $vid = base_url()."upload/video/".$video->image1; ?>   
     <div id="vrview"><iframe allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="<?php echo $vid; ?>"></div>        
  </body>
</html>
