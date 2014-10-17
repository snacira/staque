</div>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
	<script>window.jQuery || document.write('<script src="js/jquery.min.js">\x3C/script>')</script>
	<script>

		$(".poster_title").css({bottom: -50});

		$("a.poster").on("mouseenter", function(){
			$(this).find(".poster_title").stop(true).animate({bottom: 0});
		});

		$("a.poster").on("mouseleave", function(){
			$(this).find(".poster_title").stop(true).animate({bottom: -50});
		});

	</script>
	
</body>
</html>
