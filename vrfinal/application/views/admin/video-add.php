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
      <li><a href="<?php echo base_url(); ?>admin/add_video"><?php echo $ptitle; ?></a></li>
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
        <form name="frm" action="<?=base_url()?>admin/process_videoadd" method="post" id="validate_video" class="form-horizontal" enctype="multipart/form-data">   
            <div class="control-group">
              <label class="control-label">Title<span class="color-red" >*</span></label>
              <div class="controls">              
                <input type="text" name="title" id="title" class="span6 m-wrap" autocomplete="off" />                  
                <script>document.getElementById('title').focus()</script>
              </div>                   
            </div>       
            <div class="control-group">
              <label class="control-label">Video Type<span class="color-red" >*</span></label>
              <div class="controls">         
                  <select name="thumbnail" id="thumbnail" class="span6 m-wrap">
                      <option value="360 Degree">360 Degree</option>
                      <option value="Normal">Normal</option>
                  </select>     
              </div>                   
            </div>
            <div class="control-group">
              <label class="control-label">Video<span class="color-red" >*</span></label>
              <div class="controls">              
                <input type="file" name="image1" id="image1" class="span6 m-wrap" />  
                <span class="help-block color-red">Video can be of mp4.  &nbsp; Max file size: 128MB </span>                    
                <!--|rv|mpeg|mpg|mpe|qt|mov|avi|movie-->
              </div>                   
            </div>              
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">              
                <textarea class="span6 m-wrap" id="description" name="description" rows="15"></textarea>
              </div>                   
            </div>    
          <div class="form-actions">
            <button type="submit" name="action" value="Add" class="btn blue">Add</button>
            <button type="button" onclick="javascript:window.location='<?=base_url()?>admin/video';" class="btn">Cancel</button>
          </div>
        </form>
        <!-- END FORM-->  
      </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
  </div>
</div>            
<!-- END PAGE CONTENT-->  
