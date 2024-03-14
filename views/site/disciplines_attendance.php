<?php
    echo '<div>' .'Посещаемость:';
    foreach ($employees as $employee) {
       echo '<h4>' .''. $employee->grade .'</h4>';
       echo '</div><br>';
    }
?>