documento.getElementById("TIPO_DOC").addEventListener("keyup", getCodigos)

function getCodigos(){
    let inputCP = document.getElementById("TIPO_DOC").value
    let lista = document.getElementById("lista").value

    let url = "inc/getCodigos.php"
    let formData = new FormData()
    formData.append("TIPO_DOC", inputCP)

    fetch(url, {
        method: "POST",
        body: formData,
        mode: "cors"
    }).then (response => response.json())
    .then(data => {
        lista.style.display = 'block'
        lista.innerHTML = data
    })
    .catch(err => console.log(err))
}