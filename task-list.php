<link rel='stylesheet' href='/css/task-list.css'>

<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();
adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');

echo "
<div id='new-list'>
    <input type='text' id='newList' placeholder='New List'>
    <a href = 'javascript://' onclick='addList();'><button class='add-btn'>Create</button></a>
</div>
<br><br>
";

echo "
<div id='all-lists' class='container'>";
    getAllLists();
    echo"
</div>";

footer();
?>

<script>
// FUNCTIONS WILL RUN ONCE PAGE FINISHES LOADING
$(function() {
    deleteTask();
    deleteList();
    hideList();
});

// EDITTING TASKS
// function changeColor() {
//     $('li').
// }

function addCheck(taskId) {
    var action = 'add-check'; 

    $.post('action.php', {taskId:taskId, action:action}, function(data) {
        var node = document.getElementById(taskId);
        $(node).toggleClass('checked');
        // if (node) {
        //     if (data == 'check-added') {
        //         node.setAttribute('class', 'checked');
        //     }
        //     if (data == 'check-removed') {
        //         node.setAttribute('class', '');
        //     } 
        // }
    });
}

function deleteTask() {
    $('span.close').click(function(data) {
        var taskId = data.target.id;
        var action = 'delete-task';

        $.post('action.php', {taskId:taskId, action:action}, function(data) {
            var taskToDelete = document.getElementById(taskId);
            // var listId = data;
            // var jsonItem = JSON.parse(data);
            // var listId = jsonItem['listId'];
            // var list = document.getElementById(listId);
            // list.removeChild(taskToDelete);
            taskToDelete.remove();
        });
    });
}

function addTask(listId) {
    var task = $('#newTask_'+listId).val();
    var action = 'add-task';

    if (task != '') {
        $.post('action.php', {listId:listId, task:task, action:action}, function(data){
            var jsonItem = JSON.parse(data);
            var taskId = jsonItem['taskId'];

            var newItem = document.createElement('LI');
            var textnode = document.createTextNode(task);
            newItem.appendChild(textnode);

            newItem.setAttribute('onclick', 'addCheck('+taskId+')');
            newItem.setAttribute('class', '');
            newItem.setAttribute('id', taskId);

            // ADD THE CLOSE MARK TO THE NEWLY ADDED TASK
            var span = document.createElement('SPAN');
            var deleteBtn = document.createTextNode('x');
            span.className = 'close';
            span.id = taskId;
            span.appendChild(deleteBtn);
            newItem.appendChild(span);

            // ADD TO THE LIST
            var list = document.getElementById('ul_'+listId);
            list.appendChild(newItem);
            console.log(list);

            // CLEAR TEXTBOX AND ADD DELETE TO TASK
            $('#newTask_'+listId).val('');

            deleteTask();
        });
    }
}


// TO ADD NEW LISTS
function addList() {
    var list = $('#newList').val();
    var action = 'add-list';

    if (list != '') {
        $.post('action.php', {list:list, action:action}, function(data) {

            var div = document.getElementById('all-lists');
            var div_task_list = document.createElement('DIV');
            div_task_list.setAttribute('class', 'task-list');
            
            div_task_list.innerHTML = data;
            div.prepend(div_task_list);

            $('#newList').val('');
            
            deleteList();
        });
    }
}

function deleteList() {
    $('span.del-list').click(function(data) {
        var listId = data.target.id;
        var action = 'delete-list';

        $.post('action.php', {listId:listId, action:action}, function(data) {
            var listToDelete = document.getElementById(listId);
            listToDelete.remove();
        });
    });
}

function hideList() {
    $('span.hide-list').click(function(data) {
        var listId = data.target.id;
        var action = 'collapsed';

        $.post('action.php', {listId:listId, action:action}, function(data) {
            var node = document.getElementById(listId);
            $(node).toggleClass('collapsed');
            // if (node) {
            //     if (data == 'hide-list') {
            //         node.setAttribute('class', 'collapsed');
            //     }
            //     if (data == 'show-list') {
            //         node.setAttribute('class', '');
            //     }
            // }
        });
    });
}

</script>