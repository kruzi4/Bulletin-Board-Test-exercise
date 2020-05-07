<main>
  <?php foreach ($ads as $e): ?>
    <div class="advert">
      <h3><?=$e['title']?></h3>
      <p><?=$e['text']?></p>
      <span><b>Время:</b> <?=$e['time']?></span>
      <span><b>Автор:</b> <?=$e['autor']?></span>
    </div>
    <?=var_dump($e['time']);?>
  <?php endforeach; ?>
</main>
