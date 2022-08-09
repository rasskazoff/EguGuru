$(document).ready(()=>{
    let perView = 5
	let grid = 2
	if(innerWidth <= 1200){
		perView = 4
	}
	if(innerWidth <= 760){
		perView = 3
	}
	if(innerWidth <= 640){
		perView = 3
		grid = 1
	}
	if(innerWidth <= 540){
		perView = 2
		grid = 1
	}
    if($('.swiper-slide').length < perView){
        grid = 1
    }

      var swiper = new Swiper(".slider", {
        slidesPerView: perView,
        grid: {
          rows: grid,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
		navigation: {
          nextEl: ".slider-next",
          prevEl: ".slider-prev",
        },
      });
})