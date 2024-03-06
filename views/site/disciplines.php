<?php
if (!app()->auth::check()):
?>
<div class="container">
   <div class="disciplines">
      <h2>Дисциплины</h2>
      <div class="disciplines_menu">Экология</div>
      <div class="disciplines_menu">Биология</div>
      <div class="disciplines_menu">География</div>
      <div class="disciplines_menu">ПИДИС</div>
      <div class="disciplines_menu">РКиС</div>
      <div class="disciplines_menu">Философия</div>
      <div class="disciplines_menu">Анатомия</div>
      <div class="disciplines_menu">Мат. анализ</div>
      <div class="disciplines_menu">История</div>
      <div class="disciplines_menu">Физкультура</div>
      <div class="disciplines_menu">ПИРВП</div>
   </div>
</div>  
      
        
    
<?php endif;