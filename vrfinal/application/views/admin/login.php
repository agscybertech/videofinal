    <!-- BEGIN LOGIN FORM -->
    <form class="form-vertical login-form" action="<?=base_url()?>admin/process_login" method="post">
      <h3 class="form-title">Administrator Login</h3>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>Enter your username and password.</span>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/>
            <script>document.getElementById('username').focus()</script>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-lock"></i>
            <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" />
          </div>
        </div>
      </div>
      <div class="form-actions">        
        <button type="submit" class="btn green pull-right">
        Login <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>          
    </form>

    
    <form method="post" class="form-vertical" id="otp_validation" action="<?=base_url()?>admin/get_otp" style="display:none">
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span> Please enter your mobile no you used at the time of registeration. You will get OTP to login further.</span>
      </div>      
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Enter Mobile No.</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Enter Mobile No." name="mobile" id="mobile"/>
            <script>document.getElementById('mobile').focus()</script>
            <label id="flash"></label>
            <label class="error" for="mobile"></label>
          </div>
        </div>
      </div>      
      <div class="form-actions">        
        <button type="submit" id="otp" class="btn green pull-right">
        Get OTP <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>  
    </form>

    <form method="post" class="form-vertical" id="submit_otp_validation" action="<?=base_url()?>home/fill_otp" style="display:none">
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span> Please enter your mobile no you used at the time of registeration. You will get OTP to login further.</span>
      </div>
      <p>Please note, verification codes are case sensitive.</p>
      <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Enter OTP</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-user"></i>
            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Enter OTP" name="otp_number" id="otp_number"/>
            <script>document.getElementById('otp_number').focus()</script>
            <label id="flash_otp"></label>
            <label class="error" for="otp_number"></label>
          </div>
        </div>
      </div>      
      <div class="form-actions">        
        <button type="submit" id="otp_login" class="btn green pull-right">
        Login <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>  
    </form>   
    <!-- END LOGIN FORM -->        
      
          