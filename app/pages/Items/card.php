
<div class="card" >
  <img src=<?= $item->image_url ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $item->name ?></h5>
    <p class="card-text"><?= $item->description ?></p>
    <a href="items/id<?= $item->id ?>" class="btn btn-primary">Подробнее</a>
  </div>
</div>
