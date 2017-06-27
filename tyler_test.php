<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js'></script>

<link rel='stylesheet' href='/css/task-list.css'>

<?php
// var_dump($_REQUEST);
// exit;

// $Test = array(
// 	"Thing 1"=>5,
// 	"Thing 2"=>"something else"
// );

// echo json_encode($Test);

// exit;

// if(true){

// 	echo "a bunch of html";
// }
// else{
// 	echo "FALSE";
// }

?>

<!-- <input type='text' id='newTask'/>

<a href='#' onclick='addTask();'><button>Click</button></a>


<script>

    function addTask() {
    //Optmistic write
    var task = $('#addTask').val();
    console.log(task);


    $.post("/action.php",{taskName:task}, function(data){
        console.log(data);
        var Test = JSON.parse(Data);
        console.log(Test);
        alert(Data);
    });

    //asdfasdf
}

</script> -->

<ul>
    <div>
        <li onclick='check(1)' id='1'>task</li><span class='close' onclick='close(1)'>x</span>
    </div>
</ul>

<script type="text/javascript">

    function check(id) {
        console.log('check');
    }

    function close(id) {
        console.log('close');
    }

    $('span.close').click(function() {
        console.log('close');
    });

</script>