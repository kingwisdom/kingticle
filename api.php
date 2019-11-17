<?php

    $conn = new mysqli("localhost","root","","kingticle");

    if($conn->connect_error){
        die("Could not connect to database");
    }

    $result  = array('error' =>false);
    $action = 'read';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $results = $conn->query("SELECT * FROM `articles`");
        $artices = array();

        while($row = $results->fetch_assoc()){
            array_push($artices, $row);
        }
        $result['articles'] = $artices;
    }

    if($action == 'create'){
        $title = $_POST['title'];
        $body_url = $_POST['body_url'];
        $image_url = $_POST['image_url'];

        $query = $conn->query("INSERT INTO `articles` (`title`,`body_url`,`image_url`,`created_at`) VALUES ('$title','$body_url','$image_url', now())");

        if($query){
            $result['message'] = "Post Added Successfully";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Post Could Not Insert";
        }
        $result['articles'] = $artices;
    }

    if($action == 'delete'){
        $id = $_POST['id'];
        $query = $conn->query("DELETE FROM `articles` WHERE `id` = '$id'");

        if($query){
            $result['message'] = "Post Deleted Successfully";
        }
        else{
            $result['error'] = true;
            $result['message'] = "Post Could Not Delete";
        }
    }



    $conn->close();

    header("Content-type: application/json");
    echo json_encode($result);
    die();