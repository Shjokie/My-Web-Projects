<?php


if(isset($_POST['delete-client'])){
    include '../model/ClientModel.php';
    $model = new ClientModel();
    $id = $_POST['id'];
    if($model->deleteClient($id)){
        header("location: clients.php");
    }
}
else if(isset($_POST['delete-system-message'])){
    include '../model/Messages.php';
    $model = new Messages();
    $id = $_POST['id'];
    if($model->deleteSystemMessages($id)){
        header("location: system-messages.php");
    }
    
}else if(isset ($_POST['delete-user'])){
    require_once '../model/SystemUsers.php';
    $model = new SystemUsersModel();
    $id = $_POST['id'];
    if($model->deleteUser($id)){
        header("location: users.php");
    }
}
?>


