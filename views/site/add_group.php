<?php
if (app()->auth->user()->role == 'employee'):
    ?>

    <div style="display: flex; justify-content: center; margin-top: 2vh">
        <h2 style="font-size: 40px">Добавление группы</h2>
    </div>

    <form method="post" style="margin-top: 2vh; display: flex;
    flex-direction: column; align-items: center; gap: 5vh; font-size: 25px">
        <div>
            <label for="name">Название</label><br>
            <input style="height: 5vh; width: 45vw;" id="name" type="text" name="name" placeholder="Введите название группы">
        </div>
        <div>
            <label for="course">Курс</label><br>
            <input style="height: 5vh; width: 45vw;" id="course" type="text" name="course" placeholder="Введите номер курса">
        </div>
        <div>
            <label for="semester">Семестр</label><br>
            <input style="height: 5vh; width: 45vw;" id="semester" type="text" name="semester" placeholder="Введите номер семестра">
        </div>
        <div>
            <label for="subjects">Дисциплина</label><br>
            <select style="height: 5vh; width: 45vw;" id="subjects" name="subjects[]" multiple>
                <?php
                    foreach ($subjects as $subject)
                    {
                        echo "<option value = '" . $subject -> id . "'>" . $subject -> title . "</option>";
                    }
                ?>
            </select>
        </div>
        <button style="border: none; background-color: #3fb0e0;
        height: 5vh; width: 12vw; border-radius: 20%; font-size: 25px">Добавить</button>
    </form>
<?php elseif (app()->auth->user()->role == 'admin'):?>

    <h2 style="font-size: 100px; text-align: center">Доступ запрещён!</h2>

<?php endif; ?>