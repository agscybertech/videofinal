<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $video->title; ?> </title>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
        <link href="<?php echo base_url(); ?>vidfiles/style2.css" rel="stylesheet" type="text/css">
  </head>
  <body>    
    <?php $vid = base_url()."upload/video/".$video->image1; ?>
        <div id="vrview"></div>
        <div id="controls">
          <div id="toggleplay" class="paused"></div>
          <div id="time">00:00 | 00:00</div>
          <input id="volumerange" type="range" min="0" max="100" value="100"/>
          <div id="togglemute"></div>
          <div id="togglefullscreen"></div>
        </div>   
        <script src="<?php echo base_url(); ?>vidfiles/build/vrview.js"></script>
        <script>
            var vrView;
            var playButton;
            var muteButton;

            function onLoad() {
              // Load VR View.
              vrView = new VRView.Player('#vrview', {
                //width: '100%',
                //height: 480,
                //width: '100%',
                //height: '440',
                //video: 'http://vidcproj.cinfo.xyz/vidfiles/video/two.mp4',
                video: "<?php echo $vid; ?>",    
                //video: "//vidcproj.cinfo.xyz/vidfiles/video/congo_2048.mp4",    

                //is_stereo: true,
                //loop: false,
                //hide_fullscreen_button: true,
                //volume: 0.4,
                //muted: true,
                //is_debug: true,
                //default_heading: 90,
                //is_yaw_only: true,
                //is_vr_off: true,
              });

              playButton = document.querySelector('#toggleplay');
              muteButton = document.querySelector('#togglemute');
              volumeRange = document.querySelector('#volumerange');
              timeContainer = document.querySelector('#time');

              playButton.addEventListener('click', onTogglePlay);
              muteButton.addEventListener('click', onToggleMute);
              volumeRange.addEventListener('change', onVolumeChange);
              volumeRange.addEventListener('input', onVolumeChange);

              // If you set mute: true, uncomment the line bellow.
              // muteButton.classList.add('muted');

              vrView.on('ready', onVRViewReady);

              vrView.on('play', function() {
                console.log('media play');
                console.log(vrView.getDuration());
              });
              vrView.on('pause', function() {
                console.log('media paused');
              });
              vrView.on('timeupdate', function(e) {
                var current = formatTime(e.currentTime);
                var duration = formatTime(e.duration);
                timeContainer.innerText = current + ' | ' + duration;
                console.log('currently playing ' + current + ' secs.');
              });
              vrView.on('ended', function() {
                console.log('media ended');
                playButton.classList.add('paused');
              });
            }

            function onVRViewReady() {
              console.log('vrView.isPaused', vrView.isPaused);
              // Set the initial state of the buttons.
              if (vrView.isPaused) {
                playButton.classList.add('paused');
              } else {
                playButton.classList.remove('paused');
              }
            }

            function onTogglePlay() {
              if (vrView.isPaused) {
                vrView.play();
                playButton.classList.remove('paused');
              } else {
                vrView.pause();
                playButton.classList.add('paused');
              }
            }

            function onToggleMute() {
              var isMuted = muteButton.classList.contains('muted');
              vrView.mute(!isMuted);
              muteButton.classList.toggle('muted');
            }

            function onVolumeChange(e) {
              vrView.setVolume(volumeRange.value / 100);
            }

            function formatTime(time) {
              time = !time || typeof time !== 'number' || time < 0 ? 0 : time;

              var minutes = Math.floor(time / 60) % 60;
              var seconds = Math.floor(time % 60);

              minutes = minutes <= 0 ? 0 : minutes;
              seconds = seconds <= 0 ? 0 : seconds;

              var result = (minutes < 10 ? '0' + minutes : minutes) + ':';
              result += seconds < 10 ? '0' + seconds : seconds;
              return result;
            }
            window.addEventListener('load', onLoad);
        </script>          
  </body>
</html>
