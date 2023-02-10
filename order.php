<?php
function sendTelegram($msg){

    $data = array(
        'chat_id' => TG_CHAT_ID,
        'text' => $msg
    );

    $url = 'https://api.telegram.org/bot'.TG_TOKEN.'/sendMessage?';
    file_get_contents($url.http_build_query($data) );
}
$name = isset( $_POST["name"] ) ? $_POST["name"] : "";
$phone = isset( $_POST["phone"] ) ? $_POST["phone"] : "";

$tg_text = "Имя: $name\nТелефон: $phone";
sendTelegram($tg_text);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta content="Спасибо!" name="description">
    <title>Дякуємо за замовлення!</title>
    <meta content="width=480" name="viewport">
    <style>
        @import url("default/css.css");

        body {
            margin: 0;
            box-sizing: border-box;
        }

        * > * {
            box-sizing: inherit;
        }

        .header-container,
        .main-container {
            width: 480px;
            margin: 0 auto;
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 400;
        }

        h1,
        h2,
        h3 {
            font-weight: normal;
            margin: 0;
        }

        ul {
            list-style-type: none;
            text-align: left;
        }

        .main-wrapper {
            background-image: url("default/oreder-bg.png");
            background-size: 100%;
            background-position: center top;
            background-repeat: no-repeat;
            padding-top: 50px;
            position: relative;
            min-height: 100vh;
        }

        .header-container {
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
            padding: 20px 0px 0px;
            border-radius: 30px;
        }

        .header-container h1 {
            font-family: "Roboto", Arial, sans-serif;
            font-weight: 500;
            font-size: 55px;
            line-height: 55px;
            color: #2A6F5D;
        }

        .header-container h2 {
            font-family: "Roboto", Arial, sans-serif;
            font-size: 35px;
            line-height: 35px;
            color: #616161;
            margin-bottom: 50px;
        }

        .header-container h3 {
            font-family: "Roboto", Arial, sans-serif;
            font-weight: 900;
            font-size: 40px;
            line-height: 50px;
            width: 100%;
            padding: 10px;
            position: relative;
        }

        .header-container h3::before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            background: #FFFA7A;
            border-radius: 30px;
            top: 0;
            left: 0;
            position: absolute;
            border-radius: 30px;
            z-index: 0;
        }

        .header-container h3 span {
            position: relative;
            z-index: 1;
            color: #000;
            text-transform: uppercase;
            opacity: 0.5;
            background-blend-mode: overlay;
        }

        .orderDetails {
            padding: 30px 38px;
            padding-bottom: 0;
            margin-bottom: 10px;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .orderDetails-item {
            flex-basis: 176px;
            padding: 20px 10px;
            padding-top: 70px;
            margin-bottom: 70px;
            background: linear-gradient(180deg, #2A6F5D 0%, #3FB869 100%);
            border-radius: 30px;
            box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.4);
            text-align: center;
            position: relative;
        }

        .orderDetails-item span {
            font-family: "Roboto", Arial, sans-serif;
            font-weight: 400;
            align-self: center;
            font-size: 17px;
            line-height: 23px;
            color: #fff;
        }

        .orderDetails-item::before {
            position: absolute;
            content: "";
            display: block;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.1);
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            z-index: 1;
        }

        .orderDetails-item::after {
            position: absolute;
            content: "";
            display: block;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            z-index: 2;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .orderDetails-item:nth-of-type(2)::after {
            background-image: url("default/202d387a0de0fa43e1237678a96d4cada7939400.png");
        }

        .orderDetails-item:nth-of-type(4)::after {
            background-image: url("default/9646a24719e2d81780192cd3a3375699431c6560.png");
        }

        .orderDetails-item:nth-of-type(3) {
            box-shadow: 0px 4px 30px rgba(255, 245, 0, 0.59);
            margin-bottom: 20px;
        }

        .orderDetails-item:nth-of-type(3)::after {
            background-image: url("default/6badfec8157bdc62ad9df891e61c7905a4c027e5.png");
        }

        .orderDetails-item:nth-of-type(4) {
            margin-bottom: 20px;
        }

        .orderDetails-item:nth-of-type(1)::after {
            background-image: url("default/3d1f80b85b5885e4e7ac3af516a28f2f1573348c.png");
        }

        .main-container {
            text-align: center;
            padding-top: 20px;
        }

        .main-container h2 {
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 500;
            font-size: 40px;
            line-height: 50px;
            background: rgba(112, 70, 155, 0.5);
            color: #fff;
            border-radius: 30px;
            text-transform: uppercase;
            margin-bottom: 15px;
            text-shadow: 0px 4px 5px rgba(0, 0, 0, 0.15);
            padding: 20px 0;
        }

        .offerCard {
            background: #fff;
            box-shadow: 6px 7px 10px rgba(0, 0, 0, 0.16);
            padding: 20px 15px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 30px;
        }

        .offerCard h3 {
            font-family: "Roboto", Arial, sans-serif;
            font-weight: 400;
            font-size: 30px;
            line-height: 30px;
            color: #000;
            max-width: 350px;
            margin: 0 auto;
            margin-bottom: 25px;
        }

        .offerCard img {
            max-width: 285px;
            width: 65%;
        }

        .offerCard p {
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 300;
            font-size: 23px;
            line-height: 30px;
            color: #000;
            text-align: left;
            margin-bottom: 0px;
        }

        .offerCard p span {
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 500;
        }

        .order-again{
            background: linear-gradient(328deg, #2A6F5D 0%, #3FB869 100%);
            border: none;
            border-radius: 10px;
            color: white;
            padding: 10px;
            box-shadow: 0px 4px 30px rgb(255 245 0 / 59%);
            font-size: 18px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .offerCard-price {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .offerCard-newPrice {
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 500;
            font-size: 60px;
            line-height: 60px;
            color: #2A6F5D;
        }

        .offerCard-oldPrice {
            font-family: "Ubuntu", Arial, sans-serif;
            font-weight: 400;
            font-size: 45px;
            line-height: 60px;
            color: #C4C4C4;
            position: relative;
        }

        .offerCard-oldPrice::after {
            content: "";
            display: block;
            width: 120%;
            height: 3px;
            background-color: #C4C4C4;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .main-wrapper {
            -webkit-background-size: cover;
            background-size: cover;
        }

        .info{
            padding: 0 30px;
            margin-bottom: 50px;
            color: #616161;
            font-size: 24px;
        }
        @media (max-width: 480px) {

            header,
            body {
                max-width: 480px;
                width: 480px;
            }

            .main-wrapper {
					 background-image: none;
					 background-color: #2A6F5D;
					 min-height: 100vh;
            }
        }
        .pop-up{
            display: none;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;left: 0;bottom: 0;right: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            background: rgba(255, 255, 255, 0.9);
        }
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .form-box {
            max-width: 400px;
            padding: 30px;
            border-radius: 20px;
            width: 100%;
            height: auto;
            background: linear-gradient(180deg, #2A6F5D 0%, #3FB869 100%);
        }
        .form-box__top {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
            justify-content: center;
            height: 70px;
            margin-bottom: 20px;
        }
        .form-box__img {
            position: absolute;
            left: 0;
            -webkit-animation: rotate 3s infinite;
            animation: rotate 3s infinite;
        }
        .form-box__title {
            font-size: 28px;
            font-weight: 500;
            max-width: 300px;
            width: 100%;
            color: #fff;
            font-family: sans-serif;
            text-align: center;
        }
        .form-box__label {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            font-family: sans-serif;
        }
        .form-box__span {
            margin-bottom: 5px;
            font-size: 14px;
            color: #fff;
        }
        .form-box__input {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            border: 0;
            background-color: #fff;
            font-size: 16px;
        }
        .form-box__btn {
            border: 0;
            background: #b7ff9a;
            color: #0e5b02;
            box-shadow: 0px 4px 30px rgb(255 245 0 / 59%);
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 18px;
            margin-top: 30px;
            transition: all 0.5s;
        }
        .form-box__btn:hover {
            background: #2A6F5D;
            color: white;
        }
        .misstake{
            font-size: 12px;
            color: #616161;
        }
        @-webkit-keyframes rotate {
            0% {
                transform: rotat(0deg);
            }
            100% {
                transform: rotate(180deg);
            }
        }

        @keyframes rotate {
            0% {
                transform: rotat(0deg);
            }
            100% {
                transform: rotate(180deg);
            }
        }/*# sourceMappingURL=form.css.map */
    </style>
</head>
<body>
<div class="main-wrapper">
    <section class="header-container">
        <h1>Дякуємо Вам!</h1>
        <h2>Ваше замовлення прийнято!</h2>
        <div class="info">
            <p>Ім'я: <span class="name"><?php echo $name;?></span></p>
            <p>Номер: <span class="phone"><?php echo $phone;?></span></p>
        </div>
        <ul class="orderDetails">
            <li class="orderDetails-item"><span>Наш фахівець зв'яжеться з Вами для підтвердження замовлення. </span></li>
            <li class="orderDetails-item"><span>Замовлення доставляється "Новою Поштою". </span>
            </li>
        </ul>
        <p class="misstake">Помилково ввели дані?</p>
        <button class="order-again">
            Надіслати заявку повторно!
        </button>
    </section>
    <div class="pop-up">
        <form action="thanks.php" class="form-box" method="post">
            <div class="form-box__top">
                <!-- <img class="form-box__img" src="./img/npLogo.svg" alt="img"> -->
                <p class="form-box__title">Заповніть форму прямо зараз</p>
            </div>
            <label class="form-box__label">
                <span class="form-box__span">Ім'я</span>
                <input type="text" name="name" class="form-box__input" placeholder="Ваше ім'я" required>
            </label>
            <label class="form-box__label">
                <span class="form-box__span">Телефон</span>
                <input type="tel" name="phone" class="form-box__input" onclick="(function(event){if (!event.target.value.length){event.target.value='+38';}})(event)"
                                   oninput="(function(event){const x=event.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
                                   event.target.value='+38' + (x[4] ? ' (' + x[3] + ') ' : '' + x[3]) + x[4] + (x[5] ? '-' + x[5] : '') + (x[6] ? '-' + x[6] : '');})(event)"
                                   pattern="^\+38\s[\(]?0(39|67|68|96|97|98|50|66|95|99|63|73|93|91|92|94)[\)]\s\d{3}[\-]\d{2}[\-]\d{2}$"
                                   placeholder="Ваш телефон" required="required" title="Формат: +38 (0XX) XXX-XX-XX. Проверьте правильность кода оператора.">
            </label>
            <button class="form-box__btn" type="submit">Отримати</button>
        </form>
    </div>
</div>
<script>
    window.addEventListener('click', function (e){
        if (e.target.classList.value == 'pop-up'){
            let pop = document.querySelector('.pop-up')
            pop.style.display = 'none'
        }
        if (e.target.classList.value == 'order-again'){
            let pop = document.querySelector('.pop-up')
            pop.style.display = 'flex'
        }
    })
</script>
</body>
</html>
