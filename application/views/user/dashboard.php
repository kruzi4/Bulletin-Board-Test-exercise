    <container>
      <section>
        <h2>Личная информация</h2>
        <div class="settings">

          <div class="form-control form-name">
            <form class="" action="/user/dashboard" method="post">
              <span>Ваше имя</span>
              <input type="text" name="firstname" value="" placeholder="<?=$user['firstname']?>">
              <button type="submit" name="button">Изменить</button>
            </form>
          </div>

          <div class="form-control form-email">
            <form class="" action="/user/dashboard" method="post">
              <span>Ваш email</span>
              <input type="text" name="email" value="" placeholder="<?=$user['email']?>">
              <button type="submit" name="button">Изменить</button>
            </form>
          </div>

          <div class="form-control form-pass">
            <form class="" action="/user/dashboard" method="post">
              <span>Ваш пароль</span>
              <input type="password" name="old-pass" value="" placeholder="Старый пароль">
              <input type="password" name="pass" value="" placeholder="Новый пароль">
              <button type="submit" name="button">Изменить</button>
            </form>
          </div>

        </div>
      </section>

      <section>
        <div class="add-adverb">
          <h2>Добавить объявление</h2>
          <form enctype="multipart/form-data" class="form-control" action="/user/dashboard" method="post">
            <label class="form-control" for="userfile">Загрузить фотографию</label>
            <input type="file" name="userfile" class="upload" id="userfile">
            <input type="text" name="title" value="" placeholder="Введите заголовок">
            <textarea name="text" rows="4" cols="80" placeholder="Введите текст объявления"></textarea>
            <button type="submit" name="submit">Добавить</button>
          </form>
        </div>
      </section>
    </container>
