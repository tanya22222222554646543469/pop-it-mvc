<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <label>Email<input type="text" name="email" required ></label>
   <label>Пароль <input type="password" name="password" required ></label>
   <select style="height: 5vh; width: 45vw;" id="role" name="roles_id" hidden='hidden'>
      <option value="2">Декан</option>
   </select>
   <button>Зарегистрировать</button>
</form>