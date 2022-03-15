<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel='shortcut icon' href='/assets/pictures/icons/chest.png' type='image/x-icon'>

    <link rel="stylesheet" href="./assets/styles/main.css">
    <link rel='stylesheet' href='/assets/styles/fonts.css'>
    <link rel="stylesheet" href="https://unpkg.com/swiper@6/swiper-bundle.min.css">
</head>

<body>
    <?php
    $title = 'Главная';
    require "blocks/header.php";
    ?>


    <main>
        <section class='page page-1'>

            <div class='game_name_text'>
                <h1>Добро пожаловать на главную страницу игры...</h1>
            </div>

            <img class='main_picture' src='./assets/pictures/MainPicture.png'></img>
        </section>


        <section class='page page-2'>
            <div class='page-2_content'>

                <div class='about_game_start'>
                    <img class='about_game_img' src='/assets/pictures/decor/about_game_left.png'></img>

                    <div class='about_game'>
                        <h2>Об игре</h2>
                    </div>

                    <img class='about_game_img' src='/assets/pictures/decor/about_game_left.png'></img>
                </div>

                <div class='about_game_text_container'>
                    <h3 class='about_game_text'>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Nostrum sit consectetur deleniti mollitia, nulla dolores architecto ex ad, laudantium quibusdam corrupti?
                        Fuga quos alias molestiae. Id veniam incidunt dolore neque. Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Nostrum sit consectetur deleniti mollitia, nulla dolores architecto ex ad, laudantium quibusdam corrupti?
                        Fuga quos alias molestiae. Id veniam incidunt dolore neque.
                    </h3>
                </div>

                <div class='trapezoid_text_container'>
                    <img class='trapezoid_container' src='/assets/pictures/decor/trapezoid.png'></img>
                    <p class='trapezoid_text'>
                        Существа
                    </p>
                </div>
            </div>
        </section>


        <section class='page page-3'>
            <div class='page-3_content'>
                <div class='enemy_info_content'>
                    <!--слайдер-->
                    <div class='image-slider swiper-container'>
                        <div class='swiper-wrapper'>

                            <!-- СЛАЙД СУЩЕСТВА №1 -->
                            <div class='swiper-slide'>
                                <div class='enemy_card'>
                                    <div class='enemy_info'>
                                        <img class='slider_picture' src='/assets/pictures/creatures/enemies/BotWheel.png'></img>

                                        <div class='enemy_name'>
                                            <h4 class='enemy_name_text'>Bot Wheel</h4>
                                        </div>

                                        <div class='about_enemy'>
                                            <h5 class='about_enemy_text'>hello</h5>
                                        </div>
                                    </div>

                                    <div class='enemy_anim_container'>
                                        <ul>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>

                                            </li>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- СЛАЙД СУЩЕСТВА №2 -->
                            <div class='swiper-slide'>
                                <div class='enemy_info'>
                                    <img class='slider_picture' src='/assets/pictures/creatures/enemies/AssaultDroid.png'></img>

                                    <div class='enemy_name'>
                                        <h4 class='enemy_name_text'>Assault Droid</h4>
                                    </div>

                                    <div class='about_enemy'>
                                        <h5 class='about_enemy_text'>hi there</h5>
                                    </div>

                                    <div class='enemy_anim_container'>
                                        <ul>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <!-- СЛАЙД СУЩЕСТВА №3 -->
                            <div class='swiper-slide'>
                                <div class='enemy_info'>
                                    <img class='slider_picture' src='/assets/pictures/creatures/enemies/Police.png'></img>

                                    <div class='enemy_name'>
                                        <h4 class='enemy_name_text'>Police</h4>
                                    </div>

                                    <div class='about_enemy'>
                                        <h5 class='about_enemy_text'>i hate this slider</h5>
                                    </div>

                                    <div class='enemy_anim_container'>
                                        <ul>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='enemy_anim_background'>
                                                    <img class='enemy_anim' src='/assets/pictures/gifs/BotWheel.gif'></img>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>





                        </div>


                        <!-- СТРЕЛКИ -->
                        <div class='slide_button swiper-button-prev'>
                            <img src='/assets/pictures/decor/left_arrow.png'></img>
                        </div>

                        <div class='slide_button swiper-button-next'>
                            <img src='/assets/pictures/decor/right_arrow.png'></img>
                        </div>
                    </div>
                </div>


            </div>
        </section>


        <section class='page page-4'>
            <div class='page-4_content'>
                <div class='trapezoid_text_container'>
                    <img class='trapezoid_container' src='/assets/pictures/decor/trapezoid.png'></img>
                    <p class='trapezoid_text'>
                        Оружие
                    </p>
                </div>


                <div class='weapon_info_content'>
                    <!--слайдер-->
                    <div class='image-slider swiper-container'>
                        <div class='swiper-wrapper'>

                            <!-- СЛАЙД ОРУЖИЯ №1 -->
                            <div class='swiper-slide'>
                                <div class='weapon_info'>
                                    <img class='slider_picture' src='/assets/pictures/weapon/GoldSword.png'></img>

                                    <div class='enemy_name'>
                                        <h4 class='enemy_name_text'>Illusion</h4>
                                    </div>

                                    <div class='about_enemy'>
                                        <h5 class='about_enemy_text'>long sword</h5>
                                    </div>
                                </div>
                            </div>


                            <!-- СЛАЙД ОРУЖИЯ №1 -->
                            <div class='swiper-slide'>
                                <div class='weapon_info'>
                                    <img class='slider_picture' src='/assets/pictures/weapon/BigBoy.png'></img>

                                    <div class='enemy_name'>
                                        <h4 class='enemy_name_text'>BIG BOY</h4>
                                    </div>

                                    <div class='about_enemy'>
                                        <h5 class='about_enemy_text'>big sword</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- СТРЕЛКИ -->
                        <div class='slide_button swiper-button-prev'>
                            <img src='/assets/pictures/decor/left_arrow.png'></img>
                        </div>

                        <div class='slide_button swiper-button-next'>
                            <img src='/assets/pictures/decor/right_arrow.png'></img>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class='page page-5'>
            <div class='page-5_content'>

                <img class='finish_line' src='/assets/pictures/decor/finish_line.png'></img>

                <div class='portal_container'>
                    <img class='portal_anim' src='/assets/pictures/gifs/portal.gif'></img>

                    <div class='play_button_container'>
                        <input class='play_button_image' type='image' src='/assets/pictures/decor/button_game.png' href=''>
                        <p class='play_button_text'>Играть</p>
                    </div>
                </div>

                <div class='question_form_container'>
                    <div class='question_text_content'>
                        <p class='question_text'>Задать вопрос</p>
                        <p class='question_info'>Заполните форму и мы свяжемся с Вами в ближайшее время</p>
                    </div>

                    <form class='question_form' onsubmit="return false">
                        <label for=''>Имя пользователя:</label>
                        <input type='text' name='username' placeholder='Имя' required>

                        <input type='email' name='email' placeholder='Email' required>

                        <input class='button' type='submit' value='Отправить' onsubmit="return false">
                    </form>
                </div>
            </div>
        </section>
    </main>


    <?php require_once "blocks/footer.php"; ?>

    <script src="https://unpkg.com/swiper@6/swiper-bundle.min.js"></script>
    <script src='/assets/js/slider/slider.js'></script>
</body>

</html>