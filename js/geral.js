let logo = document.querySelector(".logo");

logo.addEventListener("click", ()=>{
    console.log("click")
    window.location.href = "index.html";
})

let tableLine = document.querySelectorAll(".table-line");
console.log(tableLine);
let i=0
tableLine.forEach((line)=>{
    if(i%2){
        line.classList.add("grey");
    }
    i++;
})
