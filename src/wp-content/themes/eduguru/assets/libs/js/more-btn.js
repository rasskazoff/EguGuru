jQuery(function ($) {

    if ($('.filter_items').height() <= $('.filter_wrap').height()){
        $('.filter .more_btn').hide();
    } else{
        $('.filter .more_btn').show();
    }
    
    i=0;
    $('.more_btn').on('change', moreToggle);
        function moreToggle(e) {
            
            let label = $(this).find('label');

            eval('show'+i+' = "'+label.text()+'"');
            i=+1;
            let hide =  'скрыть';

            if ($(label).attr('for') == 'filter_more'){
                wrap = $(this).closest('.filter').find('.filter_wrap');
            }else{
                wrap = $(this).closest('.card').find('.detail');
            }
            
            $(wrap).toggleClass('show');
            $(wrap).hasClass('show')?$(label).text(hide) : $(label).text(show0);
            
        }
    });