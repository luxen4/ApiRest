<?php
require_once('./includes/Client.class.php');


/*
    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_POST['email'])
        && isset($_POST['name'])
        && isset($_POST['city'])
        && isset($_POST['telephone'])){ 
        //Client::create_client($_POST['email'], $_POST['name'], $_POST['city'], $_POST['telephone']);

        //Client::get_all_clients();
        Client::delete_client(2);

    }*/



    if($_SERVER['REQUEST_METHOD'] == 'GET' 
    && isset($_GET['email'])
    && isset($_GET['name'])
    && isset($_GET['city'])
    && isset($_GET['telephone'])){ 
    Client::create_client($_GET['email'], $_GET['name'], $_GET['city'], $_GET['telephone']);

    //Client::get_all_clients();
    //Client::delete_client(2);

}
?>