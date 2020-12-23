<?php
    require 'db_connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>To-Do List</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="my-todo-app">
            <div id="add-task">
                <form action="todo_action/newTask.php" method="POST" autocomplete="off">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input
                        type="text"
                        name="todo-task"
                        placeholder="내용이 비어있습니다."
                        style="border-color: hotpink;"
                    />
                    <button class="button-press" type="submit">ADD ✚</button>
                    <? } else { ?>
                    <input
                        type="text"
                        name="todo-task"
                        placeholder="할 일을 기입해주세요"
                    />
                    <button class="button-press" type="submit">ADD ✚</button>
                    <? } ?>
                </form>
            </div>
            <?php
                $todoList = $con -> query("SELECT * FROM todos ORDER BY id ASC");
            ?>
            <div id="todo-display">
                <?php
                    if (mysqli_num_rows($todoList) <= 0) {
                ?>
                <div class="todo-task">
                    <h3>쉬는 날입니다! 등록 된 일이 없습니다!</h3>
                    <button class="button-press" value="false">CLEAR</button>
                </div>
                <?php
                    }
                ?>
                <?php
                    while ($todo = $todoList -> fetch_assoc()) {
                ?>
                <div
                    id="
                        <?php
                            $arr = explode(" ", $todo['id'])[0];
                            echo $arr;
                        ?>
                    "
                    class="todo-task"
                >
                    <span class="created-date">생성일자: <?php echo $todo['date_time'] ?></span>
                    <h3>
                        <?php if($todo['checked'] === "1") {?>
                            <s>
                        <?php } ?>
                            <?php echo $todo['title'] ?>
                        <?php if($todo['checked'] === "1") {?>
                            </s>
                        <?php } ?>
                    </h3>
                    <?php if($todo['checked'] === "0") { ?>
                        <button class="button-press un-done" value="false">DONE</button>
                    <?php } else {?>
                        <button class="button-press done" value="false">DONE</button>
                    <?php }?>
                    <button class="button-press clear" value="false">CLEAR</button>
                </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>