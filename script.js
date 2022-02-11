const csvArea = document.querySelector("#csvArea");
const xmlArea = document.querySelector("#xmlArea");
const validTypes = ['text/xml', 'application/vnd.ms-excel']
const submit = document.querySelector(".upload_btn");

let filesXML=[];
let filesCSV=[];

//on the area
//xml
xmlArea.addEventListener("dragover", (evt)=>{
    evt.preventDefault();
    console.log("xmlArea");
    xmlArea.classList.add("drag-area-active");
})
//csv
csvArea.addEventListener("dragover", (evt)=>{
    evt.preventDefault();
    console.log("csvArea");
    csvArea.classList.add("drag-area-active");
})


//leaving the area
//xml
xmlArea.addEventListener("dragleave", (evt)=>{
    console.log("xmlArea left");
    xmlArea.classList.remove("drag-area-active");
})
//csv
csvArea.addEventListener("dragleave", (evt)=>{
    console.log("csvArea left");
    csvArea.classList.remove("drag-area-active");
})

//dropping file
//xml
xmlArea.addEventListener("drop", (evt)=>{
    evt.stopPropagation(); // Stops some browsers from redirecting.
    evt.preventDefault();
    console.log("dropped")

     filesXML = evt.dataTransfer.files;

    for (let i = 0; i < filesXML.length; i++) {
        let file = filesXML[i];
        let type = file.type
        
        let span = document.createElement('span');
        span.innerHTML = file.name;
        xmlArea.appendChild(span);

        if(type !== validTypes[0]){
            alert(file.name + " - Não é permitido nesse campo. Confira a extensão do arquivo e as permissões deste campo");
            document.location.reload(true);
            return;
        }
    }

    xmlArea.classList.remove("drag-area-active");

}, false);
//csv
csvArea.addEventListener("drop", (evt)=>{
    evt.stopPropagation(); // Stops some browsers from redirecting.
    evt.preventDefault();
    console.log("dropped")

     filesCSV = evt.dataTransfer.files;

    for (let i = 0; i < filesCSV.length; i++) {
        let file = filesCSV[i];
        let type = file.type
        console.log(filesCSV[i]);

        if(type !== validTypes[1]){
            alert(file.name + " - Não é permitido nesse campo. Confira a extensão do arquivo e as permissões deste campo");
            document.location.reload(true);
            return;
        }
    
    }
    
    console.log("dropped in csv area")
    csvArea.classList.remove("drag-area-active")

}, false);


function sendXML( xml ) 
{
    const XHR = new XMLHttpRequest()
    const FD  = new FormData(document.querySelector("form"));


    // Push our data into our FormData object
       
    FD.append( "xml", xml)
    
     
    // Define what happens on successful data submission
    XHR.addEventListener( 'load', function( event ) {
      alert( 'Yeah! Data sent and response loaded.' );
    });
  
    // Define what happens in case of error
    XHR.addEventListener(' error', function( event ) {
      alert( 'Oops! Something went wrong.' );
    });
    // Set up our request
    XHR.open( 'POST', 'http://localhost/IEC/bdd.php' );
    // Send our FormData object; HTTP headers are set automatically
    XHR.send( FD );
}
function sendCSV( csv ) 
{
const XHR = new XMLHttpRequest()
const FD  = new FormData(document.querySelector("form"));

// Push our data into our FormData object
FD.append( "csv", csv)

// Define what happens on successful data submission
XHR.addEventListener( 'load', function( event ) {
    alert( 'Yeah! Data sent and response loaded.' );
});

// Define what happens in case of error
XHR.addEventListener(' error', function( event ) {
    alert( 'Oops! Something went wrong.' );
});

// Set up our request
XHR.open( 'POST', 'http://localhost/IEC/bdd.php' );

// Send our FormData object; HTTP headers are set automatically
XHR.send( FD );
}
  
submit.addEventListener("click",(evt)=>{
    evt.preventDefault();
    console.log('click')
    console.log(filesXML.length);
    if(!filesCSV.length && !filesXML.length){
        alert("Pls insert some data")
    }
    if(filesXML.length){
        for (let i = 0; i < filesXML.length; i++) {
            let file = filesXML[i];
            sendXML(file);
        }
    }

    if(filesCSV.length){
        for (let i = 0; i < filesCSV.length; i++) {
            let file = filesCSV[i];
            sendXML(file);
        }
    }
    
    
})