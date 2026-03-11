export default function(){

    let labelNames = document.querySelectorAll('.rrm.register .pmrow label');
    let inputElement = document.querySelectorAll('.rrm.register .pmrow input');
    //console.log(labelNames);
    let textLabel = [];
    labelNames.forEach(item => textLabel.push(item.textContent) );
    //console.log(textLabel);
    inputElement.forEach( (item, index) => {
        //console.log(item,index);
        //console.log(item.getAttribute('id'));
        let iconEl = document.createElement("i");
        if(item.getAttribute('id') === "user_login"){
            iconEl.classList.add('icon-account_circle')
        }
        if(item.getAttribute('id') === "user_email"){
            iconEl.classList.add('icon-mail')
        }
        if(item.getAttribute('id') === "user_pass" || item.getAttribute('id') === "confirm_pass"){
            iconEl.classList.add('icon-lock')
        }
        item.after(iconEl);
        item.placeholder = textLabel[index];
    });
}