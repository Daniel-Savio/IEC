let xmlArray;

let xmlFiles = fetch("http://localhost/IEC/api/listagem.php")
                .then(response =>response.json())
                .then((data) => {JSON.parse(data)});

console.log(xmlArray);

const asside = document.querySelector(".aside")
