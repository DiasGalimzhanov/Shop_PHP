<div style="display: flex; justify-content: center; align-items: center; height: 100%; padding: 100px ">
  <div style="width: calc(100% - 400px); max-width: 100%; margin: 0 300px; box-sizing: border-box;">
    <form action="" method="POST">
        <label for="username">Имя пользователя:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $_SESSION['user']->username ?>" required><br>

        <label for="email">Почта:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']->email ?>" required><br>

        <label for="phone_number">Телефон:</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $_SESSION['user']->phone_number ?>" required><br>

        <label for="birthday">Дата рождения:</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $_SESSION['user']->birthdate ?>" required><br>

        <label for="password">Пароль:</label>
        <input type="password" class="form-control" id="password" name="password" required><br>

        <label for="gender">Пол:</label>
        <select class="form-select" id="gender" name="gender" aria-label="Default select example">
            <option selected>Выберите пол</option>
            <option value="male">Мужской</option>
            <option value="female">Женский</option>
        </select> <br><br><br>

        <div>
        <input class="btn btn-primary" type="submit" value="Изменить"><br><br>

        <a class="btn btn-primary" href="/mvc/user/index" role="button">Вернуться</a>
        </div>
    </form>
  </div>
</div>