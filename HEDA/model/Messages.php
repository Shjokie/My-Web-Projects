<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages
 *
 * @author EED Advisory
 */
require_once '../model/DBConnect.php';
require_once 'sentMessagesPDF.php';
require_once 'FuelDataPDF.php';
require_once 'ClientModel.php';

class Messages extends DBConnect {

    //put your code here
    protected $conn;
    protected $dbConnect;

    function __construct() {
        //$this->dbConnect = new DBConnect();
        //$this->conn = $this->dbConnect->getConnection();
        $this->conn = $this->getConnection();
    }

    function addSystemMessage($message, $description, $date_added) {
        $result = 0;
        $db = $this->conn;
        $query = "INSERT INTO system_messages_table(message, description, date_added) VALUES (?,?,?)";
        $insertstmt = $db->prepare($query);
        $insertstmt->bind_param("sss", $message, $description, $date_added);
        $insertstmt->execute();
        $result = $insertstmt->affected_rows;
        return $result;
    }

    function editSystemMessage($id, $message, $description, $date_added) {
        $result = 0;
        $db = $this->conn;
        $query = "UPDATE system_messages_table SET message='$message', description = '$description', date_added = '$date_added' WHERE message_id=$id";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function getMessage($id) {
        $db = $this->conn;
        $message = "";
        $result = mysqli_query($db, "SELECT message FROM system_messages_table WHERE deleted=0 AND message_id=$id ");
        while ($row = mysqli_fetch_array($result)) {
            $message = $row['message'];
        }
        return $message;
    }

    function printEnergyUsage() {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM incoming_messages WHERE deleted=0 ORDER BY date_received DESC ");
        $num = 0;
        $pdf = new FuelDataPDF();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', '', 12);
        $data = Array();
        $name = "";
        $fuelName = "";
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            $id = $row['energy_id'];
            $fuelName = $this->getFuelName($id);
            $amount = $row['amount'];
            $model = new ClientModel();
            $mobNum = $row['sender_number'];
            $name = $model->getClientNameByMobNum($mobNum);
            $date = $row['date_received'];
            $data [] = [$num, $name, $fuelName, $amount, $date];
        }
        $pdf->AddPage();
        $pdf->FuelTable($data);
        $pdf->Output("../files/List of Household energy use.pdf");
    }

    function getEnergyUse() {
        $db = $this->conn;
        $data = Array();
        $result = mysqli_query($db, "SELECT * FROM incoming_messages WHERE deleted=0 ORDER BY date_received DESC ");
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['energy_id'];
            $fuelName = $this->getFuelName($id);
            $amount = $row['amount'];
            $model = new ClientModel();
            $mobNum = $row['sender_number'];
            $name = $model->getClientNameByMobNum($mobNum);
            $date = $row['date_received'];
            $data [] = [$name, $fuelName, $amount, $date];
        }
        return $data;
    }

    function printSentMessages() {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM outgoing_messages_table WHERE deleted=0");
        $num = 0;
        $pdf = new sentMessagesPDF();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', '', 12);
        $data = Array();
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            $id = $row['message_id'];
            $message = $this->getMessage($id);
            $receipient = $row['recepients'];
            $date = $row['date_sent'];
            $data [] = [$num, $message, $receipient, $date];
        }

        $pdf->AddPage();
        $pdf->SentMessagesTable($data);
        $pdf->Output("../files/List of Sent Messages.pdf");
    }

    function viewSystemMessages() {

        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM system_messages_table WHERE deleted=0");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='10'>#</th>";
        echo "<th>Messages</th>";
        echo "<th>Description</th>";
        echo "<th>Date Created</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<tbody>";
        $num = 0;
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num . '.';
            echo "</td>";
            echo "<td>";
            echo $row['message'];
            echo "</td>";
            echo "<td>";
            echo $row['description'];
            echo "</td>";
            echo "<td>";
            echo $row['date_added'];
            echo "</td>";
            echo "<td>";
            $id = $row['message_id'];
            $message = $row['message'];
            $description = $row['description'];
            $date_added = $row['date_added'];
            echo "<form action='edit-system-message.php' method='POST'>
              <input type='text' name='message' value='$message' hidden>
              <input type='text' name='description' value='$description' hidden>
              <input type='text' name='id' value='$id'  hidden>
              <input type='text' name='date_added' value='$date_added' hidden>
              <input type='submit' name='edit-system-message' value='View'>"
            . "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form name='system-messages-form' method='post' action='system-messages.php'  onsubmit='getDate()'>";
            echo "<input type='text' name='id' value='$id'  hidden>";
            echo "<input type='submit' name='send-system-message' value='Send Message'>";
            echo "</form>";
            echo "</td>";

            echo "<td>";
            echo "<form name='deleteForm' method='post' action='delete.php'>";
            echo "<input type='text' name='id' value='$id'  hidden>";
            echo "<input type='submit' name='delete-system-message' value='Delete'>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }

    function deleteSystemMessages($id) {
        $result = 0;
        $db = $this->conn;
        $query = "UPDATE system_messages_table SET deleted=1 WHERE message_id=$id ";
        $result = mysqli_query($db, $query);
        return $result;
    }

    function sendMessageToAll($message_id) {
        require_once 'ClientModel.php';
        $result = 0;
        $db = $this->conn;
        $model = new ClientModel();
        $num = array();
        $num = $model->getClientsContacts();
        $query = "INSERT INTO outgoing_messages_table(message_id,recepients) VALUES (?,?)";
        $insertstmt = $db->prepare($query);
        for ($i = 0; $i < count($num); $i++) {
            $insertstmt->bind_param("ss", $message_id, $num[$i]);
            $insertstmt->execute();
        }
        $result = $insertstmt->affected_rows;
        return $result;
    }

    function viewSentMessages() {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM outgoing_messages_table WHERE deleted=0 ");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='10'>#</th>";
        echo "<th>Messages</th>";
        echo "<th>Receipient</th>";
        echo "<th>Date Sent</th>";
        echo "<tbody>";
        $num = 0;
        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num . '.';
            echo "</td>";
            echo "<td>";
            $id = $row['message_id'];
            $message = $this->getMessage($id);
            echo $message;
            echo "</td>";
            echo "<td>";
            echo $row['recepients'];
            echo "</td>";
            echo "<td>";
            echo $row['date_sent'];
            echo "</td>";

            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }

    function getFuelName($id) {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT name FROM energy_table WHERE energy_id=$id");
        $name = "";
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
        }
        return $name;
    }

    function getTotalFuelConsumption() {
        $db = $this->conn;
        $sum = array();
        $result = mysqli_query($db, "SELECT amount FROM incoming_messages WHERE deleted=0 ");
        while ($row = mysqli_fetch_array($result)) {
            $sum[] = $row['amount'];
        }
        return $sum;
    }
    function getTotalFuelConsumptionPerUser($mob) {
        $db = $this->conn;
        $sum = array();
        $result = mysqli_query($db, "SELECT amount FROM incoming_messages WHERE deleted=0 AND sender_number='$mob'");
        while ($row = mysqli_fetch_array($result)) {
            $sum[] = $row['amount'];
        }
        return $sum;
    }

    function getEnergyUsage() {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM incoming_messages WHERE deleted=0 ORDER BY date_received DESC ");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='10'>#</th>";
        echo '<th>Respondent</th>';
        echo "<th>Fuel</th>";
        echo "<th>Amount (Kg)</th>";
        echo "<th>Date</th>";
        echo "<tbody>";
        $num = 0;

        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num . '.';
            echo "</td>";
            echo "<td>";
            $model = new ClientModel();
            $mobNum = $row['sender_number'];
            $name = $model->getClientNameByMobNum($mobNum);
            echo $name;
            echo "</td>";
            echo "<td>";
            $id = $row['energy_id'];
            $message = $this->getFuelName($id);
            echo $message;
            echo "</td>";
            echo "<td>";
            echo $row['amount'];
            echo "</td>";
            echo "<td>";
            echo $row['date_received'];
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }
    function getClientEnergyUsage($mob) {
        $db = $this->conn;
        $result = mysqli_query($db, "SELECT * FROM incoming_messages WHERE deleted=0 AND sender_number='$mob' ORDER BY date_received DESC ");
        echo "<table width = '880' border='0' class='table_s1' >";
        echo "<th width='10'>#</th>";
        echo "<th>Fuel</th>";
        echo "<th>Amount (Kg)</th>";
        echo "<th>Date</th>";
        echo "<tbody>";
        $num = 0;

        while ($row = mysqli_fetch_array($result)) {
            $num++;
            echo "<tr>";
            echo "<td>";
            echo $num . '.';
            echo "</td>";
            echo "<td>";
            $id = $row['energy_id'];
            $message = $this->getFuelName($id);
            echo $message;
            echo "</td>";
            echo "<td>";
            echo $row['amount'];
            echo "</td>";
            echo "<td>";
            echo $row['date_received'];
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        echo "</table>";
    }

}
