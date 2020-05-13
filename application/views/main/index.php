<main>
  <?php foreach ($ads as $e): ?>
    <div class="advert">
      <div class="describtion">
        <img src="/assets/img/uploads/<?=$e['image']?>.jpg" alt="no-image">
        <div class="text">
          <h3><?=$e['title']?></h3>
          <p><?=$e['text']?></p>
          <div class="info">
            <span><b>Время:</b> <?=$e['time']?></span>
            <span><b>Автор:</b> <?=$e['autor']?></span>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="pages"><?=$pages?></div>
</main>
