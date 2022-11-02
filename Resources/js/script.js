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

function maskCpfCpnpj(inputCpfCnpj){
    
    inputCpfCnpj.value = 
        inputCpfCnpj.value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})/, '$1-$2')
            .replace(/(-\d{2})\d+?$/, '$1')


}

function validateEmail(inputEmail){

}