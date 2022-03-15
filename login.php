<link rel='stylesheet' href="./assets/styles/loginForm.css">

<div class='container'>
    <form action='check_login.php' method='post'>
        <h1 title='Форма авторизации на сайте'>Авторизация</h1>
        <div class='group'>
            <label for=''>Имя пользователя:</label>
            <input type='text' name='username' placeholder='Введите имя'>
        </div>

        <div class='group'>
            <label for=''>Пароль:</label>
            <input type='password' name='password' placeholder='Введите пароль'>
        </div>

        <div class='group'>
            <!-- 
            <div class='button'>
                <input type='submit' value='Отправить' href='check_account.php'>
            </div>
            -->
           
            <center>
                <button>
                    Войти
                </button>
            </center>
        </div>

        <div class='group'>
            <div class='form_text'>
                <a>Или если вы тут впервые, то можете пройти</a>
                <a href='/registration.php'>регистрацию</a>
            </div>
        </div>
    </form>
</div>

