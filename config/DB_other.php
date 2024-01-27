<?php

require_once 'init.php';
    // tblcredit
    function countcredit() {
        $useremail = isset($_SESSION['useremail']) ? ($_SESSION['useremail']) : "";
        $total = 0;
        if($useremail !== ""){
    
            $where = array("userid" => $useremail,
                            "type" => "credit"); 
            $selcredit = $SubDB->execute("tblcredit", $where,"","");
           
            $credit = 0;
            foreach($selcredit as $value){
                $credit = $credit + $value['credit'];
            }
                    
            $where = array("userid" => $useremail,
                            "type" => "debit");
            $seldebit = $SubDB->execute("tblcredit", $where,"","");
    
            $debit = 0;
            foreach($seldebit as $value){
                $debit = $debit + $value['credit'];
            }
    
            $total = $credit - $debit;
        }
        return $total;
    }



    ?>