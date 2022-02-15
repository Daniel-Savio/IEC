const btn = document.querySelector(".collapse-btn");
const ico = document.querySelector("#arrow");
const aside = document.querySelector(".asside");
const visual = document.querySelector(".visual");
const spans = document.querySelectorAll(".xml-item");

let idArray = [];

//Collapse
btn.addEventListener('click', function(){
    aside.classList.toggle("asside-closed");
    visual.classList.toggle("visual-full");
    if(aside.classList.contains("asside-closed")){
        ico.innerHTML = "navigate_next";
    }else{
        ico.innerHTML = "chevron_left";
    }
})

//Activating the slected data
for (let i = 0; i < spans.length; i++) {
    spans[i].addEventListener("click", function() {
    this.classList.toggle("active-item");
    if(this.classList.contains("active-item")){
        let id = this.querySelector("p").innerHTML;
        idArray.push(id);
       
    }else{
        let id = this.querySelector("p").innerHTML;
        console.log(id)
        for(let j = 0; j <idArray.length; j++){
            if(idArray[j] === id){
                idArray.splice(j, 1)
            }
        }
    }
    console.log(idArray);
    
  });
}