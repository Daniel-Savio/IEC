const btn = document.querySelector(".collapse-btn");
const ico = document.querySelector("#arrow");
const aside = document.querySelector(".asside");
const visual = document.querySelector(".visual");
const spans = document.querySelectorAll(".xml-item");
const warning = document.querySelector(".warning");
const xmls = document.querySelector(".xml-list");
const saveBtns = document.querySelectorAll(".file-save");
const loader = document.querySelector(".loader-wrapper");
const converter = document.querySelector("#converter");
let arr = [];
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


function sendInfo( info, name ) 
{
    const XHR = new XMLHttpRequest()
    const FD  = new FormData(document.querySelector("form"));

    // Push our data into our FormData object
    FD.append( "info", info)
    FD.append( "name", name)
    
    // Define what happens on successful data submission
    XHR.addEventListener( 'load', function( event ) {
        loader.style.display = "none";
        //document.location.reload(true);
    });
  
    // Define what happens in case of error
    XHR.addEventListener(' error', function( event ) {
      alert( 'Oops! Something went wrong.' );
    });
    // Set up our request
    XHR.open( 'POST', 'http://localhost/IEC/api/save.php' );
    // Send our FormData object; HTTP headers are set automatically
    XHR.send( FD );
}
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

//salvar tabela
saveBtns.forEach((saveBtn)=>{
 
    saveBtn.addEventListener("click", (e)=>{
        let tableName = saveBtn.parentNode.querySelector(".table-name");
        let table = tableName.parentNode.parentNode.parentNode;
        let celulas = table.querySelectorAll("td");
        
        for (let i = 0; i < celulas.length; i++) {
            const celula = celulas[i];
            arr.push(celula.innerText);
        }
        //console.log(arr);
        loader.querySelector("p").innerText = "Documentos grandes podem levar cerca de 2 min para serem salvos";
        loader.style.display = "flex";
        sendInfo(JSON.stringify({arr}), tableName.innerText);
        
    })
})

converter.addEventListener('click', ()=>{
   loader.style.display = "flex";
})
    
