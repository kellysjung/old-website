<?php
include('config/init.php');
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
			<span class='txt-rotate' data-period='2000' data-rotate='[ "majoring in psychology.", "learning to code.", "graduating in May 2018." ]'></span>
		</h1>
		<h2>Few Things About Me</h2>
		<ul class='dashed'>
			<li>&nbsp; My name is Kelly Jung.</li>
			<li>&nbsp;I am originally from Long Island, New York.</li>
			<li>&nbsp;I attend Washington University in St. Louis, where I'm majoring in psychology and minoring in computer science.</li>
			<li>&nbsp; During the year, I work at the Career Center, advising my college peers on job searching, job application writing, interviewing, and networking.</li>
			<li>&nbsp; At LessAnnoyingCRM, I learned how to code and created this website!</li>
		</ul>
		<!-- <br>
		<h2>Just For Fun</h2>
		<ul class='dashed'>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul> -->
	</div>
</div>
<?php
footer();