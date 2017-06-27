<link rel='stylesheet' href='/css/task-list.css'>

<?php
include('config/init.php');
$userId = $_SESSION['userId'];
$user = getUserInfo($userId);
$username = $user['username'];
verifyLogged();
adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');

// echo "

// <div class='blogPosts'>
//     <div class='container'>
//         <div class='task-list'>
//             <div class='list-header'>";
//                 getList(1);
//                 echo "
//                 <input type='text' id='newTask' placeholder='Add a new item...'>
//                 <a href='javascript://' onclick='addTask(1);'><button class='add-task'>Add</button></a>
//             </div>
//             <ul id='list'>";
//                 getTasks(1);
//                 echo "
//             </ul>
//         </div>
//         ";

//         echo "
//         <div class='task-list'>
//             <div class='list-header'>";
//                 getList(2);
//                 echo "
//                 <input type='text' id='newTask' placeholder='Add a new item...'>
//                 <a href='javascript://' onclick='addTask(2);'><button class='add-task'>Add</button></a>
//             </div>
//             <ul id='list'>";
//                 getTasks(2);
//                 echo "
//             </ul>
//         </div>
//     </div>
// </div>";
echo "
<div class='blogPosts'>
    <div class='container'>";
        getAllLists();
        echo"
    </div>
</div>";

footer();
?>

<script>

// FUNCTIONS WILL RUN ONCE PAGE FINISHES LOADING
$(function(){
    deleteTag();
});

// EDITTING TASKS
function deleteTag() {

    $('span.close').click(function(data) {

        var taskId = $('span.close').attr('id');
        var action = 'delete-tag';
        console.log(taskId);

        // $.post('action.php', {taskId:taskId, action:action}, function(data) {
        //     var taskToDelete = document.getElementById(taskId);
        //     taskToDelete.parentNode.removeChild(taskToDelete);
        // });
    });
}

function addCheck(taskId, listId) {
    var action = 'add-check';

    $.post('action.php', {taskId:taskId, listId:listId, action:action}, function(data) {
        var node = document.getElementById(taskId);
        if (node) {
            if (data == 'check-added') {
                node.setAttribute('class', 'checked');
            }
            if (data == 'check-removed') {
                node.setAttribute('class', '');
            } 
        }
    });
}

function addTask(listId) {
    // var listId = document.getElementById('currentList');
    // var listId = $('#currentList').val();
    var task = $('#newTask').val();
    var action = 'add-task';

    console.log(listId);
    console.log(task);

    // if (task != '') {
    //     $.post('action.php', {listId:listId, task:task, action:action}, function(data){
    //         var jsonItem = JSON.parse(data);
    //         // console.log(jsonItem);
    //         var taskId = jsonItem['taskId'];

    //         var newItem = document.createElement('LI');
    //         var textnode = document.createTextNode(task);
    //         newItem.appendChild(textnode);

    //         newItem.setAttribute('onclick', 'addCheck('+taskId+')');
    //         newItem.setAttribute('class', '');
    //         newItem.setAttribute('id', taskId);

    //         // ADD THE CLOSE MARK TO THE NEWLY ADDED TASK
    //         var span = document.createElement('SPAN');
    //         var deleteBtn = document.createTextNode('x');
    //         span.className = 'close';
    //         span.id = taskId;
    //         span.appendChild(deleteBtn);
    //         newItem.appendChild(span);

    //         // ADD TO THE LIST
    //         var list = document.getElementById('list');
    //         list.prepend(newItem);

    //         // CLEAR TEXTBOX AND ADD DELETE TO TASK
    //         document.getElementById('newTask').value = '';

    //         deleteTag();
    //     });
    // }
}


// TO ADD NEW LISTS
function addList() {
    var list = $('#newList').val();
    var action = 'add-list';

    if (list != '') {
        $.post('action.php', {list:list, action:action}, function(data) {
            console.log(data);
        });
    }
}


</script>