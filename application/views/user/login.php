    <main>
      <div class="err"></div>
      <h2>Войти в личный кабинет</h2>
      <form class="form-control login" action="/user/login" method="post">
        <div class="error"><?=$err?></div>
        <input type="email" name="email" value="<?=$input_email?>" placeholder="Введите email" recuired>
        <div class="password">
        	<input type="password" id="password-input" placeholder="Введите пароль" name="password" value="<?=$input_pass?>">
        	<a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
        </div>

        <button type="submit" name="button">Войти</button>
        <span>или вы можете</span>
        <a href="/user/register">зарегистрироваться</a>
      </form>
    </main>
