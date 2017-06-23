<?php

var_dump($_REQUEST);
exit;

$Test = array(
	"Thing 1"=>5,
	"Thing 2"=>"something else"
);

echo json_encode($Test);

exit;

if(true){

	echo "a bunch of html";
}
else{
	echo "FALSE";
}

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