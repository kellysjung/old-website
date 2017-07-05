<link rel='stylesheet' href='/css/task-list.css'>
<link rel='styleSheet' href='/css/custom-color-picker.css'>
<script src="js/customColorPicker.js" type="text/javascript"></script>

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
<div id='all-lists' class='task-container'>";
    getAllLists();
    echo"
</div>
<br><br>

<h4><a href='task-archive.php'>View Archived Lists</a></h4>


";

footer();
?>

<script>
// FUNCTIONS WILL RUN ONCE PAGE FINISHES LOADING
$(function() {
    // var colors = document.getElementsByClassName('colorpicker');
    // for (var i = 0; 1 < colors.length; i++) {
        // colors.style.display = 'none';
        // console.log(colors);
    // }

    deleteTask();
    deleteList();
    hideList();
    dropdownList();
});

// EDITTING TASKS
function addCheck(taskId) {
    var action = 'add-check'; 

    $.post('action.php', {taskId:taskId, action:action}, function(data) {
        var task = document.getElementById(taskId);
        var listId = data;

        $(task).toggleClass('checked');
        var checked = task.getAttribute('class');
        
        if (checked == 'checked') {
            var list = document.getElementById('ul_done_'+listId);
            task.remove();
            list.appendChild(task);
        }
        if (checked == '') {
         var list = document.getElementById('ul_'+listId);
         task.remove();
         list.appendChild(task);
     }
 });
}

function deleteTask() {
    $('span.close').unbind().click(function(data) {

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
            // console.log('item', newItem);
            // console.log('list', list)

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
            
            deleteTask();
            deleteList();
            hideList();
            dropdownList();
        });
    }
}

// function Foo(Element){
//     console.log($(Element).attr('ListId'));
// }


// 
// 
// TODO:
// - CHANGE ALL THE ID TO SET ATTRIBUTE
// - OBTAIN BY DATA?
// - ALSO NEED TO CHANGE THE CLICKS SO ERRORS WON'T OCCUR CONSTANTLY
// 
// 


function deleteList() {
    $('span.del-list').unbind().click(function(data) {

        var confirm = window.confirm('Delete list?');
        if (confirm) {
            var listId = data.target.id;
            var action = 'delete-list'
            // var listId = $('i').data('listId');
            // var listId = $
            // console.log('listId', listId);

            $.post('action.php', {listId:listId, action:action}, function(data) {
                var listToDelete = document.getElementById(listId);
                listToDelete.remove();
            });
        }
    });
}

function hideList() {
    $('span.hide-list').unbind().click(function(data) {
        var listId = data.target.id;
        var action = 'collapsed';

        $.post('action.php', {listId:listId, action:action}, function(data) {
            var list = document.getElementById(listId);
            $(list).toggleClass('collapsed');
        });
    });
}

function dropdownList() {
// $('span.drop-down').hover(function(data) {
    $('span.drop-down').unbind().click(function(data) {
        var listId = data.target.id;
        $('#drop-menu-'+listId).toggle();
    });
}

function dropColorList(listId) {
    $('#color-menu-'+listId).toggle();
}

function archiveList(listId) {
    var action = 'archived';
    $.post('action.php', {listId:listId, action:action}, function(data) {
        var list = document.getElementById(listId);
        list.remove();
    });
}

function changeColor(listId) {
    var header = document.getElementById('list-header-'+listId);
    var action = 'change-color';
    var color =  '#ff4d4d';

    var chosen = document.getElementsByClassName('selected');
    console.log(chosen);

    $.post('action.php', {listId:listId, action:action, color:color}, function(data) {
        header.style.backgroundColor = color;
        console.log(data);
    })
}

function OnCustomColorChanged(selectedColor, colorPickerIndex) {
    var hex = rgb2hex(selectedColor);
    // changeColor(hex);
};

function rgb2hex(rgb){
    rgb = rgb.match(/^rgb?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
    ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}

</script>