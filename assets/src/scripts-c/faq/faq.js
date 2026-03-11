export default function(){
    const boxes = document.querySelectorAll(".faq-box");

    function toggleBoxes(e){
        e.stopPropagation();
        e.target.closest('.faq-box').classList.toggle("active");
    }

    boxes.forEach(box => box.addEventListener('click', toggleBoxes));

    const items = document.querySelectorAll(".accordion button");
    //console.log(items);
    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');
        
        for (let i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }
        
        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));

}