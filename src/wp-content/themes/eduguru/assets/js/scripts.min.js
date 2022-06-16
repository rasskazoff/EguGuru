document.addEventListener("DOMContentLoaded", function(event) {
    console.log("DOM fully loaded and parsed");
  });

document.querySelectorAll(".more_btn").forEach(moreBtn => { moreBtn.addEventListener('change', moreToggle) })
    function moreToggle(e) {
        console.log('asd');

        card = this.closest('.card');
        card.querySelector('.detail').classList.toggle('vissible');
        }