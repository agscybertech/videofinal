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
      <li><a href="<?php echo base_url(); ?>admin/video"><?php echo $ptitle; ?></a></li>
    </ul>
  </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box blue row-fluid">
      <div class="portlet-title span12">
        <div class="caption span4"><i class="icon-cogs"></i><?php echo $ptitle; ?></div> 
      </div>
      <div class="portlet-body flip-scroll">
        <form name="frm" method="post" id="delete_record" action="<?=base_url()?>admin/delete_video"  >
          <input type="hidden" name="txt_all_selected_value" id="txt_all_selected_value" />
        <table class="table-bordered table-striped table-condensed flip-content" id="video_list">
          <thead class="flip-content">
            <tr>
              <th>&nbsp;</th> 
              <th>Sr.No</th>  
              <th>Title</th>
              <th>Video Type</th>
              <th>Size</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; $ic=1; foreach ($result as $row => $val){  ?>
            <tr class="odd gradeX">
              <td>
                <input type="checkbox" name="chk[]" id="select_all_<?php echo $val->id; ?>" class="select_all_<?php echo $i; ?>" onclick="get_selected_row('<?php echo $val->id; ?>')" value="<?=$val->id?>"/>
              </td>
              <td><?php echo $ic; ?></td> 
              <td><?php echo $val->title; ?></td>
              <td><?php echo $val->thumbnail; ?></td>
              <td><?php $path =  $this->config->item('basepath');
                  if(!empty($val->image1)){
                      $size = filesize($path.'upload/video/'.$val->image1);    
                      $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                      $power = $size > 0 ? floor(log($size, 1024)) : 0;
                      echo number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                  }
                ?>
              </td>
              <td>
                <a href="<?php echo base_url(); ?>admin/edit_video/<?php echo $val->id; ?>"><i class="icon-edit"></i></a>
              </td>
            </tr>
            <?php ++$i; $ic++; } ?>                
          </tbody>
        </table>  
        <div class="row-fluid">
          <div class="span12">
            <button class="btn blue" name="action" value="Delete" type="submit">Delete</button>
            <button class="btn blue pull-right" type="button" onclick="window.location.href='<?=base_url()?>admin/add_video'">Add</button>
          </div>
        </div>  
      </form>
      </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
  </div>
</div>
<!-- END PAGE CONTENT-->  