<?php 
    $method = $this->router->method;
    $get_id = $this->uri->segment(3);
?>
<ul class="page-sidebar-menu">
    <li>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>                
    <li class="start   <?php echo ($method == 'video') ? 'active' : '';  ?>">
        <a href="<?php echo base_url(); ?>admin/video">
        <i class="icon-home"></i> 
        <span class="title">Videos</span>
        <span class="selected"></span>
        </a>
    </li>
    <li class="start   <?php echo ($method == 'add_video') ? 'active' : '';  ?>">
        <a href="<?php echo base_url(); ?>admin/add_video">
        <i class="icon-bookmark-empty"></i> 
        <span class="title">Upload Videos</span>
        <span class="selected"></span>
        </a>
    </li>
    <li class="start   <?php echo ($method == 'resetpassword') ? 'active' : '';  ?>">
        <a href="<?php echo base_url(); ?>admin/resetpassword">
        <i class="icon-cogs"></i> 
        <span class="title">Reset Password</span>
        <span class="selected"></span>
        </a>
    </li>  
    <li class="start   <?php echo ($method == 'logout') ? 'active' : '';  ?>">
        <a href="<?php echo base_url(); ?>admin/logout">
        <i class="icon-table"></i> 
        <span class="title">Logout</span>
        <span class="selected"></span>
        </a>
    </li>       
</ul>
