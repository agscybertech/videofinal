<?php $vid = base_url()."upload/video/".$video->image1; ?>
<?php /*<div id="video_bg">
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

<?php /*
<script src="//storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
<div id="vrview"></div>
<?php //$vid = "https://www.youtube.com/watch?v=ukOYivnn4HI"; ?>
<script>
  window.addEventListener('load', onVrViewLoad)
  function onVrViewLoad() {
      var vrView = new VRView.Player('#vrview', {
        //video: 'link/to/video.mp4',
        video: "<?php echo $vid; ?>",
        is_stereo: true
      });
  }
</script> 
<?php $cvar =  "//storage.googleapis.com/vrview/2.0/embed?video=".$vid."&is_stereo=true"; ?>
<!--<iframe src="//storage.googleapis.com/vrview/2.0/embed?video=link/to/video.mp4&is_stereo=true"></iframe>-->
<!--<iframe src="<?php echo $cvar; ?>"></iframe>-->

*/ ?>


<?php /*
<iframe width="420" height="315"
src="https://www.youtube.com/watch?v=H6SsB3JYqQg">
</iframe>
<iframe width="420" height="315"
src="https://www.youtube.com/embed/XGSy3_Czz8k">
</iframe>*/ ?>

<?php /*
<!-- Upload your video. Then copy & paste the embed code. Example -->
<iframe id="ado-24" src="about:blank" frameborder="0" width="1280" height="720" webkitAllowFullScreen="1" mozallowfullscreen="1" allowFullScreen="1"></iframe>
<script type="text/javascript">document.getElementById("ado-24").setAttribute("src", "//www.vroptimal-3dx-assets.com/content/24?player=true&autoplay=true&referer=" + encodeURIComponent(window.location.href));</script>
<script type="text/javascript" src="//remote.vroptimal-3dx-assets.com/scripts/vroptimal.js"></script>*/ ?>

<?php /*
<!-- Upload your video. Then copy & paste the embed code. Example -->
<iframe id="ado-24" src="about:blank" frameborder="0" width="1280" height="720" webkitAllowFullScreen="1" mozallowfullscreen="1" allowFullScreen="1"></iframe>
<script type="text/javascript">document.getElementById("ado-24").setAttribute("src", "" + encodeURIComponent(window.location.href));</script>
<script type="text/javascript" src="//remote.vroptimal-3dx-assets.com/scripts/vroptimal.js"></script>*/ ?>

<div id="vrview"></div>
<script src="//storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
<script>
    window.addEventListener('load', onVrViewLoad)
    function onVrViewLoad() {
        var vrView = new VRView.Player('#vrview', {
            //video: 'video/congo.mp4',
            video: '/home/cinfo/public_html/vidcproj/testvideo/video/congo.mp4',
            is_stereo: true 
        });
    };
</script>