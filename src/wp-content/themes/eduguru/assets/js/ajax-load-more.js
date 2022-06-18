jQuery(function ($) {
    $(".btn--load").on("click", function () {
        const button = $(this);
        button.find('.loadmore').text("Загрузка...");

        const data = {
            "action": "load_more",
            "query": button.data("param-posts"),
            "page": current_page,
            "tpl": button.data("tpl")
        }
        console.log(data);
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: data,
            type: "POST",
            success: function (data) {
                console.log(data);
                if (data) {
                    button.find('.loadmore').text("показать больше");
                    button.prev('.cards.container').append(data);
                    current_page++;
                    if (current_page == button.attr("data-max-pages")) {
                        button.remove();
                        console.log('ok');
                    }
                } else {
                    //button.remove();
                    console.log('else');
                }
            }
        });
    });
});