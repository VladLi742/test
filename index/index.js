$('.js-choice').on('change', function () {
    var type;
    var data = $('.js-choice').val();
    $('.js-container-enter-id').hide();

    switch (data) {
        case 'active-category':
            type = 'категории';
            break;
        case 'active-good':
            type = 'товара';
            break;
        case 'good-by-id':
            type = false;    
            $('.js-container-enter-id').show();
            break;
    }

    if (type) {
        postRequest(data, type);
    }
});

$('.check-id').on('click', function () {
    var data = $('.container-enter-id__input_field').val();
    getId(data, 'товара');
});

$('.js-make-reminder').on('click', function () {
    $.post(
        'index.php',
        {data: data},
        function (data) {
            try {
                $('.js-make-reminder').text('Упоминание сделано!');
            } catch (err) {
                $('.js-make-reminder').text('К сожалению сделать упоминание сейчас не возможно, попробуйте позже!');
            }
        },
    );
    
});

function postRequest(data, type) {
    $.post(
        'form.php',
        {data: data},
        function (data) {
            var table = JSON.parse(data);

            $('.js-content').empty();
            for (var itemNumber = 0; itemNumber < table.length; itemNumber++) {
                addText(table, type, itemNumber);
            }
        }
    );
}

function getId(data, type) {
    $.post(
        'index.php',
        {data: data},
        function (data) {
            try {
                var table = JSON.parse(data);
                $('.js-content').empty();
                delete table[0].summary;
                addText(table, type);
            } catch (err) {
                location.href = '404';
            }
        },
    );
}

function addText(table, type, itemNumber) {
    var content = $('.js-content');
    itemNumber = itemNumber || 0;

    content.append(
        '<div>id:&nbsp;<span>' + table[itemNumber].id + '</span></div>'
    );
    content.append(
        '<div>Название ' + type + ':&nbsp;<span>' + table[itemNumber].name + '</span></div>'
    );

    if (!typeof table[itemNumber].summary === undefined) {
        content.append(
            '<div>Краткое описание ' + type + ':&nbsp;<span>' + table[itemNumber].summary + '</span></div>'
        );
    }

    content.append(
        '<div>Полное описание ' + type + ':&nbsp;<span>' + table[itemNumber].description + '</span></div>'
    );

    if (!table[itemNumber].presence_of <= 0) {
        if (type === 'товара') {
            content.append(
                '<div>Наличие ' + type + ':&nbsp;<span>' + table[itemNumber].presence_of + '</span></div>'
            );
            content.append(
                '<div>Возможность заказа ' + type + ':&nbsp;<span>' + table[itemNumber].possibility_of_the_order + '</span></div>'
            );
            content.append(
                '<div>Сделать упоминание, когда заказ ' + type + ' будет возможен?&nbsp;' +
                '<button class="js-make-reminder">Сделать упоминание!</button>'
            )
        }
    }
}
