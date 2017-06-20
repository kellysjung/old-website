<!DOCTYPE html>
<html>
<head>
	<title>TEST IMAGE</title>
	<script type="text/javascript" src="/js/image-modal.js"></script>
	<link rel='stylesheet' href='/css/image-modal.css'/>
</head>
<body>

	<ul id="image-popups">
		<a href="http://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Prasat_Sikhoraphum_-_Sikhoraphum_edit1.jpg/800px-Prasat_Sikhoraphum_-_Sikhoraphum_edit1.jpg" data-effect="mfp-zoom-in">Zoom</a>
	</ul>
	<script type="text/javascript">
		// Inline popups
		$('#inline-popups').magnificPopup({
			delegate: 'a',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
  	beforeOpen: function() {
  		this.st.mainClass = this.st.el.attr('data-effect');
  	}
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});


// Image popups
$('#image-popups').magnificPopup({
	delegate: 'a',
	type: 'image',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
  	beforeOpen: function() {
      // just a hack that adds mfp-anim class to markup 
      this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
      this.st.mainClass = this.st.el.attr('data-effect');
  }
},
closeOnContentClick: true,
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});


// Hinge effect popup
$('a.hinge').magnificPopup({
	mainClass: 'mfp-with-fade',
  removalDelay: 1000, //delay removal by X to allow out-animation
  callbacks: {
  	beforeClose: function() {
  		this.content.addClass('hinge');
  	}, 
  	close: function() {
  		this.content.removeClass('hinge'); 
  	}
  },
  midClick: true
});

</script>
</body>
</html>