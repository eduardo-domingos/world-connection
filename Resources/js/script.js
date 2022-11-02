"use strict";

function maskPhone(inputPhone){
    
    inputPhone.value = 
        inputPhone.value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1)$2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(-\d{4})\d+?$/, '$1');
}

function maskCpf(inputCpf){
    
    inputCpf.value = 
        inputCpf.value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')

}

function maskCnpj(inputCnpj){
    
    inputCnpj.value = 
        inputCnpj.value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')

}

function typePerson(inputTypePerson){

    let divCnpj = document.getElementById('div-cnpj');
    let divCpf = document.getElementById('div-cpf');

    if(inputTypePerson.value === "CNPJ"){
        divCnpj.removeAttribute("hidden");
        divCpf.setAttribute("hidden", "hidden");
    }else{
        divCpf.removeAttribute("hidden");
        divCnpj.setAttribute("hidden","hidden");
    }

}