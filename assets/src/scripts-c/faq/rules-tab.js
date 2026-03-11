export default function(){
    const tabs = document.querySelectorAll('.rules__tabs .rule-tab');
    const details = document.querySelectorAll('.rule-info');

    /* Cada tab debe tener su infoormación correspondiente */
    if(tabs.length !== details.length) return;

    for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", () => {
            for (let j = 0; j < details.length; j++) {
                details[j].classList.remove("rule-info--active");
            }

            for (let k = 0; k < tabs.length; k++) {
                tabs[k].classList.remove("rule-tab--active");
            }

            details[i].classList.add("rule-info--active");
            tabs[i].classList.add("rule-tab--active");
        });
    }
}
    