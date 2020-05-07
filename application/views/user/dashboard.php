    <container>
      <section>
        <h2>Личная информация</h2>
        <div class="settings">
          <div class="form-control form-name">
            <span>Ваше имя</span>
            <input type="text" name="firstname" value="" placeholder="Константин">
            <button type="button" name="button">Изменить</button>
          </div>
          <div class="form-control form-email">
            <span>Ваш email</span>
            <input type="text" name="email" value="" placeholder="admin@gmail.com">
            <button type="button" name="button">Изменить</button>
          </div>

          <div class="form-control form-pass">
            <span>Ваш пароль</span>
            <input type="password" name="old-pass" value="" placeholder="Старый пароль">
            <input type="password" name="pass" value="" placeholder="Новый пароль">
            <button type="button" name="button">Изменить</button>
          </div>

        </div>
      </section>

      <section>
        <div class="add-adverb">
          <h2>Добавить объявление</h2>
          <form class="form-control" action="/" method="post">
            <input type="text" name="title" value="" placeholder="Введите заголовок">
            <textarea name="text" rows="4" cols="80" placeholder="Введите текст объявления"></textarea>
            <button type="submit" name="submit">Добавить</button>
          </form>
        </div>
      </section>
    </container>