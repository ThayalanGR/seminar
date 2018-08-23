const notifyContentRef = document.getElementById('notifyContent')
const notifyCloseRef = document.getElementById('notifyCloseButton')
const passwordContentRef = document.getElementById('passwordContent')
const passwordFooterRef = document.getElementById('passwordFooter')
const messageRef = document.getElementById('message')
const logoutRef = document.getElementById('logoutButton')



function handleLogoutRequest(){
    window.location.href = "http://localhost/seminar/modules/logout/"
}

// password change block
function passwordChange(initial) {
    if(initial == 0)
    { 
        passwordContentRef.innerHTML = `<form onSubmit = "return false;">
                                        <h5 class="text-primary text-center">Update Password</h5>
                                        <hr>
                                        <div class="form-group">
                                        <input type="password" class="form-control" id="password1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                        <input type="password" class="form-control" id="password2" placeholder="Re-enter Password">
                                        </div>
                                    </form>`
        passwordFooterRef.innerHTML =`<button type="button" class="btn btn-primary" onClick = passwordProcessing()>Update</button>`
        $('#passwordModal').modal('show')
    }
}



function passwordChangeWithoutInitial() {
    const modRef = document.getElementById('passwordModal')
    passwordContentRef.innerHTML = `<form onSubmit = "return false;">
                                    <h5 class="text-primary text-center">Update Password</h5>
                                    <hr>
                                    <div class="form-group">
                                    <input type="password" class="form-control" id="password1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                    <input type="password" class="form-control" id="password2" placeholder="Re-enter Password">
                                    </div>
                                </form>`
    passwordFooterRef.innerHTML =`<button type="button" class="btn btn-primary" onClick =passwordProcessing()>Update</button>`
    passwordFooterRef.innerHTML += ` <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>`
    $('#passwordModal').modal('show')


}



function updatePassword(userId, pass1) {
    console.log(pass1,userId)
    url = `http://localhost/seminar/restapi/update/updatepassword.php?staffid=${userId}&password=${pass1}`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
        const response = result.response.status
        if(response) {
            localStorage.setItem('initial', 1)
            messageRef.innerHTML = `<p class="alert alert-success">password changed successfully</p>
            <i class="fas fa-spinner text-primary fa-spin"></i> <br>
            <p>please wait,redirecting you to homepage</p> `

            $('#passwordModal').modal('show')

            setTimeout(function() {
                $('#passwordModal').modal('hide')
            }, 3000)
        }

    })
    .catch(error => console.log(error))

}


function passwordProcessing() {   
    messageRef.innerHTML = `<i class="fas fa-spinner text-primary fa-spin"></i> <br>
                                <p>please wait,processing</p>
                                `
    $('#passwordModal').modal('show')
    const password1Ref = document.getElementById('password1')
    const password2Ref = document.getElementById('password2')
    const pass1 = password1Ref.value
    const pass2 = password2Ref.value
    console.log(pass1,pass2)
    const userId = localStorage.getItem('token')

    if((pass1 != pass2) || (pass1 == '') || (pass2 == '')){
        messageRef.innerHTML = `<p class="alert alert-danger">password doesn't match or doesn't meet requirements</p>  `
        $('#passwordModal').modal('show')
    }
    else {
        updatePassword(userId, pass1)
    }   

}


// end of password construct dom


function constructDeptDom(result) {
    const deptRef = document.getElementById('departmentView')
    let output = ''
    const items = result.department
    items.forEach(e => {
        // let deptId = items.deptId
        // let deptName = items.deptName
        output += `<option name="${e.deptId}">${e.deptName}</option>`
    })
    deptRef.innerHTML = output

}


function getDept() {
    
    url = `http://localhost/seminar/restapi/department/getdepartment.php`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
        constructDeptDom(result)
    })
    .catch(error => console.log(error))


}


$(document).ready(function() {
    const unameRef = document.getElementById('uname')
    unameRef.innerHTML = localStorage.getItem('uname')
    const initial = localStorage.getItem('initial')
    passwordChange(initial)


    //main process
    getDept()

})




