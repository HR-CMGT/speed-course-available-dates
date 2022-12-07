<?php
//Check if data is valid & generate error if not so
$errors = [];

if ($name == "") {
    $errors['name'] = 'Name cannot be empty'; //Alternative for errors behind input and not in summary
}
if ($date == "") {
    $errors['date'] = 'Date cannot be empty';
}

if ($selectedTime == "") {
    $errors['time'] = 'Time cannot be empty';
}
