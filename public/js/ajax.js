$(function () {

  //検索ボタンがクリックされたら処理が走ります。

  $('.good_button').click(function () {

    //HTMLから受け取るデータです。


    var str = $(this).attr("id");
    var data = str.split('-', 2);

    console.log(str);
    //ここからajaxの処理です。         

    $.ajax({

      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },

      //POST通信

      method: "POST",

      //ここでデータの送信先URLを指定します。
      url: "good_job",

      data: { data },

      //処理が成功したら

      success: function (data, dataType) {

        //HTMLファイル内の該当箇所にレスポンスデータを追加します。

        var $button = $('.' + str);
        $button.toggleClass('checked');


      },

      //処理がエラーであれば

      error: function (xhr, textStatus, error) {

        console.log(xhr);
        console.log(textStatus);
        console.log(error);

        alert('通信エラー');
      }
    });

    //submitによる画面リロードを防いでいます。

  });

  ///////////////////////////////////////////////////////////////////////////

  $('.report').click(function () {

    

    //HTMLから受け取るデータです。


    var str = $(this).attr("id");
    var data = str.split('-', 2);

    console.log(str);
    //ここからajaxの処理です。         

    $.ajax({

      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },

      //POST通信

      method: "POST",

      //ここでデータの送信先URLを指定します。
      url: "report",

      data: { data },

      //処理が成功したら

      success: function (data, dataType) {

        //HTMLファイル内の該当箇所にレスポンスデータを追加します。
        var thisDiv = $('.job_' + str);

        thisDiv.addClass('hidden');


      },

      //処理がエラーであれば

      error: function (xhr, textStatus, error) {

        console.log(xhr);
        console.log(textStatus);
        console.log(error);

        alert('通信エラー');
      }
    });

    

    //submitによる画面リロードを防いでいます。

  });

  $('.radio').click(function () {

    

    //HTMLから受け取るデータです。


    var data = [$(this).attr("name"),$(this).attr("value")];

    console.log(data);
    //ここからajaxの処理です。         

    $.ajax({

      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },

      //POST通信

      method: "POST",

      //ここでデータの送信先URLを指定します。
      url: "role",

      data: { data },

      //処理が成功したら

      success: function (data, dataType) {

        //HTMLファイル内の該当箇所にレスポンスデータを追加します。
        var thisDiv = $('.' + data[1]);

        thisDiv.addClass('hidden');


      },

      //処理がエラーであれば

      error: function (xhr, textStatus, error) {

        console.log(xhr);
        console.log(textStatus);
        console.log(error);

        alert('通信エラー');
      }
    });

    

    //submitによる画面リロードを防いでいます。

  });

  $('.checkbox').click(function () {

    var data = $(this).attr("id");

      if ($(this).prop("checked")) {
        alert('チェックされてる');
        var data = [$(this).attr("id"),1];
      } else {
        alert('チェックされてない');
        var data = [$(this).attr("id"),0];
      }

    console.log(data);
    //ここからajaxの処理です。         

    $.ajax({

      headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },

      //POST通信

      method: "POST",

      //ここでデータの送信先URLを指定します。
      url: "share_mode",

      data: { data },

      //処理が成功したら

      success: function (data, dataType) {

        //HTMLファイル内の該当箇所にレスポンスデータを追加します。
        var thisDiv = $('.' + data[1]);

        thisDiv.addClass('hidden');


      },

      //処理がエラーであれば

      error: function (xhr, textStatus, error) {

        console.log(xhr);
        console.log(textStatus);
        console.log(error);

        alert('通信エラー');
      }
    });

    

    //submitによる画面リロードを防いでいます。

  });

});


