jQuery(function ($) {
    $('.more_btn').on('change', moreToggle);
        function moreToggle(e) {

            let label = $(this).find('label');

            let hide =  'скрыть'
            if($(label).attr('for') == 'filter_more'){
                show = 'показать больше параметров';
                wrap = $(this).closest('.filter').find('.filter_items');
            }else{
                show = 'показать больше';
                wrap = $(this).closest('.card').find('.detail');
            }
            
            $(wrap).toggleClass('show')?$(label).text(hide) : $(label).text(show);
        }
    });