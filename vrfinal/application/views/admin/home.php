<div class="row-fluid middle_content">
  <div class="container">                       
    <div class="all_products products_li span12">        
        <?php if(!empty($auction)){ ?>
                <h1>Easy Buy Products</h1>
                <table>
                <tr>
                    <?php $i = 1; 
                        $auction_count = count($auction);
                        $today_date = date("Y-m-d");
                        foreach($auction as $auction_data){
                            if($auction_data->extend_date != "0000-00-00"){ 
                                $dts = $auction_data->extend_date;
                            }
                            else{
                                $dts = $auction_data->end_date;                                   
                            }

                            if($dts < $today_date){
                            }
                            else{
                                $qu = "select id, image1, name, deal_price, mrp, category_id, slug from product where id = '".$auction_data->product_id."'";
                                $query = $this->db->query($qu);
                                $product_data = $query->row();  

                                $qu = "select name from category where id = '".$product_data->category_id."'";
                                $query = $this->db->query($qu);
                                $category = $query->row();   
                     ?>                        
                        <td class="col-lg-3 col-md-3 col-xs-3">
                            <div class="img_box">
                                <?php
                                if(!empty($product_data->deal_price)){                    
                                    $discount = (($product_data->mrp - $product_data->deal_price) / $product_data->mrp) * 100;
                                    if(!empty($discount)){                                             
                                        echo '<div class="sale_tag">'.ceil($discount).'% Discount</div>';
                                    }
                                }                     
                                ?>                                    
                                <div class="pr_img">
                                    <a href="<?php echo base_url(); ?>home/prod_desc/a/<?php echo $auction_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                        <img src="<?php echo base_url(); ?>upload/product/small_<?php echo $product_data->image1; ?>" alt="" />
                                    </a>                                
                                </div>
                            </div>
                            <div class="pro_text_box">
                                <h4>
                                <a href="<?php echo base_url(); ?>home/prod_desc/a/<?php echo $auction_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                    <?php //echo $category->name; ?>  <?php echo $product_data->name; ?>
                                </a>                                
                                </h4>
                                <span class="auc">Easy Buy ID:&nbsp; <?php echo $auction_data->auction_display_id; ?></span>
                                <?php if(!empty($product_data->deal_price)){ echo "<strike>"; } ?>
                                    <div class="mrp"><span>MRP:&nbsp; </span><?php echo number_format_with_rs($product_data->mrp); ?></div>
                                <?php if(!empty($product_data->deal_price)){ echo "</strike>"; } ?>

                                <?php if(!empty($product_data->deal_price)){ ?>
                                    <div class="mrp"><span>Deal Price:&nbsp; </span> 
                                        <?php echo number_format_with_rs($product_data->deal_price); ?>
                                    </div>
                                <?php } ?>    

                                <div class="bid_range"><b>Easy Buy Range:&nbsp; </b>
                                <?php echo number_format_with_rs($auction_data->start_rs)." - ".number_format_without_rs($auction_data->end_rs); ?></div>

                                <?php $diff = $this->commondata->get_diff_normal($auction_data->end_date); ?>                            
                                <p > Easy Buy will End On:&nbsp;  
                                    <span class="blink" style="color:red;"><b>
                                        <?php echo @$diff; ?> (<?php echo @$dts; ?>) </b>
                                    </span>
                                </p>
                                                             
                                <?php if($auction_data->extend_date != "0000-00-00"){     
                                            $diff_extend = $this->commondata->get_diff_auction($auction_data->end_date, $auction_data->extend_date);
                                ?>                                                             
                                    <p class="color-red bold"> Easy Buy is Extend for:&nbsp; <?php echo @$diff_extend; ?> more day ( <?php echo @$auction_data->extend_date; ?>)</p>
                                <?php } 

                                    $winner_name = $this->commondata->winner_name($auction_data->id);
                                    if(!empty($winner_name)){ 
                                        echo "<p> Current Winner name:&nbsp; ".$winner_name."</p>";
                                    }
                            
                                    $pro_name = $this->commondata->get_promocode_discount($product_data->id);
                                    $promocode_disc = $pro_name["promocode_disc"];  
                                    $promocode_diff = $pro_name["promocode_diff"];                                     
                                    if(!empty($promocode_disc)){                                                  
                                    ?>
                                        <div class="offer">
                                            <div class="blink">
                                            <span> Extra <?php echo $promocode_disc; ?>% off on this product. </span>
                                            <span> Expires in <?php echo $promocode_diff; ?>. </span>
                                            </div>
                                            <a href="javascript:void(0);" product_id="<?php echo $product_data->id; ?>" class="revel_code btn_promocode">REVEAL NOW</a>
                                        </div>
                                    <?php } ?>  
                                    <?php  
                                        //$description = strip_tags($product_data->description);
                                        //$description = stripslashes($product_data->small_description);
                                        //echo '<div class="mrp"><span>Description:&nbsp;</span></div><p>'.$description.'</p>';
                                    ?>   

                                <div class="btns">
                                    <button class="bid_now orange_hover btn_now" btn_val="bid" product_id="<?php echo $product_data->id; ?>" auction_id="<?php echo $auction_data->id; ?>" type="button">EASY BUY</button>
                                    <button class="buy_now orange_hover btn_now" btn_val="buy" auction_id="<?php echo $auction_data->id; ?>" product_id="<?php echo $product_data->id; ?>" type="button">ADD TO CART</button>
                                </div>
                            </div>
                        </td>  
                        <?php if(($i % 4) == 0){
                            if($auction_count == $i){
                            }
                            else{
                                echo '</tr>';
                                echo '<tr>';                        
                            }
                        }  ?>  
                    <?php $i++;} }?>
                </tr>  
                </table>     
        <?php } ?>              
    </div>  <!--all_products products_li-->

<div class="all_products products_li span12">
        <?php if(!empty($product)){ ?>               
                <h1>Products</h1>  
                 <table>
                                <tr>                
                    <?php $i = 1; $product_count = count($product); foreach($product as $product_data){
                        if($i<9){
                        $qu = "select name from category where id = '".$product_data->category_id."'";
                        $query = $this->db->query($qu);
                        $category = $query->row();   
                         ?>     
                            <td class="col-lg-3 col-md-3 col-xs-3">
                                <div class="img_box">
                                    <?php
                                    if(!empty($product_data->deal_price)){                    
                                        $discount = (($product_data->mrp - $product_data->deal_price) / $product_data->mrp) * 100;
                                        if(!empty($discount)){ 
                                            echo '<div class="sale_tag">'.ceil($discount).'% Discount</div>';
                                        }
                                    }                     
                                    ?>    
                                    <div class="pr_img">
                                        <a href="<?php echo base_url(); ?>home/prod_desc/p/<?php echo $product_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                            <img src="<?php echo base_url(); ?>upload/product/small_<?php echo $product_data->image1; ?>" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="pro_text_box">
                                    <h4>
                                    <a href="<?php echo base_url(); ?>home/prod_desc/p/<?php echo $product_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                        <?php //echo $category->name; ?>  <?php echo $product_data->name; ?>
                                    </a></h4>                                    
                                    <?php if(!empty($product_data->deal_price)){ echo "<strike>"; } ?>
                                        <div class="mrp"><span>MRP:&nbsp; </span> <?php echo number_format_with_rs($product_data->mrp); ?></div>
                                    <?php if(!empty($product_data->deal_price)){ echo "</strike>"; } ?>

                                    <?php if(!empty($product_data->deal_price)){ ?>
                                        <div class="mrp"><span>Deal Price:&nbsp; </span><span class="color"><?php echo number_format_with_rs($product_data->deal_price); ?></span></div>
                                    <?php } ?>    

                                    <?php
                                        $pro_name = $this->commondata->get_promocode_discount($product_data->id);
                                        $promocode_disc = $pro_name["promocode_disc"];  
                                        $promocode_diff = $pro_name["promocode_diff"];                                         
                                        if(!empty($promocode_disc)){                                                  
                                        ?>
                                            <div class="offer">
                                                <div class="blink">
                                                <span> Extra <?php echo $promocode_disc; ?>% off on this product. </span>
                                                <span> Expires in <?php echo $promocode_diff; ?>. </span>
                                                </div>
                                                <a href="javascript:void(0);" product_id="<?php echo $product_data->id; ?>" class="revel_code btn_promocode">REVEAL NOW</a>
                                            </div>
                                        <?php } ?>                                
                                    <div class="btns">
                                        <button class="buy_now orange_hover btn_now" btn_val="buy" auction_id="" product_id="<?php echo $product_data->id; ?>" type="button">ADD TO CART </button>
                                    </div>
                                </div>                                
                            </td>       
                            <?php if(($i % 4) == 0){
                            if($product_count == $i){
                            }
                            else{
                                echo '</tr>';
                                echo '<tr>';                        
                            }
                        }  ?>                                    
                     <?php $i++; }} ?>
                     </tr>  
                </table>  
        <?php } ?>
</div>


    <div class="all_products span12">
        <?php if(!empty($product)){ ?>
            <div id="myCarouse3" class="carousel slide" data-interval="999999999" data-ride="carousel">        
               
                <!-- Carousel indicators -->
                 
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php $i = 1; $product_count = count($product); foreach($product as $product_data){
                        $qu = "select name from category where id = '".$product_data->category_id."'";
                        $query = $this->db->query($qu);
                        $category = $query->row();   
                        if($i == 1){
                    ?>
                        <div class="<?php echo ($i == 1) ? "active" : ""; ?> item">
                            <table>
                                <tr>                        
                    <?php } ?>     
                            <td>
                                <div class="img_box">
                                    <?php
                                    if(!empty($product_data->deal_price)){                    
                                        $discount = (($product_data->mrp - $product_data->deal_price) / $product_data->mrp) * 100;
                                        if(!empty($discount)){ 
                                            echo '<div class="sale_tag">'.ceil($discount).'% Discount</div>';
                                        }
                                    }                     
                                    ?>    
                                    <div class="pr_img">
                                        <a href="<?php echo base_url(); ?>home/prod_desc/p/<?php echo $product_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                            <img src="<?php echo base_url(); ?>upload/product/small_<?php echo $product_data->image1; ?>" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="pro_text_box">
                                    <h4>
                                    <a href="<?php echo base_url(); ?>home/prod_desc/p/<?php echo $product_data->id; ?>/<?php echo $product_data->slug; ?>" title="Click to View Product">
                                        <?php //echo $category->name; ?>  <?php echo $product_data->name; ?>
                                    </a></h4>                                    
                                    <?php if(!empty($product_data->deal_price)){ echo "<strike>"; } ?>
                                        <div class="mrp"><span>MRP:&nbsp; </span> <?php echo number_format_with_rs($product_data->mrp); ?></div>
                                    <?php if(!empty($product_data->deal_price)){ echo "</strike>"; } ?>

                                    <?php if(!empty($product_data->deal_price)){ ?>
                                        <div class="mrp"><span>Deal Price:&nbsp; </span><span class="color"><?php echo number_format_with_rs($product_data->deal_price); ?></span></div>
                                    <?php } ?>    

                                    <?php
                                        $pro_name = $this->commondata->get_promocode_discount($product_data->id);
                                        $promocode_disc = $pro_name["promocode_disc"];  
                                        $promocode_diff = $pro_name["promocode_diff"];                                         
                                        if(!empty($promocode_disc)){                                                  
                                        ?>
                                            <div class="offer">
                                                <div class="blink">
                                                <span> Extra <?php echo $promocode_disc; ?>% off on this product. </span>
                                                <span> Expires in <?php echo $promocode_diff; ?>. </span>
                                                </div>
                                                <a href="javascript:void(0);" product_id="<?php echo $product_data->id; ?>" class="revel_code btn_promocode">REVEAL NOW</a>
                                            </div>
                                        <?php } ?>                                
                                    <div class="btns">
                                        <button class="buy_now orange_hover btn_now" btn_val="buy" auction_id="" product_id="<?php echo $product_data->id; ?>" type="button">ADD TO CART </button>
                                    </div>
                                </div>
                            </td>       
                            <?php                                                           
                                if(($i % 4) == 0){  
                                    echo '</tr></table></div><div class="item"><table><tr>';       
                                } 
                                if($product_count == $i){
                                   echo '</tr></table></div>';
                                }                             
                            ?>                                   
                     <?php $i++; } ?>     
                </div>
                <!-- Carousel controls-->
                <a class="carousel-control left" href="#myCarouse3" data-slide="prev">
                    <span class="left"></span>
                </a>
                <a class="carousel-control right" href="#myCarouse3" data-slide="next">
                    <span class="right"></span>
                </a> 
            </div>
        <?php } ?>
    </div>            

    <div class="testimonial">
        <?php if(!empty($testimonial)){ ?>
            <div id="myCarouse2" class="carousel slide" data-interval="3000" data-ride="carousel">        
                <h1>Testimonial</h1>
                <!-- Carousel indicators -->
               
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php $i = 1; foreach($testimonial as $testimonial_data){
                        $qu = "select first_name, last_name, profile_pic from user where id = '".$testimonial_data->user_id."'";
                        $query = $this->db->query($qu);
                        $user = $query->row();  
                        $img = ($user->profile_pic == "") ? base_url()."images/default_user.png" : base_url()."upload/profile/small_".$user->profile_pic;
                    ?>
                        <div class="<?php echo ($i == 1) ? "active" : ""; ?> item">
                            <div class="left_testi">
                                <img src="<?php echo $img; ?>" alt="" />
                            </div>
                            <div class="carousel-caption right_testi">
                                <h4><?php echo $user->first_name." ".$user->last_name; ?> </h4>
                                <p><?php echo substr(strip_tags($testimonial_data->message), 0, 370); ?>... </p>
                                <a href="<?php echo base_url(); ?>home/testimonial" class="testi_read_more">Read more</a>
                            </div>
                        </div>   
                     <?php $i++; } ?>     
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left" href="#myCarouse2" data-slide="prev">
                    <span class="left"></span>
                </a>
                <a class="carousel-control right" href="#myCarouse2" data-slide="next">
                    <span class="right"></span>
                </a>
            </div>
        <?php } ?>
    </div>            
  </div><!--container-->    
</div><!--middle_content-->


<!-- model fill promocode start -->
<a style="display:none;" class=" btn yellow" data-toggle="modal" id="model_promo_form" href="#model_promo">FILL PROMOCODE MODEL</a>
<div id="model_promo" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>HAVE A PROMO CODE?</h3>
    </div>
    <form name="frm" class="form-horizontal" action="<?=base_url()?>home/process_submit_promocode" method="post" id="validate_submit_promocode" > 
        <input type="hidden" id="product_id" name="product_id" />
        <input type="hidden" id="promocode_code" name="promocode_code" />
        <input type="hidden" id="promocode_ids" name="promocode_ids" />
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span12" id="promo_response">                         
                </div>
            </div> 
            <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                <div class="control">
                    <label class="control-label"></label>
                    <div class="controls">
                        <label class="radio line">
                            <div class="radio">
                                <span class="checked"><input name="promo_options" value="1" checked="" type="radio">No</span>
                            </div>
                        </label>
                        <label class="radio line">
                            <div class="radio">
                                <span ><input name="promo_options" value="2" type="radio">Yes</span>
                            </div>
                        </label>                  
                    </div>
                </div>
                <div class="control-group" id="div_promocode_fill" style="display:none">
                    <label class="control-label">Enter Promo code<span class="color-red">*</span></label>
                    <div class="controls">
                        <input class="m-wrap small" type="text" id="txt_promocode" name="txt_promocode" autocomplete="off" />
                    </div>
                </div>
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="submit" class="btn blue">Continue</button>
            <div id="flash_prmo"></div>
        </div>
    </form>
</div>
<!-- model fill promocode end -->

<!-- model reveal code start -->
<a style="display:none;" class=" btn yellow" data-toggle="modal" id="model_reveal_code_form" href="#model_reveal_code">View Promocode</a> 
<div id="model_reveal_code" class="modal hide fade" tabindex="-1" data-backdrop="model_reveal_code" data-keyboard="false">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>Reveal Code</h3>
    </div>
    <div class="modal-body" >
        <h4>Copy the code below and paste during ADD TO CART process</h4>
        <b id="promocode_val"></b>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn">Close</button>
    </div>
</div>
<!-- model reveal code end -->

<!-- model EASY BUY start -->
<a style="display:none;" class=" btn yellow" data-toggle="modal" id="model_bid_form" href="#model_bid">EASY BUY MODEL</a>
<div id="model_bid" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>EASY BUY</h3>
    </div>
    <form name="frm" class="form-horizontal" action="<?=base_url()?>home/process_submit_bid" method="post" id="validate_submit_bid" > 
        <input type="hidden" id="auction_id" name="auction_id" />
        <input type="hidden" id="sid" name="sid" />
        <input type="hidden" id="eid" name="eid" />           
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span12" id="bid_response">                         
                </div>
            </div> 
            <div class="scroller" style="height:100px" data-always-visible="1" data-rail-visible1="1">
                <div class="control-group">
                    <label class="control-label">Place Easy Buy Amount<span class="color-red">*</span></label>
                    <div class="controls">
                        <input class="m-wrap small" type="text" id="bid_amount" name="bid_amount" autocomplete="off" />
                    </div>
                </div>
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="submit" class="btn blue">Place Easy Buy</button>
            <div id="flash_bid"></div>
        </div>
    </form>
</div>
<!-- model EASY BUY end -->
