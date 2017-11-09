<!-- BEGIN PAGE HEADER-->   
<div class="row-fluid">
  <div class="span12">              
    <h3 class="page-title">
      <?php echo $ptitle; ?>
    </h3>
    <ul class="breadcrumb">
      <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>admin">Home</a> 
        <span class="icon-angle-right"></span>
      </li>     
      <li><a href="<?php echo base_url(); ?>admin/resetpassword"><?php echo $ptitle; ?></a></li>
    </ul>
  </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN SAMPLE FORM PORTLET-->   
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i> <?php echo $ptitle; ?></div>                
      </div>
      <div class="portlet-body form">
        <!-- BEGIN FORM-->

        <form name="frm" action="<?=base_url()?>admin/edit_resetpassword" method="post" class="form-horizontal" id="validate_resetpassword" >
           <div class="control-group">
              <label class="control-label">Old Password<span class="color-red" >*</span></label>
              <div class="controls">
                <input type="password" name="txt_oldpassword" id="txt_oldpassword"  class="span6 m-wrap" />                     
              </div>                   
            </div>
           <div class="control-group">
              <label class="control-label">New Password<span class="color-red" >*</span></label>
              <div class="controls">
                <input type="password" name="password" id="password" class="span6 m-wrap" />                     
              </div>                   
            </div>
           <div class="control-group">
              <label class="control-label">Confirm Password<span class="color-red" >*</span></label>
              <div class="controls">
                <input type="password" name="confirm_password" id="confirm_password" class="span6 m-wrap" />                     
              </div>                   
            </div>
          
          <div class="form-actions">
            <button type="submit" name="action" value="Update" class="btn blue">Update</button>
            <button type="button" onclick="javascript:window.location='<?=base_url()?>admin';" class="btn">Cancel</button>     
          </div>
        </form>
        <!-- END FORM-->  
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>            
<!-- END PAGE CONTENT-->  

