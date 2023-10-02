<?php
    class validate{
        public function checkEmpty($data, $fields){
            $msg = null;
            foreach($field as $value){
                if(empty($data[$value])){
                    $msg.="<p>$value field empty <p>";
                }
            }
            return $msg;
        }

        public function validAge($age){
            if (preg_match("/^"){

            })
        }
    }