$(document).ready(function () {
    $.backstretch(['img/bg-1.jpg'], {duration: 4000, fade: 500});

    var diagonalResize = function(){
    	const viewWeight = $('body').height(); 
	    $("#diagonal-border").css('border-top',viewWeight+'px solid transparent');
	    $("#container-right").css('height',viewWeight+'px');
    }

    diagonalResize();
    
    window.onresize = function(){
    	diagonalResize();
    };

});