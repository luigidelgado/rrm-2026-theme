export default function(){
    const tabs = document.querySelectorAll('.timeline-box .tabs .tab');
    const details = document.querySelectorAll('.timeline-box .tab-content');
    const images = document.querySelectorAll('.tab-content-image');

    for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", () => {
            for (let j = 0; j < details.length; j++) {
                details[j].classList.remove("tab-content--active");
            }

            for (let k = 0; k < tabs.length; k++) {
                tabs[k].classList.remove("tab--active");
            }

            for (let l = 0; l < tabs.length; l++) {
                images[l].classList.remove("tab-content-image--active");
            }

            details[i].classList.add("tab-content--active");
            tabs[i].classList.add("tab--active");
            images[i].classList.add("tab-content-image--active");
        });
    }
}
    