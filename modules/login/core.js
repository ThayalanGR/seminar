
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
            window.location.href = "http://localhost/seminar/modules/home/"
        }
        if(result.response[0].roleId == 3) {
            window.location.href = "http://localhost/seminar/modules/admin/"
        }
    }
    else {
        notifyContentRef.innerHTML = `Username/Password Incorrect`
        notifyCloseRef.style.display = "block"
        $('#notifyModal').modal('show')
    }
    
}

function validate(userId, password) {

    url = `http://localhost/seminar/restapi/authentication/validate.php?staffid=${userId}&password=${password}`
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



