function userValidation(){
    nameregex=/[A-Za-z]/;
    userName=document.getElementById('name').value;
    if(nameregex.test(userName)==0){
        document.getElementById('pl').style.color='red';
        document.getElementById('pl').innerHTML='Please enter letters incude lower or upper case ';
    }else{
        document.getElementById('pl').style.color='green';
        document.getElementById('pl').innerHTML='correct';
    }
}

function passValidation(){
    myPass= document.getElementById('pass').value;
    regex= /[A-Za-z]/;
    if(regex.test(myPass)==0){
        document.getElementById('passv').style.color='red';
        document.getElementById('passv').innerHTML='Please include letters in lower or upper case';
    }else{
        document.getElementById('passv').style.color='green';
        document.getElementById('passv').innerHTML='✓✓'
    }

}

