<link rel='stylesheet' href='/css/task-list.css'>
<link rel='styleSheet' href='/css/custom-color-picker.css'>
<script src="js/customColorPicker.js" type="text/javascript"></script>

<?php
include('config/init.php');
// $userId = $_SESSION['userId'];
// $user = getUserInfo($userId);
// $username = $user['username'];
// verifyLogged();
// adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');
newHeader('Lists');
?>
<div class='med-break'><br><br><br><br></div>
<div class='center'>
    <div id='new-list'>
        <input type='text' id='newList' placeholder='New List'>
        <a href='javascript://' onclick='addList();'><button class='add-btn'>Create</button></a>
    </div><div class='med-break'><br></div>


    <div class='list-col origin drop'>
        <?php getAllLists(); ?>
    </div>
    <div class='list-col origin drop'>

    </div>


<!-- <div id='all-lists' class='task-container'>

</div> -->

<br><br>
<h4><a href='task-archive.php'>View Archived Lists</a></h4>
</div>
<div class='med-break'><br></div>
<?php newFooter(); ?>


<script>
// FUNCTIONS WILL RUN ONCE PAGE FINISHES LOADING
$(function() {
    deleteTask();
    deleteList();
    hideList();
    dropdownList();
    $('span.colorpicker').css('visibility', 'hidden');

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
        }
        if (checked == '') {
           var list = document.getElementById('ul_'+listId);
       }
       task.remove();
       list.appendChild(task);
   });
}

function deleteTask() {
    $('span.close').unbind().click(function(event) {
        var taskId = event.target.id;
        var action = 'delete-task';

        $.post('action.php', {taskId:taskId, action:action}, function(data) {
            var taskToDelete = document.getElementById(taskId);
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
            div_task_list.setAttribute('draggable', 'true');

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

function archiveList(listId) {
    var action = 'archived';
    $.post('action.php', {listId:listId, action:action}, function(data) {
        var list = document.getElementById(listId);
        list.remove();
    });
}

function deleteList(listId) {
    if (listId) {
        var confirm = window.confirm('Delete list?');
        var action = 'delete-list';
        if (confirm) {
            $.post('action.php', {listId:listId, action:action}, function(data) {
                var listToDelete = document.getElementById(listId).parentElement;
                listToDelete.remove();
            });
        }
    }
}

function hideList(listId) {
    if (listId) {
        var action = 'collapsed';

        $.post('action.php', {listId:listId, action:action}, function(data) {
            var list = document.getElementById(listId);

            if (data == 'list is hidden') {
                var hideBtn = document.getElementById(listId).getElementsByClassName('hide-list')[1];
                var showBtn = document.getElementById(listId).getElementsByClassName('hide-list')[0];
            }
            if (data == 'list is shown') {
                var hideBtn = document.getElementById(listId).getElementsByClassName('hide-list')[0];
                var showBtn = document.getElementById(listId).getElementsByClassName('hide-list')[1];
            }

            $(list).toggleClass('collapsed');
            hideBtn.style.display = 'none';
            showBtn.style.display = '';
        });
    }
}

function dropdownList(listId) {
    if (listId) {
        $('#drop-menu-'+listId).toggle();
    }
}

function dropColorList(listId) {
    if ($('#color-menu-'+listId).css('visibility') == 'hidden') {
        $('#color-menu-'+listId).css('visibility', 'visible');
    } else {
        $('#color-menu-'+listId).css('visibility', 'hidden');
    }
}

// TO HIDE THE MENUS WHEN CLICKED ELSEWHERE
$(function() {
    $(".drop-down").click(function(event) {
        $(".drop-menu").click(function(event) {
            event.stopPropagation();
        });
        event.stopPropagation();
    });

    $(document).click(function(event) {
        var clicked = $(event.target)
        $('.colorpicker').css('visibility', 'hidden');
        $('.drop-menu').hide();
    });
});

// ALL COLOR FUNCTIONS
function changeColor(color, listId) {
    var action = 'change-color';
    var header = document.getElementById('list-header-'+listId);

    $.post('action.php', {listId:listId, action:action, color:color}, function(data) {
        header.style.backgroundColor = color;
    });
}
function OnCustomColorChanged(selectedColor, selectedColorTitle, colorPickerIndex) {
    var color = rgb2hex(selectedColor);
    var listId =  matchColorIndexAndListId(colorPickerIndex);

    changeColor(color, listId);
}
function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
    ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
    ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
}
function matchColorIndexAndListId(colorPickerIndex) {
    var array = [];
    var lists = document.getElementsByClassName('task-list');
    for (var i = 0; i < lists.length; i++) {
        array[i] = lists[i];
    }
    var listId = array[colorPickerIndex].firstElementChild.id;
    return listId;
}


// DRAG AND DROP
// function allowDrop(event) {
//     console.log('in allowDrop');
//     event.preventDefault();
// }

// function drag(event) {
//     console.log('in drag');
//     event.dataTransfer.setData('list', event.target.id);
// }

// function drop(event) {
//     console.log('in drop');
//     var data = event.dataTransfer.getData('list');
//     event.target.appendChild(document.getElementById(data));
//     event.preventDefault();
// }

$('.draggable').draggable({cursor: 'move', revert: 'invalid'});
// $('.drop').draggable({accept: '.draggable',
//     drop: function(event, ui) {

//     }
// });



$('.drop').droppable({accept: '.draggable', 
    drop: function(event, ui) {
        var foo = this;
        console.log(foo);
        $(this).removeClass('border').removeClass('over');
        var dropped = ui.draggable;
        var droppedOn = $(this);
        $(dropped).detach().css({top: 0,left: 0}).appendTo(droppedOn);
    }, 
    over: function(event, elem) {
        $(this).addClass('over');

    },
    out: function(event, elem) {
        $(this).removeClass('over');
    }
});
$('.drop').sortable();

$('.origin').droppable({ accept: '.draggable', drop: function(event, ui) {

    $(this).removeClass('border').removeClass('over');
    var dropped = ui.draggable;
    var droppedOn = $(this);
    $(dropped).detach().css({top: 0,left: 0}).appendTo(droppedOn);
}});





</script>
