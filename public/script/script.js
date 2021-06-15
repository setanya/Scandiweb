"use strict";
console.log("bbb");
document.getElementById("optionSize").style.display='none';
document.getElementById("optionWeight").style.display='none';
document.getElementById("optionDimension").style.display='none';

let showHideDiv=function(selectField){
    let divOptionSize=document.getElementById("optionSize");
    let divOptionWeight=document.getElementById("optionWeight");
    let divOptionDimension=document.getElementById("optionDimension");

    if (selectField.value=='Size')
    divOptionSize.style.display='block';
    if (selectField.value=='Weight')
    divOptionWeight.style.display='block';
    if (selectField.value=='Dimension')
    divOptionDimension.style.display='block';
    if (selectField.value!='Size')
    divOptionSize.style.display='none';
    if (selectField.value!='Weight')
    divOptionWeight.style.display='none';

}


