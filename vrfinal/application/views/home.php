<div class="container">
    <h2>Checkout our Latest Videos Below</h2>

    <?php if(!empty($video)){ $i = 1;
         foreach($video as $video_data){ 
            $vid = base_url()."upload/video/".$video_data->image1;     
            if(empty($video_data->thumbnail)){
                $thumbnail = base_url()."assets_design/images/vr_images/default.jpg";                 
            }
            else{
                $thumbnail = base_url()."upload/video/".$video_data->thumbnail;                 
            }
            if($i % 3 == 1){                    
                echo '<div class="row">';
            }
            $encode_title = urlencode($video_data->title);
            $url = base_url()."home/videotest/".$video_data->id."/".$encode_title;            
    ?>       
            
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <article class="block">
                    <a class="block-thumbnail" href="<?php echo $url; ?>">
                        <div class="thumbnail-overlay"></div>
                        <span class="play-button"></span>
                        <!--<img src="<?php echo $thumbnail; ?>">-->


<video width="320" height="240" controls>
    <source src="<?php echo $vid; ?>" type="video/mp4">
</video>

                        <div class="details">
                            <h2><?php echo $video_data->title; ?></h2>
                            <!--<span>1:00</span>-->
                        </div>
                    </a>
                    <div class="block-contents">
                        <p class="date">    <?php echo date("M d, Y", strtotime($video_data->created)); ?></p>
                        <p class="desc"><?php echo substr($video_data->description, 0, 100); ?>...</p>
                    </div>
                </article>
            </div>   
    <?php            
            if($i % 3 == 0){                 
                echo '</div>';
            }
    ?>        

        
    <?php $i++;} }  ?>  
</div><!--container-->