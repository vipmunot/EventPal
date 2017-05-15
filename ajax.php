<?php
    require_once 'Utils/DatabaseUtil.php';
    
    if (isset($_POST['name'])) {
        switch ($_POST['name']) {
            case 'insertEventRegister':
                echo eventRegister($_POST['memberId'], $_POST['eventId']);
                break;

            case 'removeEventRegister':
                echo eventDeRegister($_POST['memberId'], $_POST['eventId']);
                break;


            default:
                echo "No matching request";
        }
    }


?>