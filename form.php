<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <div id="forms">
<form action="" method="POST">

  <label>
    Имя:<br />
    <input name="fio" class="formContent" placeholder="Ваше имя (по русски)" />
  </label><br /><br />

  <label>
    Еmail:<br />
    <input name="email" class="formContent" type="email" placeholder="Введите вашу почту" />
  </label><br /><br />

  <label>
    Год рождения:<br />
  <select name="year">
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>
  </label><br /><br />

  <label>
    Пол:<br/>
    <label><input type="radio" checked="checked" name="gender" class="formContent" value="Мужской" />Мужской</label><br />
    <label><input type="radio" name="gender" class="formContent" value="Женский" />Женский</label><br />
  </label>
          
  <label>
            Количество конечностей:<br />
            <label><input type="radio" checked="checked" name="limbs" class="formContent" value="4" />4 конечности</label><br />
            <label><input type="radio" name="limbs" class="formContent" value="3" />3 конечности</label><br />
            <label><input type="radio" name="limbs" class="formContent" value="2" />2 конечности</label><br />
            <label><input type="radio" name="limbs" class="formContent" value="1" />1 конечность</label><br />
            <label><input type="radio" name="limbs" class="formContent" value="0" />Нет конечностей</label><br />
            <br />
  </label>

            <label>
                Сверхспособности:<br />
                <select name="abilities[]" class="formContent" multiple="multiple">
                  <option value="Бессмертие"  selected="selected">Бессмертие</option>
                  <option value="Прохождение сквозь стены">Прохождение сквозь стены</option>
                  <option value="Левитация">Левитация</option>
                </select>
            </label><br /><br />

            <label>
              Биография:<br />
              <textarea name="biography" class="formContent" cols="100" rows="20" placeholder="Напишите вашу биографию (по русски)"></textarea>
            </label><br /><br />

            <label><input type="checkbox" checked="checked" name="check" />
              С контрактом ознакомлен(а)</label><br /><br />

              <input type="submit" value="Отправить" />
</form>
  </div>
  </body>
  </html>