// 新規登録の際のパスワード表示・非表示
$(function() {
  let password = '.js-password';
  let passcheck = '#js-passcheck';

  $(passcheck).change(function() {
    if($(this).prop('checked')) {
      $(password).attr('type', 'text');
    } else {
      $(password).attr('type', 'password');
    }
  });
});

$(function ()
{
  $('.toggle_wish').on('click', function ()
  {
    song_id = $(this).attr("song_id");
    fav_song = $(this).attr("fav_song");
    click_button = $(this);

    $ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      //route.phpで指定したコントローラーのメソッドURLを指定
      url: '/fav_product',
      //GETかPOSTメソットを選択
      type: 'POST',
      //コントローラーに送るに名称をつけてデータを指定
      data: { 'song_id': song_id, 'fav_song': fav_song, },
    })
    .done(function (data)
    {
      if (data == 0)
      {
        click_button.attr("fav_song", "0");
        click_button.children().attr("class", "far far-heart");
      }
    })
    .fail(function (data)
    {
      alert('いいね処理失敗');
      alert(JSON.stringify(data));
    });
  });
});

// ajaxのチャットの処理内容
$(function() {
  get_data();
});

function get_data() {
  $.ajax({
    url: "/result/ajax/",
    dataType: "json",
    success: data => {
      $("#review-data")
        .find(".review-visible")
        .remove();

      for (let i = 0; i < data.reviews.length; i++) {
        let html = `
            <div class="media review-visible">
              <div class="media-body review-body">
                <div class="row">
                  <span class="review-body-user" id="first_name">${data.reviews[i].first_name}</span>
                  <span class="review-body-time" id="created_at">${data.reviews[i].created_at}</span>
                </div>
                  <span class="review-body-content" id="review">${data.reviews[i].review}</span>
              </div>
            </div>
          `;

        $("#review-data").append(html);
      }
    },
    error: () => {
      console.log("ajax Error");
    }
  });

  setTimeout("get_data()", 10000);
}
