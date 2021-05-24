// (function() {
//   'use strict';
//   // フラッシュメッセージのfadeout
//   $(function(){
//     $('.flash_message').fadeOut(3000);
//   });
// })();

// $(function() {
//   $('button').on('click', function() {
//     $(this).prop('disabled', true);
//     $('form').submit();
//   });
// });

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

  setTimeout("get_data()", 5000);
}
