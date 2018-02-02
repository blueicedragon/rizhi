// JavaScript Document
//萨达
var getDiv=document.getElementById('returntop');
getDiv.onclick=function(){
	window.scrollTo(0,0);
}
window.onscroll=function(){
	if(document.documentElement.scrollTop){
		getDiv.style.display="block";
	}else if(document.body.scrollTop){
		getDiv.style.display="block";
	}else{
		getDiv.style.display="none";	
	}
}
function getWinSize(){
	var winHeight=window.innerHeight,winWidth=window.innerWidth;
	if(document.documentElement.clientHeight){
		winHeight=document.documentElement.clientHeight;
		winWidth=document.documentElement.clientWidth;
	}else{
		winHeight=document.body.clientHeight;
		winWidth=document.body.clientWidth;
	}
    var height=winHeight-40;
	var width=winWidth-80;
	getDiv.style.top=height+"px";
	getDiv.style.left=width+"px";
}
getWinSize();
window.onresize=getWinSize;


/*$(document).ready(function(){
		var menuYloc = $("#top").offset().top;
		$(window).scroll(function (){ 
		   var offsetTop = menuYloc + $(window).scrollTop() +"px";
		   $("#top").animate({top : offsetTop },{ duration:300 , queue:false });
		});
	
			
});*/