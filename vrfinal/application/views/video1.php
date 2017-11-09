<?php $vid = base_url()."upload/video/".$video->image1; ?>

    
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/noty.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/hellovideo-fonts.css" />

    <link href="<?php echo base_url(); ?>hellovideoapp/css/video-js.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>hellovideoapp/js/video.js"></script>
    <style type="text/css">
    .vjs-default-skin .vjs-control-bar,
    .vjs-default-skin .vjs-big-play-button { background: rgba(0,0,0,0.58) }
    .vjs-default-skin .vjs-slider { background: rgba(0,0,0,0.19333333333333333) }
    </style>

    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/rrssb.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>hellovideoapp/css/animate.min.css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>if (!window.jQuery) { document.write('<script src="http://localhost/hellovideoapp/js/jquery.min.js"><\/script>'); }</script>

    <link rel="icon" href="<?php echo base_url(); ?>hellovideoapp/img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>hellovideoapp/img/favicon.png" type="image9sx-icon">
  
    

    <div class="clear"></div>
    <?php /*
    <div id="video_title">
      <div class="container">
        <span class="label">You're watching:</span> <h1><?php echo $video->title; ?></h1>
      </div>
    </div>
    <div id="video_bg" style="background-image:url(images/December2014/alma-short-film.jpg)">
      <div id="video_bg_dim" ></div>
      <div class="container">
        <div id="video_container" class="fitvid">
          <!--<iframe src="http://player.vimeo.com/video/4749536" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>   
          <iframe src="http://agscybertech.com/vrvideo/upload/video/0.89403200_1509034473_my_test_video_.MOV" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
          <iframe src="<?php echo $vid; ?>"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
        </div>
      </div>
    </div>
    <div class="container video-details">
      <div class="video-details-container"><p><?php echo $video->description; ?></p>
      </div>
      <div class="clear"></div>
    </div>*/?>

<!--///////////////////////////////-->

<div id="video_bg">
        <div id="video_bg_dim"></div>
        <div class="container">
            <div id="video_container">      
                <div class="video-js vjs-default-skin vjs-paused vjs-controls-enabled vjs-user-inactive" id="video_player">               
            <iframe width="100%" height="auto" src="<?php echo $vid; ?>">
                </iframe>              
               <div class="vjs-big-play-button" role="button" aria-live="polite" tabindex="0" aria-label="play video">
                  <span aria-hidden="true"></span>
              </div>
            </div>
        </div><!--video_container-->            
    </div><!--container-->
</div>

<div class="container video-details">
        <h3>
            <?php echo $video->title; ?>            
        </h3>
        <div class="video-details-container">
        <div class="_U1i mod" data-md="50" data-ved="0ahUKEwiKiOTBg5zKAhVW42MKHX-UBOoQkCkIwwEoAzAY">
              <div class="_cgc" data-hveid="196" data-ved="0ahUKEwiKiOTBg5zKAhVW42MKHX-UBOoQziAIxAEoADAY">
                  <div class="r-iGBNqFHSlLBM">
                      <div class="kno-rdesc r-ikr0dkz5FUMY kno-desc-sh"><?php echo $video->description; ?></span></div>
                  </div>
              </div>
        </div>
        <div class="_tN mod" data-md="139" data-ved="0ahUKEwiKiOTBg5zKAhVW42MKHX-UBOoQkCkI3QEoCjAf">&nbsp;</div>
    </div>
</div><!--video-details-->
<!--/////////////////////////////////-->



    <script type="text/javascript">
      /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
      var disqus_shortname = 'hellovideo';

      /* * * DON'T EDIT BELOW THIS LINE * * */
      (function() {
      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
      })();
    </script>
    <script src="<?php echo base_url(); ?>hellovideoapp/js/jquery.fitvid.js"></script>
    <!-- RESIZING FLUID VIDEO for VIDEO JS -->
    <script type="text/javascript">
      // Once the video is ready
      _V_("video_player").ready(function(){

      var myPlayer = this;    // Store the video object
      var aspectRatio = 9/16; // Make up an aspect ratio

      function resizeVideoJS(){
      console.log(myPlayer.id);
      // Get the parent element's actual width
      var width = document.getElementById('video_container').offsetWidth;
      // Set width to fill parent element, Set height
      myPlayer.width(width).height( width * aspectRatio );
      }

      resizeVideoJS(); // Initialize the function
      window.onresize = resizeVideoJS; // Call the function on resize
      });
    </script>
    <script src="<?php echo base_url(); ?>hellovideoapp/js/rrssb.min.js"></script>
    
    <script src="<?php echo base_url(); ?>hellovideoapp/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>hellovideoapp/js/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/noty/jquery.noty.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>hellovideoapp/js/noty/themes/default.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>hellovideoapp/js/noty/layouts/top.js"></script>
  