<?php
if (!app()->auth::check()):
   ?>
        
    <div class="menu_deconat">
        <div class="menu">Дисциплины</div>
        <div class="menu">Группы</div>
        <div class="menu">Добавить дисциплину</div>
        <div class="menu">Добавить студента</div>
    </div>
<?php endif;