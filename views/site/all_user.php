<?php
foreach ($employees as $employee) {
    echo '<div>';
    echo '<h4>' .'email: ' . $employee->email . '</h4>';

    echo '<h4>' .'role: ' . $employee->roles_id . '</h4>';
    echo '</div><br>';
}
?>