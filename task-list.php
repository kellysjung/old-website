

<?php
include('config/init.php');
echo "<link rel='stylesheet' href='/css/task-list.css?Time=".microtime()."'/>";
echo "<link rel='stylesheet' href='/css/custom-color-picker.css?Time=".microtime()."'/>";
// $userId = $_SESSION['userId'];
// $user = getUserInfo($userId);
// $username = $user['username'];
// verifyLogged();
// adminNavbar('Tasks | Kelly Jung', 'Tasks', 'headerMain');
newHeader('Lists');
?>
<div class='large-break'><br><br></div>
<div class='center'>
    <div id='new-list'>
        <input type='text' id='newList' placeholder='New List'>
        <a href='javascript://' onclick='addList();'><button class='add-btn'>Create</button></a>
    </div><div class='med-break'><br><br></div>

    <div class='list-col' id='col_1'>
        <?php getAllLists(1); ?>
    </div>
    <div class='list-col' id='col_2'>
        <?php getAllLists(2); ?>
    </div>

    <div class='clear'></div>
    <div class='med-break'><br><br></div>
    
    <h4><a href='task-archive.php'>View Archived Lists</a></h4>
</div>
<br>
<?php
newFooter();
?>


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
        $.post('action.php', {listId:listId, task:task, action:action}, function(data) {
            var jsonItem = JSON.parse(data);
            var taskId = jsonItem['taskId'];

            var newItem = document.createElement('LI');
            var textnode = document.createTextNode(task);
            newItem.appendChild(textnode);

            newItem.setAttribute('onclick', 'addCheck('+taskId+')');
            newItem.setAttribute('class', '');
            newItem.setAttribute('id', taskId);

            // ADD THE CLOSE MARK TO THE NEWLY ADDED TASK
            var deleteBtn = document.createTextNode('x');
            // var moveBtn = document.createTextNode('\u2630');
            var span = document.createElement('SPAN');

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
            var div = document.getElementById('col_1');
            var div_task_list = document.createElement('DIV');
            div_task_list.setAttribute('class', 'task-list');

            div_task_list.innerHTML = data;
            div.prepend(div_task_list);

            $('#newList').val('');
        });
    }
}

function archiveList(listId) {
    if (listId) {
       var action = 'archived';
       $.post('action.php', {listId:listId, action:action}, function(data) {
        var list = document.getElementById(listId);
        list.remove();
    });
   }
}

function deleteList(listId) {
    if (listId) {
        var confirm = window.confirm('Are you sure you want to delete this list?');
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
                var hideBtn = list.getElementsByClassName('hide-list')[1];
                var showBtn = list.getElementsByClassName('hide-list')[0];
            }
            if (data == 'list is shown') {
                var hideBtn = list.getElementsByClassName('hide-list')[0];
                var showBtn = list.getElementsByClassName('hide-list')[1];
            }

            $(list).toggleClass('collapsed');
            hideBtn.style.display = 'none';
            showBtn.style.display = '';
        });
    }
}

function dropdownList(listId) {
    if (listId) {
        $('#drop_menu_'+listId).toggle();
    }
}

function dropColorList(listId) {
    if ($('#color_menu_'+listId).css('visibility') == 'hidden') {
        $('#color_menu_'+listId).css('visibility', 'visible');
    } else {
        $('#color_menu_'+listId).css('visibility', 'hidden');
    }
}

// TO HIDE THE MENUS WHEN CLICKED ELSEWHERE
$(function() {
    $('.drop-down').click(function(event) {
        $('.drop-menu').click(function(event) {
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
    var header = document.getElementById('list_header_'+listId);

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
    return (rgb && rgb.length === 4) ? '#' + ('0' + parseInt(rgb[1],10).toString(16)).slice(-2) + ('0' + parseInt(rgb[2],10).toString(16)).slice(-2) + ('0' + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
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


// SORTING THE LISTS IN THE COLUMNS
// SAVES THE ORDER BUT NOT WHEN THE ITEMS MOVE ONLY WITHIN THE SAME LIST
$(function() {
    $('#col_1, #col_2').sortable({
        connectWith: '.list-col',
        handle: '.list-header',
        placeholder: 'list-placeholder',
        cursor: 'move', // THIS DOESN'T REALLY WORK
        start: function(event, ui) {
            ui.placeholder.height(ui.helper.height());
        },
        update: function(event, ui) {
            var column1 = $('#col_1').sortable('toArray');
            var column2 = $('#col_2').sortable('toArray');
            var action = 'update-list-order';
            // console.log('col1', column1);
            // console.log('col2', column2);
            // console.log(' ');
            $.post('action.php', {column1:column1, column2:column2, action:action});
        }
    }).disableSelection();


    // REORDERING AND MOVING TASKS
    $('.incomplete-list').sortable({
        // connectWith: '.incomplete-list',
        placeholder: 'list-placeholder',
        cursor: 'move',
        start: function(event, ui) {
            ui.placeholder.height(ui.helper.height());
        },
        update: function(event, ui) {
            var listSorted = $(this).sortable('toArray');
            console.log(listSorted);

            // var currentLists = <?php echo getCurrentLists() ?>;
            // var sortedTasks = [];
            // var action = 'update-task-order';
            // for (var i = 0; i < currentLists.length; i++) {
            //     // console.log('listId:', currentLists[i]['listId']);
            //     // var list = $('ul_'+currentLists[i]['listId']);
            //     var list = $('ul_'+currentLists[i]['listId']).sortable('serialize');
            //     // console.log(list);
            //     // console.log(' ');
            // }
            // // console.log(sortedTasks[1]);

            // // $.post('action.php', {sortedTasks:sortedTasks, action:action}, function(data) {
            // //     console.log('data received from tasks update post', data);
            // // });
        }
    }).disableSelection();

});



</script>