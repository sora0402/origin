function goodClick() {
    // クリック時の動作を指定できます
    $('.good_message').css('display', 'block')
    $('.title').addClass('hidden_js');

    setTimeout(function () {
        $('.title').css('display', 'none');
        $('.good_message').addClass('open');

    }, 1000);


}

function badClick() {
    // クリック時の動作を指定できます
    $('.bad_message').css('display', 'block')
    $('.title').addClass('hidden_js'),

        setTimeout(function () {
            $('.title').css('display', 'none');
            $('.bad_message').addClass('open');

        }, 1000);
}

function openClick() {

    var idName = $(this).attr("id");
    $(".list_" + idName).toggleClass("none_js");
    console.log(idName)
    setTimeout(function () {
        $(".list_" + idName).toggleClass("open");
    }, 0);
    console.log('000')
}



$(function () {

    hSize = $(window).height();

    $(".side_content").css("height", "calc(" + hSize + "px - 120px");

    //インプット要素を取得する
    var inputs = $('input');
    //読み込み時に「:checked」の疑似クラスを持っているinputの値を取得する
    var checked = inputs.filter(':checked').val();

    //インプット要素がクリックされたら
    inputs.on('click', function () {

        //クリックされたinputとcheckedを比較
        if ($(this).val() === checked) {
            //inputの「:checked」をfalse
            $(this).prop('checked', false);
            //checkedを初期化
            checked = '';

        } else {
            //inputの「:checked」をtrue
            $(this).prop('checked', true);
            //inputの値をcheckedに代入
            checked = $(this).val();

        }
    });

    $(".write_input").on("input", function () {


        var input = $(this).val(); //input に入力された文字を取得
        var id = $(this).attr("id");
        var id = Number(id);
        const next = id += 1;

        if (input) { //もし文字が入っていれば

            $("#input" + next).removeClass('none_js');

            setTimeout(function () {
                $("#input" + next).addClass('open');
                console.log(next)
            }, 0);

        } else {

            $("#input" + next).removeClass('open');
            $("#input" + next).addClass('none_js');

        }


    });

    $('.open_button').click(function(){
        var idName = $(this).attr("id");
        $(".list_" + idName).toggleClass("none_js");
        console.log(idName)
        setTimeout(function () {
            $(".list_" + idName).toggleClass("open");
        }, 0);
        console.log('000')
    });


});

$(window).resize(function () {

    hSize = $(window).height();

    $(".side_content").css("height", "calc(" + hSize + "px - 120px");

});
