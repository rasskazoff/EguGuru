const tabsHeight = (() => {
	$('.tabs').height($('.tabs-wrap').height() + $('.active .children').height())
	console.log($('.tabs-wrap').height())
})

$=jQuery
$(document).ready(()=>{
//создаем категории на главной
	$('.cat-item a:not(".children a")').replaceWith(function(){
		return `<div class="tab">${$(this).text()}</div>`
	})
	//для пк
	if (innerWidth > 640){
		$('.tabs-wrap .cat-item:eq(0)').addClass('active')
		$('.tabs-wrap .tab').click((e)=>{
			$('.tabs-wrap .active').removeClass('active')
			$(e.target).parent().addClass('active')
			tabsHeight()
		})
		tabsHeight()
		//для мобильных
	}else{
		$('.tabs-wrap .tab').click((e)=>{
			if($(e.target).parent().hasClass('active')){
				$(e.target).parent().toggleClass('active')
			}else{
				$('.tabs-wrap .active').removeClass('active')
				$(e.target).parent().addClass('active')
			}
		})
	}

//навигация категорий
    const tabs = $('.tabs-wrap')
    const maxScroll = tabs.get(0).scrollWidth - tabs.get(0).clientWidth
    maxScroll > 0 ? $('.tabs-nav').show() : $('.tabs-nav').hide()
        
	$('.tabs-nav').click((e)=>{
		let step = 100

		if ($(e.target).hasClass('prev')){
			tabs.animate({scrollLeft: "-=" + step + "px"},200)
			setTimeout(() => {
				tabs.scrollLeft() <= (step / 2) ? $(e.target).removeClass('prev').addClass('next'):''
			}, 200)
		}else{
			tabs.animate({scrollLeft: "+=" + step + "px"},200)
			setTimeout(() => {
				tabs.scrollLeft() + (step / 2) >= maxScroll ? $(e.target).removeClass('next').addClass('prev'):''
			}, 200)
		}
	})

    //дроп скролл
    const slider = document.querySelector('.tabs-wrap')
    let isDown = false
    let startX
    let scrollLeft

    slider.addEventListener('mousedown', (e) => {
    isDown = true
    slider.classList.add('active')
    startX = e.pageX - slider.offsetLeft
    scrollLeft = slider.scrollLeft
    })
    slider.addEventListener('mouseleave', () => {
    isDown = false
    slider.classList.remove('active')
    })
    slider.addEventListener('mouseup', () => {
    isDown = false
    slider.classList.remove('active')
    })
    slider.addEventListener('mousemove', (e) => {
    if(!isDown) return
    e.preventDefault()
    const x = e.pageX - slider.offsetLeft
    const walk = (x - startX) * 3 //scroll-fast
    slider.scrollLeft = scrollLeft - walk
    })
})