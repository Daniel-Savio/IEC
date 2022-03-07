const btn = document.querySelector(".collapse-btn");
const ico = document.querySelector("#arrow");
const aside = document.querySelector(".asside");
const visual = document.querySelector(".visual");
const spans = document.querySelectorAll(".xml-item");
const warning = document.querySelector(".warning");
const xmls = document.querySelector(".xml-list");


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
        let fullName = this.innerText;
        let pos = fullName.indexOf(".")+4
        let name = fullName.substring(0,pos);
        let table = document.getElementById(name);
        console.log(name);
        console.log(table);
        table.classList.add("hidden-table")
          
    }else{
        i++;
        let fullName = this.innerText;
        let pos = fullName.indexOf(".")+4;
        let name = fullName.substring(0,pos);
        let table = document.getElementById(name);
        table.classList.remove("hidden-table");
    
        
    }
    
    
  });
}