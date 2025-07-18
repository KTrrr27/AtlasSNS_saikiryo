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
});
