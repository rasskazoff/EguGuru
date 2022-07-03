    show_btn = function each(el,show,hide){
        
        if (typeof el == 'string'){el = document.querySelector(el)}

        if (el.getAttribute('for') == 'filter_more'){
        wrap = el.closest('.filter').querySelector('.filter_wrap');
        }else{
        wrap = el.closest('.card').querySelector('.detail');
        }
        //console.log(wrap)
        wrap.classList.toggle('show')

        if( window.getComputedStyle(el,':before').transform == 'none' ){
            el.textContent = hide
        }else{
            el.textContent = show
        }
    }