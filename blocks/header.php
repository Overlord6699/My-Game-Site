<head>
    <title><?php echo $title ?></title>
</head>
<!--оболочка шапки -->
<div class='wrapper'>
    <header id='header' class='header lock-padding flex'>
        <div class='navbar'>
            <div class='left_header'>
                <img class='nav_icon' src='/assets/pictures/icons/header_icon.png'></img>

                <div class='menu_container'>
                    <nav>
                        <ul class='menu'>
                            <li class='selected_line'><a href='/home.php' data-text='Главная'>Главная</a></li>
                            <li><a href='/news.php' data-text='Новости'>Новости</a></li>
                            <li><a href='/shop.php' data-text='Магазин'>Магазин</a></li>

                            <!--
                            <div class='authorize'>
                                <li><a href='#pop_up' class='pop_up_open_button pop_up-link'>Войти</a></li>
                            </div>-->

                        </ul>
                    </nav>
                </div>
            </div>

            <img class='nav_icon_login' src='/assets/pictures/Вход.png'></img>
        </div>
    </header>
</div>


<?php /*require('login_pop_up.php')*/  ?>