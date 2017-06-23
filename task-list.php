<link rel='stylesheet' href='/css/task-list.css'>

<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();
adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');
$listId = 1;

echo "
<div class='blogPosts'>
    <div id='task-list'>
        <div id='list-header' class='header'>";
           getList($listId);
           echo "
           <input type='text' id='newTask' placeholder='Add a new item...'>
           <a href='#' onclick='addTask();'><button class='addTask'>Add</button></a>
       </div>
       <ul id='list'>";
         getTasks($listId);
         echo "
     </ul>
 </div>
</div>";

footer();
?>

<script>
    var listId = '<?php echo $listId ?>';
    addCloseMark();

    // function deleteTask() {
        var close = document.getElementsByClassName('close');
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                // alert(div);
            }
        }
        $('close').unbind().on('click', function() {
            var div = this.parentElement;
            console.log(div);
        });
    // }

    function getTaskId(taskId) {
        var action = 'checked';

        $.post('action.php', {taskId:taskId, listId:listId, action:action}, function(data) {
            var node = document.getElementById(taskId);
            if (data == 'added') {
                node.setAttribute("class", "checked");
            }
            if (data == 'removed') {
                node.setAttribute("class", "");
            }
        });

    }

    function addCloseMark() {
        var taskList = document.getElementsByTagName('LI');
        for (var i = 0; i < taskList.length; i++) {
            var span = document.createElement('SPAN');
            var deleteBtn = document.createTextNode('\u00D7');
            span.className = 'close';
            span.appendChild(deleteBtn);
            taskList[i].appendChild(span);
        }
    }

    function addTask() {
        var task = $('#newTask').val();
        var action = 'add';

        if (task != '') {
            $.post('action.php', {listId:listId, task:task, action:action}, function(data){
                var jsonObj = JSON.parse(data);
                task = jsonObj['task'];
                taskId = jsonObj['taskId'];

                // NEED TO CHANGE THIS TO HTML APPEND SO CAN GET THE SAME FORMAT AS PHP ECHOES
                var newItem = document.createElement('LI');
                var textnode = document.createTextNode(taskId+' '+task);
                newItem.appendChild(textnode);

                var list = document.getElementById('list');
                list.prepend(newItem);

                
                // console.log(jsonObj);

                addCloseMark();
            });
        }
        
    }

    // var close = document.getElementsByClassName('close');
    // for (var i = 0; i < close.length; i++) {
    //   console.log('a '+i);
    //   close[i].onclick = function deleteTask() {
    //     console.log(close[i]);
    //     console.log('b '+i);
    //     var action = 'delete';
    //         $.post('action.php', {listId:listId, taskId:taskId, action:action}, function(data){
    //             console.log(data);
    //         });
    //     }
    // }
</script>