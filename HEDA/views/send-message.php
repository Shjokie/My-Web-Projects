<?php

include ("session.php");
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['send-system-message'])) {
        require_once '../model/Messages.php';
        $message_id = $_POST['id'];
        $model = new Messages();
        if ($model->sendMessageToAll($message_id) > 0) {
            $message = "Messages Sent! ";
            header("location: system-messages.php");
            echo "Sent to all";
        } else {
            $message = "Messages Not Sent";
        }
    }
}
?>
