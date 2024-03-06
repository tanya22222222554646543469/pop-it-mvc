
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
   ?>
   <form method="post" class="login">
        <label class="log_in">
           <h1 class="text1">Вход</h1>
        </label>
       <label class="input_data">
            <input type="email" name="email" placeholder="Email" class="input_data1">
            <input type="password" name="password" placeholder="Пароль" class="input_data1">
            <button class="to_come_in">Войти</button>
       </label>
   </form>
<?php endif;


