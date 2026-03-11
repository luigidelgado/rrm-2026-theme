// $('.minus').click(function () {
//     var $input = $(this).parent().find('input');
//     var count = parseInt($input.val()) - 1;
//     count = count < 1 ? 1 : count;
//     $input.val(count);
//     $input.change();
//     return false;
// });

export default function(){

    const cartForm = document.querySelector(".entry-summary .cart");

    if (typeof(cartForm) === 'undefined' || cartForm === null) return;

    let maxQuantity;
    if (document.querySelector(".quantity .qty")) {
        maxQuantity = document.querySelector(".quantity .qty").getAttribute("max");
    }
    //console.log(maxQuantity);
    let count = 0;
    let addRemoveItems = function(e,action){
        let inputQuantity;
        
        let quantityWarn =  document.querySelector('.quantity-warning');
        if (typeof(quantityWarn) !== 'undefined' && quantityWarn !== null) quantityWarn.remove();
        
        if(action === "remove"){
            inputQuantity = e.nextElementSibling;
            if(inputQuantity.value === "") inputQuantity.value = 0;
            count = parseInt(inputQuantity.value) - 1;
        }
        if(action === "add"){ 
            inputQuantity = e.previousElementSibling;
            if(inputQuantity.value === "") inputQuantity.value = 0;
            count = parseInt(inputQuantity.value) + 1;
        }
        //console.log("count",count);
        count = count < 1 ? 0 : count;
        let wrapperSingleButton = document.querySelector(".wrapper-single-buttons");
        let quantityWarning = document.createElement("div");
        if(maxQuantity !== undefined && maxQuantity !== null && maxQuantity !== "" && maxQuantity > 0){
            if(count > Number(maxQuantity)) {    
                quantityWarning.classList.add("quantity-warning");
                quantityWarning.innerText = "No se pueden agregar más productos";
                wrapperSingleButton.before(quantityWarning);
                return;
            } 
        }
      
        inputQuantity.value = count;
    };

    cartForm.addEventListener("click",function(e){
        if(e.target.tagName === "I"){
            if(e.target.classList.contains("icon-less")) addRemoveItems(e.target.parentNode,"remove");
            if(e.target.classList.contains("icon-add-fill")) addRemoveItems(e.target.parentNode,"add");
            return;
        }
        if(e.target.classList.contains("minus")) addRemoveItems(e.target,"remove");
        if(e.target.classList.contains("plus")) addRemoveItems(e.target,"add");
    },true);
    
}

