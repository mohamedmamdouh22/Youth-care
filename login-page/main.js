function userValidation(){
    nameregex=/[A-Za-z0-9]{6,}/;
    userName=document.getElementById('name').value;
    if(nameregex.test(userName)==0){
        document.getElementById('pl').style.color='red';
        document.getElementById('pl').innerHTML='Please enter at least 6';
        return false;
    }else{
        document.getElementById('pl').style.color='green';
        document.getElementById('pl').innerHTML='correct';
        return true;
    }
}

function passValidation(){
    myPass= document.getElementById('pass').value;
    regex= /^[a-zA-Z0-9!#$%&@]{8,}$/;
    if(regex.test(myPass)==0){
        document.getElementById('passv').style.color='red';
        document.getElementById('passv').innerHTML='Required(more than 8)';
        return false;
    }else{
        document.getElementById('passv').style.color='green';
        document.getElementById('passv').innerHTML='✓✓'
        return true;
    }

}


function unCorrect(){
    if(userValidation()===false || passValidation()===false){
        
        document.getElementById('pass').value="";
        return false;
    }
}

