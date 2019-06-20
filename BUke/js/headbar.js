$(function(){
	$('.pic_1 ul li').eq(0).show().siblings('.pic_1 ul li').hide();

	showtime();
	


	$('.search input').focus(function(){
		$('.search_j').show();
	});
	$('.search input').blur(function(){
		$('.search_j').hide();
	});
	$('.email').hover(function(){
		$('.message').stop(true,true).slideDown(150)
	},function(){
		$('.message').stop(true,true).slideUp(150)

	});

	$('.pic_1').hover(function(){
		clearInterval(timer);
		$('.pic_1 ul span').show();
	},function(){
		showtime();
		$('.pic_1 ul span').hide();
	});
	
	$('.leftdemo').hover(function(){
		$('.leftdemo').css('background','rgba(0,0,0,0.5)');
		$('.leftdemo a').css('opacity','0.5');
	},function(){
		$('.leftdemo').css('background','rgba(0,0,0,0.2)');
		$('.leftdemo a').css('opacity','0.2');
	});
	
	$('.rightdemo').hover(function(){
		$('.rightdemo').css('background','rgba(0,0,0,0.5)');
		$('.rightdemo a').css('opacity','0.5');
	},function(){
		$('.rightdemo').css('background','rgba(0,0,0,0.2)');
		$('.rightdemo a').css('opacity','0.2');
	});


	$('.leftdemo').on('click',function(){
		i-=1;
		if(i==-1){i=$('.pic_1 ul li').length-1;}
		sh();
	});
	
	$('.rightdemo').on('click',function(){
		i+=1;
		if(i==3){i=0;}
		sh();
	});
	
	$(window).scroll(function(){
		var scroTop = $(window).scrollTop();
		
		if(scroTop>100){
			$('#top').show();}
			else
			{$('#top').hide();}
	});
		    	
	
	$('#top').on('click',function(){
		
		$("html,body").animate({scrollTop:0},"fast");
	});



});

var i=0;
var timer; 
function sh(){
	$('.pic_1 ul li').eq(i).stop(true,true).fadeIn(1000).siblings('.pic_1 ul li').stop(true,true).fadeOut(1000);
}

function showtime(){
	timer=setInterval(function(){
	
	i++;
	if(i==3){i=0;}
	sh();
		},4000)
}



