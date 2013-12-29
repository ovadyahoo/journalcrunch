//SLIDERPOST BUTTON

jQuery(document).ready(function() {
jQuery('#journals_slideimage').click(function() {
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#journals_slideimage_src').val(imgurl);
 jQuery('#journals_slideimage_src_img').attr('src',imgurl);
 tb_remove();
}

 tb_show('', 'media-upload.php?post_ID=1&amp;type=image&amp;TB_iframe=true');
 return false;
});
});