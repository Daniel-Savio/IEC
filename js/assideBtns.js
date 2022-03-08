let modal = document.querySelector(".modal");
const toEletro = document.querySelector("#visualizar");
const closeBtn = document.querySelector("#close");
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
    let array1 = [];
    let array2 = [];
    
    let activeXmls = document.querySelectorAll(".active-item");
    console.log(activeXmls);
    if(activeXmls.length !== 2){
        alert("Selecione apenas 2 arquivos para serem comparados")
        return;
    }
    
    let id1 = activeXmls[0].innerText.substring(0, activeXmls[0].innerText.length -19);
    let id2 = activeXmls[1].innerText.substring(0, activeXmls[1].innerText.length -19);
    
    
    console.log(`${id1}`);
    console.log(`${id2}`);
    let table1 = document.getElementById(id1.trim());
    let table2 = document.getElementById(id2.trim());
   
    let colunas1 = table1.querySelectorAll("td");
    let colunas2 = table2.querySelectorAll("td");
    let i=1;

    colunas1.forEach((coluna)=>{
        i++
        //console.log(i%5);
        if(i%5 == 1){
            array1.push(coluna);

        }
    })
    colunas2.forEach((coluna)=>{
        i++
        //console.log(i%5);
        if(i%5 == 1){
            array2.push(coluna);

        }
    })
    //console.log(array1);
    //console.log(array2);

    for(let i=0; i<array1.length;i++){
        if(array1[i].innerText === array2[i].innerText){
            console.log(array1[i].innerText);
            array1[i].classList.toggle("high-light");
            array2[i].classList.toggle("high-light");

        }
    }
    
    
})