const notifyContentRef = document.getElementById('notifyContent')
const notifyCloseRef = document.getElementById('notifyCloseButton')
const passwordContentRef = document.getElementById('passwordContent')
const passwordFooterRef = document.getElementById('passwordFooter')
const messageRef = document.getElementById('message')
const logoutRef = document.getElementById('logoutButton')
function handleLogoutRequest(){
    window.location.href = "http://localhost/seminar/modules/logout/"
}

$(document).ready(function() {
    const unameRef = document.getElementById('uname')
    unameRef.innerHTML = localStorage.getItem('uname')

})


// password change block
function passwordChange(initial) {
    if(initial == 0){ 
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



var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

var date = yyyy+'-'+mm+'-'+dd;

function fetchProcess() {
    const maincontent = document.getElementById('maincontent')
    maincontent.innerHTML = ``
    const url = `http://localhost/seminar/restapi/event/eventview.php`
    fetch(url)
    .then(data => data.json())
    .then(response => {
        console.log(response)
        if(response.eventdetails.length) {
            response.eventdetails.forEach(event => {
                // console.log(event)
                let periodsArr = event.period.split("-")
                // console.log(periodsArr)
                let periodVar = []
                Array.prototype.contains = function(element){
                    return this.indexOf(element) > -1
                }
                for(var i = 1; i <= 8; i++) {
                    if(periodsArr.contains(`p${i}`)){
                        periodVar[i] = `Reserved by ${event.user_name}`
                    }else {
                        periodVar[i] = "-"
                    }
                }
                let cancelBtn = ''
                if(event.user_name == localStorage.getItem('uname')) {
                    cancelBtn = `<a onclick = "cancelBooking(${event.event_id}, '${event.period}', '${event.date}');" class="col period  d-flex justify-content-center align-items-center text-danger shadow hoverable" > <i class="fa fa-trash shadow-lg" style="font-size: 20px;"> </i></a>`
                } else {
                    cancelBtn = `<div class="col period font-weight-bold d-flex justify-content-center align-items-center text-danger shadow" >-</div>`
                }
                let construct = `<div class="row">
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-warning shadow">${event.event_name} <br> ${event.date}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[1]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[2]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[3]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[4]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[5]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[6]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[7]}</div>
                                    <div class="col period font-weight-bold d-flex justify-content-center align-items-center text-primary shadow">${periodVar[8]}</div>
                                    ${cancelBtn}
                                </div>`
                maincontent.innerHTML += construct
                // console.log(construct)
            })
        } else {
            maincontent.innerHTML = `<div class="row"><div class="col text-center alert alert-warning text-danger">No Events Yet</div></div> `
        }   

    })
    .catch(error => console.log(error))
}


$(document).ready(function() {
   fetchProcess()
})



function cancelBooking(eventId, period, date) {
    notifyContentRef.innerHTML = `<div class="alert alert-danger text-center">Are you sure to cancel the Event ? 
                                    <button class="btn btn-primary" onclick="cancelBookingProcess(${eventId}, '${period}', '${date}')"> Ok </button>
                                  </div>`
    notifyCloseButton.style.display = "block"
    $('#notifyModal').modal("show")
    console.log(eventId)
}


function cancelBookingProcess(eventId, period, date) {
    notifyContentRef.innerHTML =`<div class="alert alert-warning text-center"><i class="fas fa-spinner  text-primary fa-spin"></i> <br>
                                    <p>please wait,processing</p> </div>`
    notifyCloseButton.style.display = "none"
    console.log(eventId)
    const url = `http://localhost/seminar/restapi/event/eventcancel.php?eventid=${eventId}&periods=${period}&date=${date}`
    console.log(url)
    fetch(url)
    .then(data => data.json())
    .then(response => {
        console.log(response)
        if(response.response.status){
            notifyContentRef.innerHTML = `<div class="alert alert-success text-center"> 
                                                ${response.response.msg}
                                        </div>`
            // notifyCloseButton.style.display = "block"
            $('#notifyModal').modal("show")
            fetchProcess()
            setTimeout(function() {
                $('#notifyModal').modal("hide")
            }, 2000)
        } else {
                notifyContentRef.innerHTML = `<div class="alert alert-danger text-center"> 
                                                    ${response.response.msg}
                                            </div>`
                // notifyCloseButton.style.display = "block"
                $('#notifyModal').modal("show")
                fetchProcess()
                setTimeout(function() {
                    $('#notifyModal').modal("hide")
                }, 2000)
        }
    })
    .catch(error => console.log(error))
}