//$('html, body').animate({ scrollTop: $('#validate_submit_bid').offset().top }, 'slow');  

// Javascript Document
var baseurl ='http://localhost/vrvideo/';
//var baseurl ='http://bidmychoice.com/biddingdesign/';

$().ready(function() {	
    jQuery.validator.addMethod("lessThan",function (value, element, param){
        var $min = $(param);
        if (this.settings.onfocusout){
            $min.off(".validate-lessThan").on("blur.validate-lessThan", function(){
                $(element).valid();
            });
        }
        return $min.val() > value;
    }, "Min must be less than max"); 

       

    jQuery.validator.addMethod("rangeBet", function(value, element, params) {
        return (parseInt(value) >= parseInt($(params[0]).val()) && parseInt(value) <= parseInt($(params[1]).val()));
    }, jQuery.validator.format("Please enter between {0} and {1} words."));

    jQuery.validator.addMethod("two_decimal_number", function(value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
    }, "You must include two decimal places");	

    
    $("#delete_record").submit(function(event){
        var confirm_val =  confirm("Are you sure you want to delete this?");
        if(confirm_val == false){
           event.preventDefault();  
        }  
    });  

    $("#delete_single").click(function(event){
        var confirm_val =  confirm("Are you sure you want to delete this?");
        if(confirm_val == false){
           event.preventDefault();
        }         
    }); 

    $('#validate_forgot').validate({        
        rules: {
            forgot_email: {
                required: true,
                email: true
            },            
        },
        messages: {
        },
        submitHandler: function (form) {
            form.submit();
        }
    });   

    $('#validate_video').validate({                
        rules: {
            title: {
                required: true,
                minlength: 3
            },      
            image1: {
                required: true,
                extension: "mp4|rv|mpeg|mpg|mpe|qt|mov|avi|movie|MP4|RV|MPEG|MPG|MPE|QT|MOV|AVI|MOVIE"   
            },            
                       
        },
        messages: {
            
        },
        submitHandler: function (form, event) {                       
            form.submit(); 
        }
    });      

    $('#validate_video_edit').validate({                
        rules: {
            title: {
                required: true,
                minlength: 3
            },                        
            image1: {            
                extension: "mp4|rv|mpeg|mpg|mpe|qt|mov|avi|movie|MP4|RV|MPEG|MPG|MPE|QT|MOV|AVI|MOVIE"   
            },
        },
        messages: {
            
        },
        submitHandler: function (form) {            
            form.submit();
        }
    });  
   

    $('#validate_forgot_password').validate({                
        rules: {           
            for_password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#for_password"
            },
        },
        messages: {
            confirm_password: {
                equalTo: "Please enter the same password as above"
            },  
        },
        submitHandler: function (form) {
            form.submit();
        }
    });    

    $('#login_validation').validate({             
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
        },
        submitHandler: function (form) {
            //alert("hello");
            form.submit();
        }
    }); 

    $('#validate_resetpassword').validate({                
        rules: {
            txt_oldpassword: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
        },
        messages: {
            confirm_password: {
                equalTo: "Please enter the same password as above"
            },  
        },
        submitHandler: function (form) {
            form.submit();
        }
    });      
    
});	

  function get_selected_row(selected_row_val){     
    var txt_all_selected_value = $('#txt_all_selected_value').val();
    if(txt_all_selected_value == ''){     
      $('#txt_all_selected_value').val(selected_row_val);      
    }
    else{     
      var select_all = $('#select_all_'+selected_row_val).prop('checked');
      if(select_all == true){                 
        var old_val = txt_all_selected_value  + "," + selected_row_val;
        $('#txt_all_selected_value').val(old_val); 
      } 
      else{         
        var txt_all_selected_value_split = txt_all_selected_value.split(",");
        var txt_all_selected_value_len = txt_all_selected_value_split.length;
        var new_val = '';
        for(i=0; i<txt_all_selected_value_len; i++){
          if(txt_all_selected_value_split[i] == selected_row_val){             
          }
          else{ 
            if(new_val == ''){
              new_val = txt_all_selected_value_split[i];  
            }
            else{
              var new_val = new_val  + "," + txt_all_selected_value_split[i];
            }            
          }
        }
        $('#txt_all_selected_value').val(new_val);  
      }
    }
  }  
