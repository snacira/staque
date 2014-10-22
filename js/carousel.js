
$(document).ready(function(){
  $('.bxslider').bxSlider({
    slideWidth: 200,
    minSlides: 2,
    maxSlides: 3,
    slideMargin: 10
  });
});

//récupérer le click de l'avatar

 
$(".bxsliderAvatar").on("click", function(){

	var src= $(this).attr("src");
	$("#defaultAvatar").val(src);

	$('.bxslider li img').removeClass("selected");
    $(this).addClass("selected");
    return true;
	//console.log(src);
});



