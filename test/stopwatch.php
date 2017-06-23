<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>

<style type="text/css">
	#pageWrapper span :nth-child(odd) {
		display: none;
	}

	#counter {
		width: 200px;
		background-color: #ddd;
		padding: 10px;
	}

</style>

<script type="text/javascript">
	// $(function() {
	// 	$('#pageWrapper span:nth-child(2)').fadeIn('slow');
	// });

	var counter = 0;
	var state = 'stopped';

	function startStop() {
		if (state == 'stopped') {
			$('#startStopBtn').val('Stop');
			state = 'started';
			incrementCounter();
		} else {
			$('#startStopBtn').val('Start');
			state = 'stopped';
		}

	}

	function incrementCounter() {
		console.log("Incrementing Counter");

		if (state == 'stopped') {
			// do nothing
			// console.log('stop increment');
		} else {
			counter += .1;
			counter = Math.round(counter * 10) / 10;
			$('#counter').html(counter);
			// console.log('keep increment');
			setTimeout(function(){incrementCounter()}, 100);
			// CAN ALSO WRITE LIKE BELOW B/C IT IS ALREADY A FUNCTION
			// GETTING CALLED AGAIN (ALMOST RECURSIVELY)
			// setTimeout(incrementCounter, 100);
		}
	}

	function lap() {
		var node = document.createElement("LI");
		var textnode = document.createTextNode(counter);
		node.appendChild(textnode);
		document.getElementById('lapList').appendChild(node);

		$('#lap').html(counter);
	}

	function clearWatch() {
		var counter = 0;
		$('#counter').html(counter);

	}

</script>

<div id='pageWrapper'>
	<div id='counter'>
		0
	</div>


	<br/>
	<input id='startStopBtn' type='button' value='Start' onclick='startStop()'>
	<input id='lapBtn' type='button' value='Lap' onclick='lap()'>
	<input id='clearWatchBtn' type='button' value='Clear' onclick='clearWatch()'>
	
	<ul id='lapList'>
		
	</ul>
</div>
</div>

