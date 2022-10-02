function userValidation(){
    nameregex=/[A-Za-z]{6,}/;
    userName=document.getElementById('name').value;
    if(nameregex.test(userName)==0){
        document.getElementById('pl').style.color='red';
        document.getElementById('pl').innerHTML='Please enter at least 6 letters including this first lower or upper case ';
        return false;
    }else{
        document.getElementById('pl').style.color='green';
        document.getElementById('pl').innerHTML='correct';
        return true;
    }
}

function passValidation(){
    myPass= document.getElementById('pass').value;
    regex= /[A-Za-z]/;
    if(regex.test(myPass)==0){
        document.getElementById('passv').style.color='red';
        document.getElementById('passv').innerHTML='Please include letters in lower or upper case';
        return false;
    }else{
        document.getElementById('passv').style.color='green';
        document.getElementById('passv').innerHTML='✓✓'
        return true;
    }

}

document.getElementById("register").onsubmit = function() {
    if(userValidation()===false || passValidation()===false){
        return false;
    }
    return true;
}


