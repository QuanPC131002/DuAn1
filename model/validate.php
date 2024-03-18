<?php
    function checkExistingEmail($email) {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = pdo_query($sql);
        return $result;
        
    }
?>