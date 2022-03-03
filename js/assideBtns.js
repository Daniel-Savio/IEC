let modal = document.querySelector(".modal");
let toEletro = document.querySelector("#visualizar");
let closeBtn = document.querySelector("#close");
const comparar = document.querySelector("#comparar");

//Eltronorte
toEletro.addEventListener("click", ()=>{
    modal.style.display = "flex";    
});

closeBtn.addEventListener("click", ()=>{
    modal.style.display = "none";  
})

//Comparar
comparar.addEventListener("click", ()=>{
    
    let activeXmls = document.querySelectorAll(".active-item");
    console.log(activeXmls);
    if(activeXmls.length !== 2){
        alert("Selecione apenas 2 arquivos para serem comparados")
    }
    let xml1 = document.getElementById(activeXmls[0].innerText);
    let xml2 = document.getElementById(activeXmls[1].innerText);
    let ponto1 = activeXmls[0].innerText.length;
    
    console.log(activeXmls[0].innerText.length);
 

})