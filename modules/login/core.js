console.log(localStorage.getItem('baseUrl'))
 

const textRef = document.getElementById('staffid')
const passRef = document.getElementById('password')
const notifyContentRef = document.getElementById('notifyContent')
const notifyCloseRef = document.getElementById('notifyCloseButton')

function parseValidationResult(result) {


    if(result.response[0].oAuth){
        localStorage.setItem('token', result.response[0].token)
        localStorage.setItem("uname" , result.response[0].uname)
        localStorage.setItem("initial",  result.response[0].initial)
        localStorage.setItem("roleId",  result.response[0].roleId)
        localStorage.setItem("deptId",  result.response[0].deptId)
        localStorage.setItem("emailId",  result.response[0].email)
        if(result.response[0].roleId == 1) {
            window.location.href =  baseUrl+"/modules/home/"
        }
        if(result.response[0].roleId == 3) {
            window.location.href =  baseUrl+"/modules/admin/"
        }
    }
    else {
        notifyContentRef.innerHTML = `Username/Password Incorrect`
        notifyCloseRef.style.display = "block"
        $('#notifyModal').modal('show')
    }
    
}
 
$(document).ready(function() {

    const validationFormRef = document.getElementById('validation')

    validationFormRef.addEventListener('submit', (event) => {
        event.preventDefault()
        console.log(event)
        console.log(event.target.elements['staffid'].value)
        console.log(event.target.elements['password'].value)
        const userId = event.target.elements['staffid'].value
        const password = event.target.elements['password'].value
        validate(userId, password)

    })
    
    
})


function validate(userId, password) {

    const url = `${baseUrl}/restapi/authentication/validate.php?staffid=${userId}&password=${password}`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
        parseValidationResult(result)
    })
    .catch(error => console.log(error))

}

function grabValues() {

    const userId = textRef.value
    const password = passRef.value
    console.log(userId,password)
    validate(userId, password)
}



