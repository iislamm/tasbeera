$(document).ready(function() {
    $(".dialog-header > button, .side-pane-header > button").click(function() {
        $($(this).parents()[3]).fadeOut({ duration: 100 });
    })
    
    $(".dialog-toggle").click(function() {
        var targetDialogID = $(this).attr("for")
        $(`#${targetDialogID}`).fadeIn({ duration: 100 });
    })

     $('.cart-item .delete').click(function() {
        $($(this).parents()[1]).fadeOut({ duration: 200 })
     })
     
     $('.collapsible').click(function() {
         $(this).toggleClass("active");
         var content = $(this).parent().next('.order-content')
         
         if (content.css('display') === "block") {
           content.css('display', "none");
         } else {
             content.css('display', "block");
         }
     })

     $('.filter').click(function() {
        filter = $(this).attr('name')
        checked = $(this).is(":checked")
        items = $('.list-item')
        switch (filter) {
            case 'delivery':
                for (var i = 0; i < items.length; i++) {
                    var delivery_element = $(items[i]).find('.delivery')[0]
                    var delivery_text = $(delivery_element).text()
                    var deliverySpeed = Number(delivery_text.match(/\d\d/)[0])
                    if (deliverySpeed > 30) {
                        if (checked) {
                            $(items[i]).hide()
                        } else {
                            $(items[i]).show()
                        }
                    }

                }
                break;
            case 'rate': 
                for (var i = 0; i < items.length; i++) {
                    var rate_element = $(items[i]).find('.rate')[0]
                    var rate_text = $(rate_element).text()
                    var rate = Number(rate_text.match(/\d\.\d/)[0])
                    if (rate < 3) {
                        if (checked) {
                            $(items[i]).hide()
                        } else {
                            $(items[i]).show()
                        }
                    }

                }
                break;
            default: // category filter
                var category = filter
                for (var i = 0; i < items.length; i++) {
                    var category_element = $(items[i]).find('.categories')[0]
                    var category_text = $(category_element).text().toLowerCase()
                    var category_match = category_text.match(new RegExp(category))
                    if (!category_match) {
                        if (checked) {
                            $(items[i]).hide()
                        } else {
                            $(items[i]).show()
                        }
                    }

                }

        }
     })
})


/************** Form Validation **************/
const form = document.getElementById('form');
const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const category1 = document.getElementById('category1');
const category2 = document.getElementById('category2');
const category3 = document.getElementById('category3');
var area = document.getElementsByClassName('area');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs(){
    const namevalue = name.value.trim();
    const emailvalue = email.value.trim();
    const passwordvalue = password.value.trim();
    const password2value = password2.value.trim();
    const category1value = category1.value;
    const category2value = category2.value;
    const category3value = category3.value;
    const area1value = area.value;

    if(namevalue === ''){
        //add error message
        //add error class
        SetError(name, 'name can not be empty');
    }else{
        //add success class
        SetSuccess(name);
    }
    if(emailvalue === ''){
        //add error message
        //add error class
        SetError(email, 'email can not be empty');
    }else if(!isEmail(emailvalue)){
        //add success class
        SetError(email, 'email is not valid');
    }else{
        SetSuccess(email);
    }
    if(passwordvalue === ''){
        //add error message
        //add error class
        SetError(password, 'password can not be empty');
    }else if(!isPassword(passwordvalue)){
        SetError(password, 'password must contain Minimum eight characters, at least one letter and one number')
    }
    else{
        SetSuccess(password);
    }
    if(password2value === ''){
        //add error message
        //add error class
        SetError(password2, 'password can not be empty');
    }else if(passwordvalue !== password2value){
        //add success class
        SetError(password2, 'the two passwords are not matched ');
    }else{
        SetSuccess(password2);
    }
    if(category1value == '0'){
        SetError(category1, 'the category can not be empty ');
        
    }else{
        SetSuccess(category1);
    }
     if(category2value == '0'){
        SetError(category2, 'the category can not be empty ');
        
    }else{
        SetSuccess(category2);
    }
     if(category3value == '0'){
        SetError(category3, 'the category can not be empty ');
        
    }else{
        SetSuccess(category3);
    }
    if(area1value == '0'){
        SetError(area, 'the area can not be empty ');
        
    }else{
        SetSuccess(area);
    }
}

function SetError(input, message){
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');

    //add error message inside samll
    small.innerText = message;

    //add error classes
    formGroup.className = 'form-group error';
}

function SetSuccess(input){
    const formGroup = input.parentElement;
    
    formGroup.className = 'form-group success';
}

function isEmail(email){
    	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function isPassword(password){
    return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password);
}

const addselect = document.getElementById('addSelect');

addselect.addEventListener("click",(e)=>{
    var newselect = document.createElement('select');
    newselect.className = ('custom-select area');
    newselect.innerHTML = "<option value = '0'>Select</option>,<option value = '1'>......</option>,<option value = '2'>......</option>";
    $("#area").append(newselect);
   
});

function isprice(price) {
    return /^([0-9])\w+/.test(price);
}