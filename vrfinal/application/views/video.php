<?php $vid = base_url()."upload/video/".$video->image1; ?>
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