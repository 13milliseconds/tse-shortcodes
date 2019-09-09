jQuery(document).ready(function( $ ) {
	
    var playerResizing = function () {
        var newHeight = $('.tse-player').height();
	   $('.tse-player > div:first-of-type').height(newHeight);   
    }
    
    playerResizing();
    
    $(window).resize(playerResizing);
	
});