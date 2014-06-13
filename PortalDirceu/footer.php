<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Apex_Team
 * @since Apex Team 1.0
 */
?>




<div class="footer">
    <div class="container">
<div class="footer-top">
  <div class="footer-block-left four columns">
    <h5>Support & Legal</h5>
    <?php wp_nav_menu( array( 'theme_location' => 'footerleft', 'menu_class' => 'left-menu' ) ); ?>
  </div>
  <div class="footer-block-middle eight columns">
<ul class="partner-list">
  <li><a href="<?php echo get_theme_option('partner_first');?>" target="_blank" ><img alt="fatasy sports" src="<?php echo get_template_directory_uri(); ?>/images/footer-label.png"/></a></li>
<li>
<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="http://apexfantasyleagues.com/wp-content/uploads/2014/03/paypal.png" border="0" alt="PayPal Logo"></a></td></tr></table><!-- PayPal Logo -->
</li>
  
    <li><a href="<?php echo get_theme_option('partner_third');?>" target="_blank" ><img alt="my fatasy leauge" src="<?php echo get_template_directory_uri(); ?>/images/footer-label-two.png"/></a></li>
</ul>

  </div>
  <div class="footer-block-right four columns">
    <h5>Helpful Links</h5>
    <?php wp_nav_menu( array( 'theme_location' => 'footerright', 'menu_class' => 'right-menu' ) ); ?>




  </div>

</div>

<div class="footer-bottom">
  <ul class="social-list">
    <li><a href="<?php echo get_theme_option('twitter_link');?>" class="twiiter-icon"></a></li>
    <li><a href="<?php echo get_theme_option('facebook_link');?>" class="facebook-icon" ></a></li>
    <li><a href="<?php echo get_theme_option('google_link');?>" class="google-icon"></a></li>
    
  </ul>
  <h6>Follow Us</h6>

</div>


    </div>
  </div>

	<?php wp_footer(); ?>

  <script type="text/javascript">
/*! http://responsiveslides.com v1.54 by @viljamis */
(function(c,I,B){c.fn.responsiveSlides=function(l){var a=c.extend({auto:!0,speed:500,timeout:4E3,pager:!1,nav:!1,random:!1,pause:!1,pauseControls:!0,prevText:"Previous",nextText:"Next",maxwidth:"",navContainer:"",manualControls:"",namespace:"rslides",before:c.noop,after:c.noop},l);return this.each(function(){B++;var f=c(this),s,r,t,m,p,q,n=0,e=f.children(),C=e.size(),h=parseFloat(a.speed),D=parseFloat(a.timeout),u=parseFloat(a.maxwidth),g=a.namespace,d=g+B,E=g+"_nav "+d+"_nav",v=g+"_here",j=d+"_on",
w=d+"_s",k=c("<ul class='"+g+"_tabs "+d+"_tabs' />"),x={"float":"left",position:"relative",opacity:1,zIndex:2},y={"float":"none",position:"absolute",opacity:0,zIndex:1},F=function(){var b=(document.body||document.documentElement).style,a="transition";if("string"===typeof b[a])return!0;s=["Moz","Webkit","Khtml","O","ms"];var a=a.charAt(0).toUpperCase()+a.substr(1),c;for(c=0;c<s.length;c++)if("string"===typeof b[s[c]+a])return!0;return!1}(),z=function(b){a.before(b);F?(e.removeClass(j).css(y).eq(b).addClass(j).css(x),
n=b,setTimeout(function(){a.after(b)},h)):e.stop().fadeOut(h,function(){c(this).removeClass(j).css(y).css("opacity",1)}).eq(b).fadeIn(h,function(){c(this).addClass(j).css(x);a.after(b);n=b})};a.random&&(e.sort(function(){return Math.round(Math.random())-0.5}),f.empty().append(e));e.each(function(a){this.id=w+a});f.addClass(g+" "+d);l&&l.maxwidth&&f.css("max-width",u);e.hide().css(y).eq(0).addClass(j).css(x).show();F&&e.show().css({"-webkit-transition":"opacity "+h+"ms ease-in-out","-moz-transition":"opacity "+
h+"ms ease-in-out","-o-transition":"opacity "+h+"ms ease-in-out",transition:"opacity "+h+"ms ease-in-out"});if(1<e.size()){if(D<h+100)return;if(a.pager&&!a.manualControls){var A=[];e.each(function(a){a+=1;A+="<li><a href='#' class='"+w+a+"'>"+a+"</a></li>"});k.append(A);l.navContainer?c(a.navContainer).append(k):f.after(k)}a.manualControls&&(k=c(a.manualControls),k.addClass(g+"_tabs "+d+"_tabs"));(a.pager||a.manualControls)&&k.find("li").each(function(a){c(this).addClass(w+(a+1))});if(a.pager||a.manualControls)q=
k.find("a"),r=function(a){q.closest("li").removeClass(v).eq(a).addClass(v)};a.auto&&(t=function(){p=setInterval(function(){e.stop(!0,!0);var b=n+1<C?n+1:0;(a.pager||a.manualControls)&&r(b);z(b)},D)},t());m=function(){a.auto&&(clearInterval(p),t())};a.pause&&f.hover(function(){clearInterval(p)},function(){m()});if(a.pager||a.manualControls)q.bind("click",function(b){b.preventDefault();a.pauseControls||m();b=q.index(this);n===b||c("."+j).queue("fx").length||(r(b),z(b))}).eq(0).closest("li").addClass(v),
a.pauseControls&&q.hover(function(){clearInterval(p)},function(){m()});if(a.nav){g="<a href='#' class='"+E+" prev'>"+a.prevText+"</a><a href='#' class='"+E+" next'>"+a.nextText+"</a>";l.navContainer?c(a.navContainer).append(g):f.after(g);var d=c("."+d+"_nav"),G=d.filter(".prev");d.bind("click",function(b){b.preventDefault();b=c("."+j);if(!b.queue("fx").length){var d=e.index(b);b=d-1;d=d+1<C?n+1:0;z(c(this)[0]===G[0]?b:d);if(a.pager||a.manualControls)r(c(this)[0]===G[0]?b:d);a.pauseControls||m()}});
a.pauseControls&&d.hover(function(){clearInterval(p)},function(){m()})}}if("undefined"===typeof document.body.style.maxWidth&&l.maxwidth){var H=function(){f.css("width","100%");f.width()>u&&f.css("width",u)};H();c(I).bind("resize",function(){H()})}})}})(jQuery,this,0);
        //<![CDATA[

        jQuery(document).ready(function() {

            

            todoktimeout = jQuery( ".item-sr" ).data( "timeout" );

            todokspeed = jQuery( ".item-sr" ).data( "speed" );

            

            jQuery( function() {

                jQuery( ".item-sr" ).responsiveSlides({

                    auto: true,           // Boolean: Animate automatically, true or false

                    speed: todokspeed,        // Integer: Speed of the transition, in milliseconds

                    timeout: todoktimeout,    // Integer: Time between slide transitions, in milliseconds

                    pager: false,         // Boolean: Show pager, true or false

                    nav: false,           // Boolean: Show navigation, true or false

                    random: false,        // Boolean: Randomize the order of the slides, true or false

                    pause: true           // Boolean: Pause on hover, true or false

                });

            });



        });

        //]]>

    </script>
</body>
</html>