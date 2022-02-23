let modal = document.querySelector(".modal");
let toEletro = document.querySelector("#visualizar");
let closeBtn = document.querySelector("#close");
let activeXmls = document.querySelectorAll(".active-item");

toEletro.addEventListener("click", ()=>{
    modal.style.display = "flex";    
});

closeBtn.addEventListener("click", ()=>{
    modal.style.display = "none";  
})

activeXmls.forEach((item)=>{
    console.log(item);
    xmls.appendChild(item);
})