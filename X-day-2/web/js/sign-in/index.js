$(window).on('load',function(){
    $('#users-name').on('change', function() {
        var text = $('#users-name').val();
        var name = /\w|\d|[,.!?;:()]/g;
        var checkText = name.test(text);
        if (checkText) {
            alert('не валидное имя');
        }
    });

    // $('#users-email').on('change', function() {
    //     var text = $('#users-email').val();
    //     var email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    //     var checkText = email.test(text);
    //     if (!checkText) {
    //         alert('не валидный email');
    //     }
    // });

    $('#users-password').on('change', function() {
        var text = $('#users-password').val();
        var password = /[a-zA-Z]/g;
        var checkText = password.test(text);
        var checkingOnExceptions = text.replace(password, '');
        checkingOnExceptions = checkingOnExceptions.trim();
        if (checkingOnExceptions.length || text.length <= 6 || !checkText) {
            alert('не валидный пароль');
        }
    });

    // $('#users-password').on('change', function() {
    //     var text = $('#users-password').text();
    //     var password = /[a-zA-Z]/g;
    //     var checkText = password.test(text);
    //     if (!checkText) {
    //         alert('не валидный пароль');
    //     }
    // });
});