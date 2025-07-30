$(function () {
  // });
  //押された時をトリガーとする
  $('.js_modal_open').on('click', function() {
    // alert('hello')
    //fadeIn表示させる
    $('.modal').fadeIn();
  //   // 投稿内容を取得して変数へ格納
    var post = $(this).attr('post');
  //   // 押されたidを取得して変数へ格納
    var post_id = $(this).attr('post-id');

  //   // 取得内容をモーダルの中身へ渡す
    $('.modal_post').val(post);
  //   // 取得したidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  $('.js_modal_close').on('click', function() {
    $('.modal').fadeOut();
    return false;
  })

  //passwordの一致チェック
  // パスワード確認が入力された時
  // CheckPasswordを起動
  $('#password_confirmation').on('input', function () {
    CheckPassword(this);
  });
  // チェック内容
  function CheckPassword(password_confirmation) {
    // #passwordをinput1に代入
    var input1 = document.getElementById('password').value;
    // password_confirmationをinput2に代入
    var input2 = password_confirmation.value;
    // 比較
    if (input1 != input2) {
      password_confirmation.setCustomValidity("入力が一致しません。");
    } else {
      password_confirmation.setCustomValidity('');
    }
  }
});
