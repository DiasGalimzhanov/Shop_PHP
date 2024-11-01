<body>
    <div class="container">
        <h2>Все товары</h2>
        <form class="d-flex" method="POST">
            <input class="form-control me-2" name="name" type="text" placeholder="Поиск">
            <button class="btn btn-outline-success" type="submit">Найти</button>
        </form>
        <div class="items">
            <?php if (!empty($items)) : ?>
                <?php foreach ($items as $item) : ?>
                    <div class="item">
                        <?php include "app/pages/Items/card.php"; ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Нет товаров, соответствующих вашему запросу.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

<!-- 
<style>
        body {
            /* font-family: Arial, sans-serif; */
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
        h2 {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-outline-success {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-outline-success:hover {
            background-color: #218838;
        }
        .items {
            margin-top: 20px;
        }
        .item {
            background: #f9f9f9;
            padding: 10px;
            margin-top: 10px;
            border-left: 3px solid #3498db;
        }
</style> -->


<style> 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /* padding: 20px; */
            background-color: #f4f4f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .items {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            max-width: 300px;
            text-align: center;
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .card h4 {
            margin: 10px 0;
            color: #333;
        }
        .card p {
            margin: 10px 0;
            color: #666;
        }
        .card .price {
            font-size: 1.2em;
            color: #3498db;
            margin: 10px 0;
        }
        .card .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .card .btn:hover {
            background-color: #2980b9;
        }
</style> 