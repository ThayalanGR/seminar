
const disRef = document.getElementById('dis')

$(document).ready(function() {
    const unameRef = document.getElementById('uname')
    unameRef.innerHTML = localStorage.getItem('uname')
})


function grabAOF() {

    
    const sel = document.getElementById("aof");
    const value = sel.options[sel.selectedIndex].value;
    const text = sel.options[sel.selectedIndex].text;
    const disporder = disRef.value
    const id1 = localStorage.getItem('token')
    console.log(text,disporder,id1)
    url = `http://localhost/seminar/restapi/areaofin/areaofin.php?aof=${text}&dis=${disporder}&userid=${id1}`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
    })
}