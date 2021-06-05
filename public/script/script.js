"use strict";

document.getElementById("optionSize").style.display='none';  
document.getElementById("optionWeight").style.display='none'; 
document.getElementById("optionDimension").style.display='none'; 

let showHideDiv=function(selectField){
    let divOptionSize=document.getElementById("optionSize");
    let divOptionWeight=document.getElementById("optionWeight");
    let divOptionDimension=document.getElementById("optionDimension");

    if (selectField.value=='1')
    divOptionSize.style.display='block';
    if (selectField.value=='2')
    divOptionWeight.style.display='block';
    if (selectField.value=='3')
    divOptionDimension.style.display='block';
    if (selectField.value!='1')
    divOptionSize.style.display='none';
    if (selectField.value!='2')
    divOptionWeight.style.display='none';

}


