<?php
   echo '<div>' .'Дисциплины:';
   foreach ($employees as $employee) {
      echo '<h4>' . $employee->title . '</h4>';
      echo '</div><br>';
   }
   ?>
