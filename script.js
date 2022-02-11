const csvArea = document.querySelector("#csvArea");
const xmlArea = document.querySelector("#xmlArea");
const validTypes = ['text/xml', 'application/vnd.ms-excel']

//on the area
xmlArea.addEventListener("dragover", (evt)=>{
    evt.preventDefault();
    console.log("xmlArea");
    xmlArea.classList.add("drag-area-active");
})

csvArea.addEventListener("dragover", (evt)=>{
    evt.preventDefault();
    console.log("csvArea");
    csvArea.classList.add("drag-area-active");
})



//leaving the area
xmlArea.addEventListener("dragleave", (evt)=>{
    console.log("xmlArea left");
    xmlArea.classList.remove("drag-area-active");
})

csvArea.addEventListener("dragleave", (evt)=>{
    console.log("csvArea left");
    csvArea.classList.remove("drag-area-active");
})



//dropping file
xmlArea.addEventListener("drop", (evt)=>{
    evt.stopPropagation(); // Stops some browsers from redirecting.
    evt.preventDefault();
    console.log("dropped")

    let files = evt.dataTransfer.files;

    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        let type = file.type
        if(type !== validTypes[0]){
            alert(file.name + " Não é permitido nesse campo. Confira a extensão do arquivo e as permissões deste campo");
            console.log(files[i]);
            return;
        }
      

    }


    xmlArea.classList.remove("drag-area-active");

}, false);

csvArea.addEventListener("drop", (evt)=>{
    evt.stopPropagation(); // Stops some browsers from redirecting.
    evt.preventDefault();
    console.log("dropped")

    let files = evt.dataTransfer.files;
    console.log(files);

    
    console.log("dropped")
    csvArea.classList.remove("drag-area-active")

}, false);