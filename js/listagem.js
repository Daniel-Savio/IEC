const btn = document.querySelector(".collapse-btn");
const ico = document.querySelector("#arrow");
const aside = document.querySelector(".asside");
const visual = document.querySelector(".visual");
const spanList = document.querySelector(".span-list");

let dataArray

const xmlList = fetch("api/listagem.php")
  .then((response)=>response.json())
  .then((data)=>{ 
    return data
  });
  
const printData = async()=>{
  const a = await xmlList;
  a.forEach(data => {
    let span = document.createElement("span");
    let strong = document.createElement("strong");
    span.innerText=data.xml_file_name;
    span.classList.add('xml-item');
    strong.innerText = data.created_at;
    span.appendChild(strong);
    spanList.appendChild(span);
  });
};
//Collapse
btn.addEventListener("click", function () {
  aside.classList.toggle("asside-closed");
  visual.classList.toggle("visual-full");
  if (aside.classList.contains("asside-closed")) {
    ico.innerHTML = "navigate_next";
  } else {
    ico.innerHTML = "chevron_left";
  }
});



function sendId(id) {
  const XHR = new XMLHttpRequest();
  let FD = new FormData();

  // Push our data into our FormData object
  FD.append("id", id);

  // Define what happens on successful data submission
  XHR.addEventListener("load", function (event) {
    //   alert( 'Yeah! Data sent and response loaded.' );
  });

  // Define what happens in case of error
  XHR.addEventListener(" error", function (event) {
    alert("Oops! Something went wrong.");
  });
  // Set up our request
  XHR.open("POST", "http://localhost/IEC/listagem.php");
  // Send our FormData object; HTTP headers are set automatically
  XHR.send(FD);
}

printData();
