
<?php if($_SESSION['user'] !== null) : ?>    
  <body>
    <div class="profile-container">
        <h5>Страница пользователя</h5>
        <p>Email: <?php echo $_SESSION['user']->email;?></p>
        <p>Password: <?php echo $_SESSION['user']->password;?></p>
        <p>Username: <?php echo $_SESSION['user']->username;?></p>
        <p>Phone number: <?php echo $_SESSION['user']->phone_number;?></p>
        <p>Gender: <?php echo $_SESSION['user']->gender;?></p>
        <p>Birthdate: <?php echo $_SESSION['user']->birthdate;?></p>
        <a class="btn" href="/mvc/user/logout" role="button">Выйти</a>
        <a class="btn" href="/mvc/user/edit" role="button">Редактировать</a>
    </div>
    </body>
<?php endif;?>






<style>
        body {
            margin: 0;
            background-color: #f4f4f9;
        }
        .profile-container {
            width: calc(100% - 400px);
            max-width: 100%;
            margin: auto;
            box-sizing: border-box;
            padding: 20px;
            background: #fff;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .profile-container p {
            margin: 10px 0;
            color: #333;
        }
        .profile-container .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .profile-container .btn:hover {
            background-color: #2980b9;
        }
</style>