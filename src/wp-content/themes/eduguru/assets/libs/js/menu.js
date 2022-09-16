jQuery(function ($) {
    $('#burger').on('change',function(){
        $('body').toggleClass('hidden')
    })

    $('.menu-item-has-children').click(function(e){
        
        e.stopPropagation()
        if (innerWidth<=960){
            if (!$(this).hasClass('already-clicked')) {
                $(this).addClass('already-clicked')
                e.preventDefault();
            }
        }

        $(this).toggleClass('active')
    })

    if (innerWidth > 960){
        $('.menu>.menu-item-has-children .sub-menu .menu-item-has-children').mouseenter(function(){
            let subMenu = $(this).find('>.sub-menu')
            let subMenuPos = subMenu.offset().left + subMenu.outerWidth() 
        
            if (innerWidth < subMenuPos){
                $(subMenu).attr('style', 'left:'+(subMenu.position().left+(innerWidth-subMenuPos))+'px; top: 90%;')
            }else{
                $(subMenu).attr('style')
            }
        })
    }
})