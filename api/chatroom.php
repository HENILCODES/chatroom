<?php
$connection = mysqli_connect('localhost', 'root', '', 'chatroom');

if ($connection) {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        echo "POST";
    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $select_message = "select * from messages where rooms_id = 1";
        $execute_select_message = mysqli_query($connection, $select_message);

        // $get_array_execute_select_message = mysqli_fetch_array($execute_select_message);
        $json = json_encode(mysqli_fetch_array($execute_select_message));
        header('Content-type: application/json');
        echo json_encode($json);
    } else {
        return "BAD REQUEST";
    }
}
