<?php
    class validate{
        public function checkNumber($data){
            if (!preg_match ("/^[0-9]*$/", $data) ){
                $ErrMsg = "Only numeric value is allowed.";
                echo $ErrMsg;
            } 
        }

        public function checkEmail($data){
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (!preg_match ($pattern, $data) ){
                $ErrMsg = "Email is not valid.";
                echo $ErrMsg;
            }
        }
    }
    $valid = new validate();
    ?>