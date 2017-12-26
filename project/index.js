var count = 0;
var totalIngredients = [];

$('.js-start-ordering').on('click', function () {
    $('.container__inner').removeClass('hide');
    $('.js-start-ordering').addClass('logo-pizza');
});

$('.container__inner li').on('click', function (e) {
    var data = $(e.target).attr('data-ingredient');
    if (!count) {
        totalIngredients[count] = data;
    } else if (count === 1) {
        totalIngredients[count] = data;
    } else {
        totalIngredients[count] = data;
    }

    getIngred(data);
    setTimeout(function () {
        $('.content__add-ingredient').prop('disabled', false);
    }, 1000);
});

$('.content__add-ingredient').on('click', function () {
    var curPrice = Number($('.js-price').text());
    var totalPrice = Number($('.js-total-price').text()) || 0;
    var textButton;

    if ($('.js-step-one').hasClass('hide') === false) {
        textButton = 'Тесто выбрано!';
        $('.js-step-one').addClass('hide');
        $('.js-step-two').removeClass('hide');
        stepOne(curPrice, totalPrice, textButton);
    } else if ($('.js-step-two').hasClass('hide') === false) {
        textButton = 'Соус выбран!';
        $('.js-step-two').addClass('hide');
        $('.js-step-three').removeClass('hide');
        stepTwo(curPrice, totalPrice, textButton);
    } else {
        textButton = 'Начинка выбрана!';
        $('.js-step-three').addClass('hide');
        stepThree(curPrice, totalPrice, textButton);
    }

    $('.content__add-ingredient').prop('disabled', true);
});

$('.js-make-order button').on('click', function () {
    $.ajax({
        type: "POST",
        url: "index.php",
        data: {order: totalIngredients},
        success: function (data) {
            alert(data);
        }
    });
});

function getIngred(data) {
    $.post(
        'index.php',
        {data: data},
        function (data) {
            var table = JSON.parse(data);
            $('.js-ingredient').text(table[0][0].ingredient);
            $('.js-summary').text(table[0][0].summary);
            $('.js-content').removeClass('hide');
            $('.js-price').text(table[0][0].price);
            $('.content__add-ingredient').removeClass('hide');
        },
    );
}

function stepOne(curPrice, totalPrice, textButton) {
    $('.content__add-ingredient').text(textButton);

    $('.content__total-price').removeClass('hide');
    $('.js-total-price').text(totalPrice + curPrice);
    ++count;
    $('.content__add-ingredient').text('Выбрать соус!');
}

function stepTwo(curPrice, totalPrice, textButton) {
    $('.content__add-ingredient').text(textButton);

    $('.content__total-price').removeClass('hide');
    $('.js-total-price').text(totalPrice + curPrice);
    ++count;
    $('.content__add-ingredient').text('Выбрать начинку!');
}

function stepThree(curPrice, totalPrice, textButton) {
    $('.content__add-ingredient').text(textButton);

    $('.content__total-price').removeClass('hide');
    $('.js-total-price').text(totalPrice + curPrice);
    totalIngredients[3] = $('.js-total-price').text();
    $('.js-make-order').removeClass('hide');
    ++count;
    $('.js-quote').removeClass('hide');
    $('.content__add-ingredient').text('Осталось подтвердить заказ!');
}
