/* Toggle */
jQuery(document).ready(function($){
	$('#toggle-view li').click(function () {
		var text = $(this).children('p');
        
		if (text.is(':hidden')) {
			text.slideDown('200');
			$(this).find('.toggle-indicator').text('-');
		} else {
			text.slideUp('200');
			$(this).find('.toggle-indicator').text('+');
		}
	});


//DROPDOWN MENU INIT
ddsmoothmenu.init({
mainmenuid: "topMenu", //menu DIV id
orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
classname: 'ddsmoothmenu', //class added to menu's outer DIV
//customtheme: ["#1c5a80", "#18374a"],
contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})



/* Twitter ToolTip */
function twitter_tooltip(target_items, name){
 $(target_items).each(function(){
		//$("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
		var my_tooltip = $("."+name);
		$(this).removeAttr("title").mouseover(function(){
				my_tooltip.css({opacity:0.9, display:"none"}).fadeIn(400);
		}).mousemove(function(kmouse){
				my_tooltip.css({left:kmouse.pageX-290, top:kmouse.pageY-45});
		}).mouseout(function(){
				my_tooltip.fadeOut(400);
		});
	});
}

jQuery(document).ready(function($){
							
twitter_tooltip("a.tip","tooltip");


function filterCallback( twitter_json ) {
         var result = [];
         for(var index in twitter_json) {
            if(twitter_json[index].in_reply_to_user_id == null) {
                result[result.length] = twitter_json[index];
            }
            if( result.length==5 ) break; // Edit this to change the maximum tweets shown
         }
         twitterCallback2(result); // Pass tweets onto the original callback. Don't change it!
}
}); 
						 
// PRETTY PHOTO INIT
$("a[rel^='prettyPhoto']").prettyPhoto();						 
}); 							
	 
// POST BOXES HOVER BEHAVIOUR
$j = jQuery.noConflict();
$j('#content .postBoxInner').hover(function(){
	$j(this).toggleClass('postBoxInnerHover');
	}); 
$j('.postBox a.readMore').hover(function(){
	$j(this).prev('.postBoxInner').toggleClass('postBoxInnerHover');
	}); 

