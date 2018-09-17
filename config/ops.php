<?php
    require_once('db.php');
    $conn = mysqli_connect($db_cred['host'], $db_cred['user'], $db_cred['password'], $db_cred['database']);
    if(!$conn) {
        global $output;
        $output['error'] = 'error connecting to database: ';
        print(json_encode($output));
    }
    if($_POST){
        $task = $_POST['task'];
        switch($task) {
            case 'add':
                include "$task.php";
                break;
            case 'update':
                include "$task.php";
                break;
            case 'delete':
                include "$task.php";
                break;
        };
    };
    function updateData($conn, $query) {
        $result = mysqli_query($conn, $query);
        global $output;
        if(empty($result)) {
            $output['error'][] = mysqli_error($conn);
        } else {
            $output['success'] = true;
        };
        $output_json = json_encode($output);
        print($output_json);
    };
?>