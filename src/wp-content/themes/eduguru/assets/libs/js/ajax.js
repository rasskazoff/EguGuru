$=jQuery
    //Отображение кнопки параметров
    filterVissible = function(){ 

        if ($('.filter_items').height() > 130){
            $('.filter .more_btn').addClass('show');
        }else{
            $('.filter .more_btn').removeClass('show');
        }
    }

    //Получаем параметр в url
    $.urlParam = function (name) {
        results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.search);
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
    //Получаем отмеченные теги
    getTags = ()=>{
        tag = '.filter_item input:checked';
        tags = '';
        if ($(tag).length > 0){
            for (i=0; $(tag).length > i; i++){
                tags+= $(tag+':eq('+i+')').attr('name')+'+';
            }
            tags = 'tags='+tags.slice(0,-1);
        }
    }
    getTags()

document.addEventListener('DOMContentLoaded', ()=>{
      //more-load-btn
    button = document.querySelector('.btn--load')
    posts = Number(button.dataset.posts)
    current_page = Number(button.dataset.currentPage)
    
    max_pages = Number(button.dataset.maxPages)
    cat_id = button.dataset.categoryId
    button_load = button.querySelector('.loadmore')
    cards = button.closest('.cards_wrap').querySelector('.cards')

    max_pages<=1?$(button).hide():''

    $(button).on("click", function () {
        max_pages = Number(button.dataset.maxPages)
        

        button_load.innerText = ("Загрузка...")
        data = {
            "action": "load_more",
            "page": current_page+1,
            "posts": posts,

            "cat_id": cat_id,
        }
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    button_load.innerText = ("показать больше")
                    $(cards).append(data);
                    current_page++;
                    fixHeight();
                    if (current_page == max_pages) {
                        $(button).hide();
                    }
                } else {
                    $(button).hide();
                }
            }
        })
    })

    //при клике по тегу меняем url
    $('.filter_item input').on('change',function(){
        current_page = 1
        getTags()
        tags == ''?history.pushState(null, null, location.pathname):history.pushState(null, null, '?'+tags)
        $.urlParam('tags')?tags = $.urlParam('tags'): tags = ''
//ajax
        data = {
            "action": "load_more",
            "page": current_page,
            "tags": tags,
            "posts": posts,
            "filter": true,
            "cat_id": cat_id
        }
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    $(cards).find('.card_wrap').remove()
                    $(cards).append(data)
                } else {
                    $(button).hide();
                }
            }
        });
        filterVissible()
    })   
})

setPostAjax = (count, max_num_pages)=>{
    jQuery(function ($) {
        $(".quantity_results").text(count)
        $(button).attr("data-max-pages",max_num_pages)
        max_num_pages <= 1?$(button).hide():$(button).show()
        $("#ajax-add-script").remove()
    })
}