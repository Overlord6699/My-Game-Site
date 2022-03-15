<title>Регистрация</title>

<link rel='stylesheet' href="./assets/styles/form.css">


<div class='container'>
    <form action='check_account.php' method='post'>
        <h1 title='Форма регистрации на сайте'>Регистрация</h1>
        <div class='group'>
            <label for=''>Имя пользователя:</label>
            <input type='text' name='username' placeholder='Введите имя'>
        </div>

        <div class='group'>
            <label for=''>Адрес электронной почты:</label>
            <input type='email' name='email' placeholder='Введите адрес электронной почты'>
        </div>

        <div class='group'>
            <label for=''>Пароль:</label>
            <input type='password' name='password' placeholder='Введите пароль'>
        </div>

        <div class='group'>
            <label for=''>Подтвердите пароль:</label>
            <input type='password' name='sec_password' placeholder='Введите пароль ещё раз'>
        </div>

        <?php
        /*
        <div class='group'>
            <label for=''>Заметка:</label>
            <textarea name='message' placeholder='Введите сообщение'></textarea> 
        </div>
        */
        ?>

        <div class='group'>
            <!-- 
            <div class='button'>
                <input type='submit' value='Отправить' href='check_account.php'>
            </div>
            -->
           
            <center>
                <button>
                    Регистрация
                </button>
            </center>
            
        </div>
    </form>
</div>

