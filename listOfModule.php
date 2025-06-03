<?php
   include("conn.php");
   $sql = "SELECT m.Module_Id,
           m.Module_Name,
           m.Trade_Id
           t.Trade_Name
           FROM modules m 
           JOIN trades d
           ON "


?>