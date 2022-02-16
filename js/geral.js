let logo = document.querySelector(".logo");
console.log(logo);
logo.addEventListener("click", ()=>{
    console.log("click")
    window.location.href = "index.html";
})