<?php
    echo '<div>' .'Группы:';
    foreach ($employees as $employee) {
       echo '<h4>' .'<a href="disciplines_attendance">'. $employee->title . '</h4>';
       echo '</div><br>';
    }
?>

