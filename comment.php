<?php
    #####################################################################
    #
    #   File          : COMMENT
    #   Project       : Game Magazine Project
    #   Author        : Béo Sagittarius
    #   Created       : 07/01/2015
    #
    ##################################################################### -->
    include('/includes/backend/mysqli_connect.php');
    include('/includes/functions.php');
    $author = $_SESSION['fullname'];
    $uid = $_SESSION['uid'];

    // Validate comment
    if(isset($_POST)){
        $nid = $_POST['newid'];
        $comment = mysqli_real_escape_string($dbc, $_POST['comment']);
        if (empty($comment)) {
            echo json_encode(['status' => 'NULL']);
        } else {
            $query = "INSERT INTO tblcomment (news_id, author, comment, comment_date, user_id) VALUES ({$nid}, '{$author}','{$comment}', NOW(), {$uid})";
            $result = mysqli_query($dbc, $query);
            confirm_query($result, $query);

            if (mysqli_affected_rows($dbc) == 1) {
                echo json_encode(['status' => 'OK']);
            } else { // Error
                echo json_encode(['status' => 'FAIL']);
            }
        }
    }
