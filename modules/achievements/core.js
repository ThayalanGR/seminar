
 const contentRef = document.getElementById('content')
 const disRef = document.getElementById('dis')

function grabValues() {
    const content = contentRef.value
    const disporder   = disRef.value
    const id1 = localStorage.getItem('token')
    console.log(content,disporder,id1)
    url = `http://localhost/seminar/restapi/achieve/achieve.php?content=${content}&disporder=${disporder}&userid=${id1}`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
    })
}