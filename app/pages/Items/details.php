<body>
    <div class="container">
        <a class="btn btn-primary" href="/mvc/items" role="button">Назад</a>
        <img src="<?=$item->image_url?>" alt="">
        <h4><?=$item->name?></h4>
        <h5><?=$item->brand?></h5>
        <p><?=$item->description?></p>
        <p>Цена: <?=$item->price?></p>
        <p>Количество: <?=$item->stock_quantity?></p>
        <p>Номер телефона: <?=$item->phone_number?></p>

        <?php if(($_SESSION['user'] !== null && $_SESSION['user']->id === $item->user_id) || $_SESSION['user']->role === 'admin') : ?>
        <form action="" method="post">
            <input type="hidden" name="delete_item" value="1">
            <input type="submit" class="btn btn-primary" value="Удалить пост">
        </form><br>
        <form action="" method="post">
            <input type="hidden" name="edit_item" value="1">
            <input type="submit" class="btn btn-primary" value="Редактировать">
        </form>
        <?php endif; ?>

        <?php if($_SESSION['user'] !== null) : ?>
        <form action="" method="post">
            <input type="text" class="form-control" name="comment" placeholder="Комментарий">
            <input type="submit" class="btn btn-primary" value="Отправить">
        </form>
        <?php endif; ?>

        <?php foreach($comments as $comment) : ?>
            <div class="comment">
                <p class="comment-author">Author: <?=$comment->username?></p>
                <p><?=$comment->comment?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>





















<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* padding: 20px; */
            background-color: #f4f4f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        h4, h5 {
            margin: 10px 0;
        }
        p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
        }
        .comment {
            background: #f9f9f9;
            padding: 10px;
            margin-top: 10px;
            border-left: 3px solid #3498db;
        }
        .comment p {
            margin: 5px 0;
        }
        .comment-author {
            font-weight: bold;
        }
</style>