<?php
include('init.php');
navbar('About');
?>
<script type='text/javascript'>
	var TxtRotate = function(el, toRotate, period) {
		this.toRotate = toRotate;
		this.el = el;
		this.loopNum = 0;
		this.period = parseInt(period, 8) || 2000;
		this.txt = '';
		this.tick();
		this.isDeleting = false;
	};

	TxtRotate.prototype.tick = function() {
		var i = this.loopNum % this.toRotate.length;
		var fullTxt = this.toRotate[i];

		if (this.isDeleting) {
			this.txt = fullTxt.substring(0, this.txt.length - 1);
		} else {
			this.txt = fullTxt.substring(0, this.txt.length + 1);
		}

		this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

		var that = this;
		var delta = 130 - Math.random() * 100;

		if (this.isDeleting) { delta /= 2; }
		if (!this.isDeleting && this.txt === fullTxt) {
			delta = this.period;
			this.isDeleting = true;
		} else if (this.isDeleting && this.txt === '') {
			this.isDeleting = false;
			this.loopNum++;
			delta = 600;
		}

		setTimeout(function() {
			that.tick();
		}, delta);
	};

	window.onload = function() {
		var elements = document.getElementsByClassName('txt-rotate');
		for (var i=0; i<elements.length; i++) {
			var toRotate = elements[i].getAttribute('data-rotate');
			var period = elements[i].getAttribute('data-period');
			if (toRotate) {
				new TxtRotate(elements[i], JSON.parse(toRotate), period);
			}
		}
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
  document.body.appendChild(css);
};	
</script>

<div class='large-break'><br></div>
<div class='main'>
	<div class='about'>
		<h1>I am
			<span class='txt-rotate' data-period='2000' data-rotate='["majoring in psychology at WashU.", "learning to code.", "graduating in May 2018." ]'></span>
		</h1>
		<div style='width: 800px;'>
			<h2>Few Things About Me</h2>
			<ul class='dashed'>
				<li>&nbsp; My name is Kelly Jung.</li>
				<li>&nbsp; I grew up on Long Island, New York.</li>
				<li>&nbsp; I attend Washington University in St. Louis, where I'm majoring in psychology and minoring in computer science.</li>
				<li>&nbsp; During the school year, I work at the Washington University Career Center, advising my peers on job searches, application writing, interviewing, and networking.</li>
				<li>&nbsp; At LessAnnoyingCRM, I learned how to code and created this website!</li>
				<li>&nbsp; On the projects page, you can see the other things I worked on at LACRM.</li>
			</ul>	
		</div>
		<div class='med-break'><br></div>
		<h2>Contact</h2>
		<div id='contact-container'>
			<div class='contact-form'>
				<div class='contact-left-column'>
					<p>Email</p>
					<p>Phone</p>
					<p>LinkedIn</p>
				</div>
				<div class='middle-column'></div>
				<div class='contact-right-column'>
					<p>kellyjung@wustl.edu</p>
					<p>(516) 350 - 0009</p>
					<p>linkedin.com/in/kellysjung</p>
				</div>
				<div class='contact-form'>

					<img src='/images/me.jpg' alt='Picture of Kelly Jung'>
				</div>
			</div>
		</div>
	</div>
</div>
<div class='large-break'><br></div>
<?php
footer();