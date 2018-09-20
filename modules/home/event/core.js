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



function constructDeptDom(result) {
    const deptRef = document.getElementById('departmentView')
    let output = ''
    const items = result.department
    items.forEach(e => {
        output += `<option name="${e.deptId}">${e.deptName}</option>`
    })
    deptRef.innerHTML = output

}

function constructDateDom() {
    const dateRef = document.getElementById('departmentdate')
    dateRef.setAttribute("min", date) 

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

function processEventBooking(eventDate, deptVal) {
    const eventDesc = document.getElementById('eventDesc')
    const contentPeriodBody = document.getElementById('contentPeriodBody')
    const contentPeriodBodyDesc = document.getElementById('contentPeriodBodyDesc')
    const desc = eventDesc.value
    const titleRef = document.getElementById('eventTitle')
    const title = titleRef.value
    const userId = localStorage.getItem('token')
    const uname = localStorage.getItem('uname')
    const periods = periodcount.slice(0, -1)
    // const  contentPeriodBodyDesc = document.getElementById('contentPeriodBodyDesc')
    let deptId = 0
    
    if(deptVal == 'CSE')
        deptId = 1
    if(deptVal == 'ECE')
        deptId = 2
    if(deptVal == 'IT')
        deptId = 4
    if(deptVal == 'EEE')
        deptId = 3
    if(deptVal == 'MECH')
        deptId = 6
    if(deptVal == 'ICE')
        deptId = 5
    if(deptVal == 'CIVIL')
        deptId = 7
    if(deptVal == 'ENG')
        deptId = 8 

    console.log(desc, periods, eventDate, deptId, title, userId, uname, deptVal    )
    //$_GET['deptid']) && isset($_GET['date'])  && isset($_GET['period']) && isset($_GET['username']) && isset($_GET['description']) && isset($_GET['userid']) && isset($_GET['eventname']) && isset($_GET['deptname'])
    if (desc != "" && title != "" && periods != "") {
        const  contentBodyMessage = document.getElementById('contentBodyMessage')

        contentBodyMessage.innerHTML = `<div class="alert alert-danger text-center"><i class="fas fa-spinner text-white fa-spin"></i> <br>
                                        <p>please wait,processing</p></div>`
        clearPeriods()
        eventDesc.value = `` 
        titleRef.value = ``
        contentPeriodBody.innerHTML = ``
        contentPeriodBodyDesc.innerHTML = ``
        console.log("accepted")
        let url = `http://localhost/seminar/restapi/event/eventbooking.php?deptid=${deptId}&date=${eventDate}&period=${periods}&username=${uname}&description=${desc}&userid=${userId}&eventname=${title}&deptname=${deptVal}`
        console.log(url)
        fetch(url)
        .then(data => data.json())
        .then(response => {
            console.log(response)
            if(response.response.status) {
                contentBodyMessage.innerHTML = `<div class="alert alert-success text-center"> Event Booking Successfull</div> `
                contentPeriodBody.innerHTML = ``
                contentPeriodBodyDesc.innerHTML = ``
                setTimeout(function(){
                    contentBodyMessage.innerHTML = ``
                }, 5000)
            }
            else {
                contentBodyMessage.innerHTML = `<div class="alert alert-danger text-center"> Something went wrong</div>`
                contentPeriodBody.innerHTML = ``
                setTimeout(function(){
                    contentBodyMessage.innerHTML = ``
                }, 5000)
            }

        })
        .catch(error => console.log(error))
    }
    else {
        const  contentBodyMessage = document.getElementById('contentBodyMessage')
        console.log("rejected")
        contentBodyMessage.innerHTML = `<div class="alert alert-danger text-center"> invalid fields</div> `
        setTimeout(function(){
            contentBodyMessage.innerHTML = ``
        }, 3000)

    }

}

let periodcount = ``;
let periodcountvalue = 0;


function period1() {
    const period1 = document.getElementById('period1')
    const totalperiods = document.getElementById('totalperiods')
    period1.classList.add('disabled', 'bg-success')
    periodcount += 'p1-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(1, periodcount)
}
function period2() {
    const period2 = document.getElementById('period2')
    const totalperiods = document.getElementById('totalperiods')
    period2.classList.add('disabled', 'bg-success')
    periodcount += 'p2-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(2, periodcount)
}
function period3() {
    const period3 = document.getElementById('period3')
    const totalperiods = document.getElementById('totalperiods')
    period3.classList.add('disabled', 'bg-success')
    periodcount += 'p3-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(3, periodcount)

}
function period4() {
    const period4 = document.getElementById('period4')
    const totalperiods = document.getElementById('totalperiods')
    period4.classList.add('disabled', 'bg-success')
    periodcount += 'p4-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(4, periodcount)
}
function period5() {
    const period5 = document.getElementById('period5')
    const totalperiods = document.getElementById('totalperiods')
    period5.classList.add('disabled', 'bg-success')
    periodcount += 'p5-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(5, periodcount)
}
function period6() {
    const period6 = document.getElementById('period6')
    const totalperiods = document.getElementById('totalperiods')
    period6.classList.add('disabled', 'bg-success')
    periodcount += 'p6-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(6, periodcount)
}
function period7() {
    const period7 = document.getElementById('period7')
    const totalperiods = document.getElementById('totalperiods')
    period7.classList.add('disabled', 'bg-success')
    periodcount += 'p7-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(7, periodcount)
}
function period8()  {
    const period8 = document.getElementById('period8')
    const totalperiods = document.getElementById('totalperiods')
    period8.classList.add('disabled', 'bg-success')
    periodcount += 'p8-'
    periodcountvalue++
    totalperiods.innerHTML = periodcountvalue
    console.log(8, periodcount)
}

function clearPeriods() {
    let period = []    
    let periodcountarr = periodcount.slice(0, -1).split("-")
    console.log(periodcountarr)
    if(periodcountvalue != 0) {
        for(var i = 0; i < periodcountarr.length; i++) {
            period = document.getElementById(`period${periodcountarr[i][1]}`)
            period.classList.remove('disabled', 'bg-success')
        }    
        periodcount = ``;
        periodcountvalue = 0;
        totalperiods.innerHTML = periodcountvalue
    }
}







function handleEventBooking(eventDate, eventDept) {
    console.log(eventDate, eventDept)
    const  contentPeriodBody = document.getElementById('contentPeriodBody')
    const  contentPeriodBodyDesc = document.getElementById('contentPeriodBodyDesc')
    contentPeriodBody.innerHTML = `
                                <div class="row justify-content-center">
                                    <div class="col text-danger">
                                        Select Required periods*
                                    </div>
                                    <div class="col text-danger text-center" >
                                        Total-Periods-selected : <span id="totalperiods">0</span>
                                    </div>
                                    <div class="col text-danger text-right p-0 m-0 " id="clearButton" >
                                        <a onclick="clearPeriods()" class="btn btn-sm btn-outline-warning" style="margin-top: -10px;">clear-all</a>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col periodmeta hoverable font-weight-bold" id="period1" ><div class="row"><a class="text-dark col"  onclick="period1()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >1</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period2" ><div class="row"><a class="text-dark col"  onclick="period2()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >2</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period3" ><div class="row"><a class="text-dark col"  onclick="period3()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >3</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period4" ><div class="row"><a class="text-dark col"  onclick="period4()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >4</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period5" ><div class="row"><a class="text-dark col"  onclick="period5()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >5</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period6" ><div class="row"><a class="text-dark col"  onclick="period6()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >6</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period7" ><div class="row"><a class="text-dark col"  onclick="period7()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >7</a></div></div>
                                    <div class="col periodmeta hoverable font-weight-bold" id="period8" ><div class="row"><a class="text-dark col"  onclick="period8()" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s >8</a></div></div>
                                </div>
                                `

    contentPeriodBodyDesc.innerHTML = `
                                        <div class="row">
                                            <div class="col text-danger">
                                                Enter Event Title*
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <textarea name="eventDesc"  id="eventTitle" class="form-control btn-outline-blue"    rows="1"></textarea>
                                            </div>
                                        </div>  
                                        <div class="row">
                                            <div class="col text-danger">
                                                Enter Event Description*
                                            </div>
                                        </div>
                                        <div class="row ">
                                        <div class="col">
                                            <textarea name="eventDesc"  id="eventDesc" class="form-control btn-outline-blue" rows="5"></textarea>
                                        </div>
                                        </div>  
                                        <div class="row ">
                                        <div class="col text-center p-3">
                                            <input type="button" value="Book" id="bookButton" onclick="processEventBooking('${eventDate}', '${eventDept}');" class="btn btn-primary ">
                                        </div>
                                        </div>  
                                        `

}


$(document).ready(function() {
    const initial = localStorage.getItem('initial')
    const  contentBodyMessage = document.getElementById('contentBodyMessage')
    passwordChange(initial)
    //main process
    getDept()
    constructDateDom()

    const  departmentView = document.getElementById('departmentView')
    const deptId = localStorage.getItem('deptId')
    let deptVal
    if(deptId == 1)
       deptVal = 'CSE'
    if(deptId == 2)
       deptVal = 'ECE'
    if(deptId == 4)
       deptVal = 'IT'
    if(deptId == 3)
       deptVal = 'EEE'
    if(deptId == 6)
       deptVal = 'MECH'
    if(deptId == 5)
       deptVal = 'ICE'
    if(deptId == 7)
       deptVal = 'CIVIL'
    if(deptId == 8)
       deptVal = 'ENG'
    departmentView.value =  deptVal

    const  departmentdate = document.getElementById('departmentdate')

    departmentdate.addEventListener("change", function() {
        if(departmentView.value != "") {
            console.log(departmentdate.value, departmentView.value)
            handleEventBooking(departmentdate.value, departmentView.value)
        }
        else {
            contentBodyMessage.innerHTML = `<div class="alert alert-danger"> please select department field</div> `
            setTimeout(function(){
                contentBodyMessage.innerHTML = ``
            }, 3000)
        }
    })
    
    departmentView.addEventListener("change", function() {
        if(departmentdate.value != "") {
            console.log(departmentdate.value, departmentView.value)
            handleEventBooking(departmentdate.value, departmentView.value)
        }
        else {
            contentBodyMessage.innerHTML = `<div class="alert alert-danger text-center"> please select Event Date</div> `
            setTimeout(function(){
                contentBodyMessage.innerHTML = ``
            }, 3000)
        }
    })
    

})



