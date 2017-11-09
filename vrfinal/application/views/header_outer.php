<?php 
    $method = $this->router->method;
    $get_id = $this->uri->segment(3);
    $logo = $this->commondata->general_info()["logo"];

    $query = $this->db->get_where("general", array("id" => 1));
    $general = $query->row();
    $company_name = $general->company_name;
    $mob = $general->mobile;

    $meta_title = $general->meta_title;
    $meta_description = $general->meta_description;
    $meta_keyword = $general->meta_keyword;
    $meta_image = base_url().'upload/logo/'.$general->logo;

    if(!empty($meta_title_over)){
        $meta_title = $meta_title_over;
    }
    if(!empty($meta_description_over)){
        $meta_description = $meta_description_over;
    }
    if(!empty($meta_image_over)){
        $meta_image = $meta_image_over;
    }
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $company_name; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
       
    <meta name="title" content="<?php echo @$meta_title; ?>">
    <meta name="description" content="<?php echo @$meta_description; ?>">
    <meta name="keywords" content="<?php echo @$meta_keywords; ?>">

    <meta property="og:title" content="<?php echo @$meta_title; ?>" />
    <meta property="og:description" content="<?php echo @$meta_description; ?>" />
    <meta property="og:image" content="<?php echo @$meta_image; ?>" />

    <meta property="article:author" content="<?php echo base_url(); ?>">

    <meta name="twitter:card" content="<?php echo @$meta_title; ?>">
    <meta name="twitter:description" content="<?php echo @$meta_description; ?>">
    <meta name="twitter:title" content="<?php echo @$meta_title; ?>">
    <meta name="twitter:site" content="<?php echo base_url(); ?>">
    <meta name="twitter:image" content="<?php echo @$meta_image; ?>">
    <meta name="twitter:creator" content="<?php echo base_url(); ?>">    

    <link href="<?php echo base_url(); ?>assets_design/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo base_url(); ?>assets_design/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets_frontend/fonts/font.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets_design/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets_frontend/css/reset.css" rel="stylesheet" type="text/css"/>
<!-- bootstrap icons -->
    <link href="<?php echo base_url(); ?>assets_frontend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<!-- bootstrap icons icons (https://www.w3schools.com/icons/bootstrap_icons_glyphicons.asp)-->

    <?php if($method == "prod_desc"){ ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>xZoom/dist/xzoom.css" media="all" />
    <?php } ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" />
</head>
<body>
<div class="row-fluid header">    
        <div class="top_header row-fluid">
            <div class="container">
                <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>upload/logo/<?php echo $logo; ?>"  /></a>
                <div class="top_header_right">                    
                </div>            
            </div> <!--top_header_right -->                
        </div><!--container-->
    </div>  <!--top_header-->     
        
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">MENU</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                            
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="top-navbar-1">
                    <ul class="nav navbar-nav">
                        <li <?php if($method == "index"){ ?> class="active" <?php } ?>>
                            <a href="<?php echo base_url(); ?>">Home</a></li>                            
                        <li>
                            <a href="<?php echo base_url(); ?>admin" target="_blank">Admin/CMS </a>
                        </li>
                    </ul>                                  
                </div>
            </div>
        </nav>                            
</div><!--row-fluid header-->