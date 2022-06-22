jQuery(function ($) {
    //Получаем параметр в url
    $.urlParam = function (name) {
        const results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.search);
        return (results !== null) ? results[1] || 0 : false;
    }
    
    let params = $.urlParam('tags');
    if (params){
        //берем все параметры tags и разделяем
        paramsTags = params.replaceAll('%20','+').split('+');
        
        //перебираем теги и делаем отмеченными  
        for(i=0; i<paramsTags.length; i++){
            $('.filter_item input[name="'+paramsTags[i]+'"]').attr('checked', true);
        }
    }
    //при клике по тегу меняем url
    $('.filter_item input').on('change',function(){
        current_page = 1;

        let tag = '.filter_item input:checked';
        tags = '';
        if ($(tag).length > 0){
            for (i=0; $(tag).length > i; i++){
                tags+= $(tag+':eq('+i+')').attr('name')+'+';
            }
            tags = 'tags='+tags.slice(0,-1);
        }
        history.pushState(null, null, '?'+tags);

        $.urlParam('tags')?tags = $.urlParam('tags'): tags = '';
//ajax
        const posts = 2;

        const button = $(".btn--load");
        const data = {
            "action": "load_more",
            "page": 1,
            "tags": tags,
            "posts": posts,
            "filter": true
        }
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    $('.cards.container').find('.card_wrap').remove();
                    $('.cards.container').append(data);
                } else {
                    button.hide();
                }
            }
        });
    })
})
