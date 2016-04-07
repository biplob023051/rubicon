<?php
$output = array();
if(isset($errors)) {
    $output = Set::insert($output, 'errors', array('message' => $errors['message'],'data' => $errors['data']));
}elseif($success){
    $output = Set::insert($output, 'success', array('message' => $success['message'],'data' => $success['data']));
}
echo $this->Javascript->object($output);
?>