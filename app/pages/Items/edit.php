<!-- <body>
    <div class="form-container">
        <h5>Создание объявления</h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image_url" class="form-label">Ссылка на изображение</label>
                <input type="text" class="form-control" id="image_url" name="image_url">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="brand" class="form-label">Бренд</label>
                <input type="text" class="form-control" id="brand" name="brand">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-textarea" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="stock_quantity" class="form-label">Количество</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity">
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option selected>Выберите категорию</option>
                    <option value="1">Кузов</option>
                    <option value="2">Двигатель</option>
                    <option value="3">Ходовая часть</option>
                    <option value="4">Технические жидкости</option>
                    <option value="5">Другое</option>
                </select>
            </div>
            <button type="submit" class="btn">Обновить</button>
        </form>
    </div>

</body> -->


    <body>
        <div class="form-container">
            <h5>Редактирование объявления</h5>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image_url" class="form-label">Ссылка на изображение</label>
                    <input type="text" class="form-control" id="image_url" name="image_url" value="<?= htmlspecialchars($item->image_url) ?>">
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($item->name) ?>">
                </div>
                <div class="form-group">
                    <label for="brand" class="form-label">Бренд</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($item->brand) ?>">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-textarea" id="description" rows="3" name="description"><?= htmlspecialchars($item->description) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($item->price) ?>">
                </div>
                <div class="form-group">
                    <label for="stock_quantity" class="form-label">Количество</label>
                    <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?= htmlspecialchars($item->stock_quantity) ?>">
                </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="1" <?= $item->category_id == 1 ? 'selected' : '' ?>>Кузов</option>
                        <option value="2" <?= $item->category_id == 2 ? 'selected' : '' ?>>Двигатель</option>
                        <option value="3" <?= $item->category_id == 3 ? 'selected' : '' ?>>Ходовая часть</option>
                        <option value="4" <?= $item->category_id == 4 ? 'selected' : '' ?>>Технические жидкости</option>
                        <option value="5" <?= $item->category_id == 5 ? 'selected' : '' ?>>Другое</option>
                    </select>
                </div>
                <button type="submit" class="btn">Обновить</button>
            </form>
        </div>
    </body>




<!-- <body>
    <div class="form-container">
        <h5>Редактирование объявления</h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image_url" class="form-label">Ссылка на изображение</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="<?= $item->image_url ?>">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($item->name) ?>">
            </div>
            <div class="form-group">
                <label for="brand" class="form-label">Бренд</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($item->brand) ?>">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-textarea" id="description" rows="3" name="description"><?= htmlspecialchars($item->description) ?></textarea>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($item->price) ?>">
            </div>
            <div class="form-group">
                <label for="stock_quantity" class="form-label">Количество</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" value="<?= htmlspecialchars($item->stock_quantity) ?>">
            </div>
            <div class="form-group">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option selected>Выберите категорию</option>
                    <option value="1" <?= $item->category_id == 1 ? 'selected' : '' ?>>Кузов</option>
                    <option value="2" <?= $item->category_id == 2 ? 'selected' : '' ?>>Двигатель</option>
                    <option value="3" <?= $item->category_id == 3 ? 'selected' : '' ?>>Ходовая часть</option>
                    <option value="4" <?= $item->category_id == 4 ? 'selected' : '' ?>>Технические жидкости</option>
                    <option value="5" <?= $item->category_id == 5 ? 'selected' : '' ?>>Другое</option>
                </select>
            </div>
            <button type="submit" class="btn">Обновить</button>
        </form>
    </div>
</body> -->


<style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .form-container {
            margin: auto;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h5 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control, .form-select, .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-textarea {
            resize: vertical;
        }
        .form-control:focus, .form-select:focus, .form-textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
</style>
