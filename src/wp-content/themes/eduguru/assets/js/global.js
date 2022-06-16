    document.querySelectorAll(".more_btn").forEach(moreBtn => { moreBtn.addEventListener('change', moreToggle) })
    function moreToggle(e) {

        let label = this.querySelector('label')

        let hide =  'скрыть'
        if(label.getAttribute('for') == 'filter_more'){
            show = 'показать больше параметров'
            wrap = this.closest('.filter').querySelector('.filter_items')
        }else{
            show = 'показать больше'
            wrap = this.closest('.card').querySelector('.detail')
        }
        
        wrap.classList.toggle('show')?label.textContent = hide : label.textContent = show
        console.log(label.textContent)
    }