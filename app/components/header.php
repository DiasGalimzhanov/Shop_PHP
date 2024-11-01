<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>auto shop</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary"> 

        <div class="container-fluid" style="background-color: #e3f2fd">
            <a class="navbar-brand" >DRIVE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/mvc/home">Главаная</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/mvc/items">Товары</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/mvc/about">О нас</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="/mvc/user">Авторизация</a>
                </li> -->
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                    <a class="nav-link" href="/mvc/user">Профиль</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/mvc/items/create">Добавить</a>
                    </li>
                <?php else:?>
                    <li class="nav-item">
                    <a class="nav-link" href="/mvc/user/auth">Авторизация</a>
                    </li>
                <?php endif; ?>
            </ul>
            </div>
        </div>
        </nav>    
    </header>
</body>

</html>