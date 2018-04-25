<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<!-- progressbar -->
  <ul id="progressbar">
    <li class="active">アカウントの種類を選択</li>
    <li>必要項目の入力</li>    
  </ul>
<div class="tml tml-register" id="theme-my-login<?php $template->the_instance(); ?>" style="padding-bottom: 3em;">
	<?php //$template->the_action_template_message( 'register' ); ?>
	<?php $template->the_errors(); ?>
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<style>
    
    #register-box fieldset {
        background: transparent;
    }
    
    
    #register-box .btn {
        margin-left: auto;
        width: 18em;
        display:block;
        margin-right: auto;
        white-space: normal;
    }
    

/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
        text-align: center;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
    margin-top: 4em;
    width: 40%;
    display: block;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    height: auto;
    display: flex;
    justify-content: center;
    counter-reset: step;
    padding: 0;
}
#progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 50%;
    float: left;
    margin-left: 1em;
    margin-right: 1em;
    text-align: center;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
        text-align: center;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 50%;
	height: 2px;
	background: white;
	position: absolute;
	left: 25%;
	top: 9px;
        z-index: -1;
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background-color: #613143;
        border-color: #2c2d33;
	color: white;
}



</style>
<!-- multistep form -->
<div id="register-box">
  
  <!-- fieldsets -->
  <fieldset id="select-account-type">
    <h2 class="fs-title">登録するアカウントの種類を選んでください</h2>
    <button id="user-select-shop" type="button" name="next" class="next action-button btn btn-lg btn-danger smoothScroll wow fadeInUp animated" value="Next" >ビジネス会員（事業者様のみ)</button>
    <button id="user-select-personnal" type="button" name="next" class="next action-button btn btn-lg btn-danger smoothScroll wow fadeInUp animated" value="Next" >個人会員</button>
  </fieldset>
  <fieldset id="shop-account-form" style="display: none; opacity: 0;">
    <h2 class="fs-title">ビジネス会員アカウント</h2>    
    <form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
        <input type="hidden" name="account-type" class="" value="professional" />
        <?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
        <p class="tml-user-login-wrap">
            <label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
            <input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
        </p>
        <?php endif; ?>

        <p class="tml-user-email-wrap">
            <label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail', 'theme-my-login' ); ?></label>
            <input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
        </p>
       
        <?php do_action( 'register_form' ); ?>

        <p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

        <p class="tml-submit-wrap">
            <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
            <input type="hidden" name="redirect_to" value="<?php echo site_url('/pending'); ?>" />
            <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
            <input type="hidden" name="action" value="register" />
        </p>
    </form>
    <?php $template->the_action_links( array( 'register' => false ) ); ?>
  </fieldset>
  <fieldset id="personnal-account-form" style="display: none; opacity: 0;">
    <h2 class="fs-title">個人会員アカウント</h2>    
    <form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
        <input type="hidden" name="account-type" class="" value="personnal" />
        <?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
        <p class="tml-user-login-wrap">
            <label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
            <input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
        </p>
        <?php endif; ?>

        <p class="tml-user-email-wrap">
            <label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail', 'theme-my-login' ); ?></label>
            <input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
        </p>
        
        <p class="tml-user-pass1-wrap">
            <label for="pass1<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label><span class="required">*</span>
            <input autocomplete="off" name="pass1" id="pass1<?php $template->the_instance(); ?>" class="input" size="20" value="" type="password" />
        </p>
        <p class="tml-user-pass2-wrap">
            <label for="pass2<?php $template->the_instance(); ?>"><?php _e( 'Confirm Password', 'theme-my-login' ); ?></label><span class="required">*</span> 
            <input autocomplete="off" name="pass2" id="pass2<?php $template->the_instance(); ?>" class="input" size="20" value="" type="password" />
        </p>

        <p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

        <p class="tml-submit-wrap">
            <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
            <input type="hidden" name="redirect_to" value="<?php echo site_url('/validate'); ?>" />
            <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
            <input type="hidden" name="action" value="register" />
        </p>
    </form>
  </fieldset>
</div>
	
</div>


<script>
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    var movenext = function(current_fs, next_fs) {
        //activate next step on progressbar using the index of next_fs
        $($("#progressbar li")[1]).addClass("active");

        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50)+"%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                /*current_fs.css({
                    'transform': 'scale('+scale+')',
                    'position': 'absolute'
                });*/
                next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 800, 
            complete: function(){
                current_fs.hide();
                animating = false;
            }, 
            //this comes from the custom easing plugin
            //seasing: 'easeInOutBack'
        });
    };
    $("#user-select-shop").click(function(){
        if(animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $('#shop-account-form');

            movenext(current_fs,next_fs);
            window.location += "#shop-account";
    });
    
    $("#user-select-personnal").click(function(){
        if(animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $('#personnal-account-form');

            movenext(current_fs,next_fs);
            window.location += "#personnal-account";
    });
    $( document ).ready(function() {
        if(window.location.href.indexOf("#shop-account") > -1) {
            if(animating) return false;
                animating = true;
            current_fs =  $('#select-account-type');
            next_fs = $('#shop-account-form');

            movenext(current_fs,next_fs);
        }else if (window.location.href.indexOf("#personnal-account") > -1) {
            if(animating) return false;
                animating = true;
             current_fs = $('#select-account-type');
            next_fs = $('#personnal-account-form');

            movenext(current_fs,next_fs);
        }
   
    }); 
</script>
