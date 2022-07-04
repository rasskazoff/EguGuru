jQuery(function ($) {
    current_page = 1;
    $(".btn--load").on("click", function () {
        const button = $(this);
        button.find('.loadmore').text("Загрузка...");

        let left = $('.quantity_results').text().replace(/[^0-9]/g,"") - $('.card_wrap').length;
        let posts = 10;
    
        if (left < posts){ posts = left };

        const data = {
            "action": "load_more",
            "page": current_page+1,
            "posts": posts
        }
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    button.find('.loadmore').text("показать больше");
                    button.prev('.cards.container').append(data);
                    current_page++;
                    fixHeight();
                    if (current_page == button.attr("data-max-pages")) {
                        button.hide();
                    }
                } else {
                    button.hide();
                }
            }
        });
    });
});