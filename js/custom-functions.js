// START smooth scroll to div
jQuery(document).ready(function($) {
  $(function() {
   $('a[href*=#]:not([href=#])').click(function() {
     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

       var target = $(this.hash);
       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
       if (target.length) {
         $('html,body').animate({scrollTop: target.offset().top-112},1000);
         return false;
       }
     }
   });
  });
});
// END smooth scroll to div

// START active link
jQuery('#header-top #header-menu ul li a').click(function(){
  jQuery('#header-top #header-menu ul li a.active').removeClass('active');
  jQuery(this).addClass('active');
});

jQuery('#navbar-collapsed ul li a').click(function(){
  jQuery('#navbar-collapsed ul li a.active').removeClass('active');
  jQuery(this).addClass('active');
});
// END active link


// START bxslider
jQuery(document).ready(function($) {
  $('.bxslider').bxSlider({
    auto: true,
    autoControls: true,
    pager: false,
    startText: '<span class="glyphicon glyphicon-play"></span> PLAY',
    stopText: '<span class="glyphicon glyphicon-stop"></span> STOP',
    autoHover: true,
  });
});
// END bxslider


// START toggle navbar links on smaller devices
jQuery(document).ready(function($) {
  $('.navbar-bars').click(function(e){
    $('#navbar-collapsed').slideToggle();
    e.preventDefault();
  });
});
// END toggle navbar links on smaller devices


// START hide navbar when clicked outside of it
jQuery(document).ready(function($) {
  $(window).resize(function(){
    $('#navbar-collapsed').hide();
  });
});
// END hide navbar when clicked outside of it


// START Animate the slider content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("header-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('.bx-wrapper').addClass('animated flipInX');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the slider content


// START Animate the about-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("about-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#about-wrapper .about-image').addClass('animated bounceInLeft');
      $('#about-wrapper .about-text').addClass('animated bounceInRight');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the about-wrapper content

// START Animate the services-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("services-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#services-content').addClass('animated fadeIn');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the services-wrapper content


// START Animate the team-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("team-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('.team-member-img img').addClass('animated zoomInDown');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the team-wrapper content


// START Animate the portfolio-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("portfolio-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#portfolio-wrapper .portfolio-blocks img').addClass('animated flipInX');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the portfolio-wrapper content


// START Animate the news-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("news-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#news-wrapper .container#news-content .one-news-block .news-img img').addClass('animated rollIn');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the news-wrapper content


// START Animate the contact-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("contact-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('.contact-form').addClass('animated rubberBand');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the contact-wrapper content


// START Animate the footer-wrapper content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("footer-wrapper");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#footer-wrapper .container#footer-content #footer-widgets .widget:first-child').addClass('animated zoomInLeft');
      $('#footer-wrapper .container#footer-content #footer-widgets .widget:last-child').addClass('animated zoomInRight');
  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the footer-wrapper content

// START Animate the footer-links content
jQuery(document).ready(function($) {
  var myElement = document.getElementById("footer-links");
  var elementWatcher = scrollMonitor.create( myElement );
  elementWatcher.enterViewport(function() {
      $('#footer-links .container').addClass('animated zoomIn');

  });
  elementWatcher.exitViewport(function() {
  });
});
// END Animate the footer-links content

// Start Show Image After Upload

jQuery(document).ready(function() {
 
    var formfield;
 
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery('.image').click(function() { 
        formfield = jQuery(this).prev('input'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
 
    });
    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };

    // Show header logo
    link_logo = jQuery('#logo-input').val();
    jQuery('#logo-input').hover(function(){
        link_logo2 = jQuery('#logo-input').val();
        if (link_logo != link_logo2) {
            link_logo = link_logo2;
            jQuery('#display-logo').html('<img src="' + link_logo2 + '" width="150" height="150" />');
        }
    });
    // show footer logo
    link_footer = jQuery('#footer-input').val();
    jQuery('#footer-input').hover(function(){
        link_footer2 = jQuery('#footer-input').val();
        if (link_footer != link_footer2) {
            link_footer = link_footer2;
            jQuery('#display-footer').html('<img src="' + link_footer2 + '" width="150" height="150" />');
        }
    });
 
});
// End Show Image After Up