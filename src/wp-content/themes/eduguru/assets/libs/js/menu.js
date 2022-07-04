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
})