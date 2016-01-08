
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