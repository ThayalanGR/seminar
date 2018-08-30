




$(document).ready(function() {

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

    getresponse(deptId)

    const  departmentViewtwo = document.getElementById('departmentView')
    departmentViewtwo.addEventListener("change", (event) => {
        console.log(departmentViewtwo.value)
        const deptVal = departmentViewtwo.value
    
        let deptId 
    
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

        getresponse(deptId)
        
    })
    


    




})



function insertTimelineValues(response) {

    // fetch dayorder
const fetchdayorder1 = document.getElementById('fetchdayorder1')
const fetchdayorder2 = document.getElementById('fetchdayorder2')
const fetchdayorder3 = document.getElementById('fetchdayorder3')
const fetchdayorder4 = document.getElementById('fetchdayorder4')
const fetchdayorder5 = document.getElementById('fetchdayorder5')
// fetchdate
const fetchdate1 = document.getElementById('fetchdate1')
const fetchdate2 = document.getElementById('fetchdate2')
const fetchdate3 = document.getElementById('fetchdate3')
const fetchdate4 = document.getElementById('fetchdate4')
const fetchdate5 = document.getElementById('fetchdate5')

// dayOrder 1
const one1 = document.getElementById('11')
const one2 = document.getElementById('12')
const one3 = document.getElementById('13')
const one4 = document.getElementById('14')
const one5 = document.getElementById('15')
const one6 = document.getElementById('16')
const one7 = document.getElementById('17')
const one8 = document.getElementById('18')

// dayOrder 2
const two1 = document.getElementById('21')
const two2 = document.getElementById('22')
const two3 = document.getElementById('23')
const two4 = document.getElementById('24')
const two5 = document.getElementById('25')
const two6 = document.getElementById('26')
const two7 = document.getElementById('27')
const two8 = document.getElementById('28')

// dayOrder 3
const three1 = document.getElementById('31')
const three2 = document.getElementById('32')
const three3 = document.getElementById('33')
const three4 = document.getElementById('34')
const three5 = document.getElementById('35')
const three6 = document.getElementById('36')
const three7 = document.getElementById('37')
const three8 = document.getElementById('38')

// dayOrder 4
const four1 = document.getElementById('41')
const four2 = document.getElementById('42')
const four3 = document.getElementById('43')
const four4 = document.getElementById('44')
const four5 = document.getElementById('45')
const four6 = document.getElementById('46')
const four7 = document.getElementById('47')
const four8 = document.getElementById('48')

// dayOrder 5
const five1 = document.getElementById('51')
const five2 = document.getElementById('52')
const five3 = document.getElementById('53')
const five4 = document.getElementById('54')
const five5 = document.getElementById('55')
const five6 = document.getElementById('56')
const five7 = document.getElementById('57')
const five8 = document.getElementById('58')


//for fetching day order
fetchdayorder1.innerHTML = response.timeline[0].dayorder
fetchdayorder2.innerHTML = response.timeline[1].dayorder
fetchdayorder3.innerHTML = response.timeline[2].dayorder
fetchdayorder4.innerHTML = response.timeline[3].dayorder
fetchdayorder5.innerHTML = response.timeline[4].dayorder

//for fetching date
fetchdate1.innerHTML = response.timeline[0].date
fetchdate2.innerHTML = response.timeline[1].date
fetchdate3.innerHTML = response.timeline[2].date
fetchdate4.innerHTML = response.timeline[3].date
fetchdate5.innerHTML = response.timeline[4].date

//fetchong day order-1 
if(response.timeline[0].p1 != 0 ){
    
    const periodId = response.timeline[0].p1
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one1.style.backgroundColor = "#ff918c" 
        one1.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"s    onclick="setPeriodInfo('p1','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one1. style.backgroundColor = "#60ff73" 
    one1.innerHTML = output
}

        //fetchong day order-1 
if(response.timeline[0].p2 != 0){

    const periodId = response.timeline[0].p2
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"    onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name}<br>${response.perioddetails[0].sub_code}</a></div>`  
        one2.style.backgroundColor = "#ff918c"                 
        one2.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"    onclick="setPeriodInfo('p2','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one2. style.backgroundColor = "#60ff73"     
    one2.innerHTML = output
}

            //fetchong day order-1 
if(response.timeline[0].p3  != 0){
    
    const periodId = response.timeline[0].p3
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        
        one3.style.backgroundColor = "#ff918c" 
        one3.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p3','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`

    one3. style.backgroundColor = "#60ff73" 
    one3.innerHTML = output
}

        //fetchong day order-1 
if(response.timeline[0].p4  != 0){

    const periodId = response.timeline[0].p4
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one4.style.backgroundColor = "#ff918c" 
                    
        one4.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p4','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    // one4.style.backgroundColor = "#32ff36"
    one4. style.backgroundColor = "#60ff73" 
    one4.innerHTML = output
}

            //fetchong day order-1 
if(response.timeline[0].p5  != 0){
    
    const periodId = response.timeline[0].p5
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one5.style.backgroundColor = "#ff918c"                                
        one5.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p5','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one5. style.backgroundColor = "#60ff73"             
    one5.innerHTML = output
}

        //fetchong day order-1 
if(response.timeline[0].p6  != 0){

    const periodId = response.timeline[0].p6
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one6.style.backgroundColor = "#ff918c"                                 
        one6.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one6. style.backgroundColor = "#60ff73"             
    one6.innerHTML = output
}

            //fetchong day order-1 
if(response.timeline[0].p7  != 0){
    
    const periodId = response.timeline[0].p7
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one7.style.backgroundColor = "#ff918c"                 
        one7.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p7','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one7. style.backgroundColor = "#60ff73"             
    one7.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[0].p8  != 0){

    const periodId = response.timeline[0].p8
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
        one8.style.backgroundColor = "#ff918c"                 
        one8.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p8','${response.timeline[0].groupname}', '${response.timeline[0].date}', '${response.timeline[0].dayorder}', '${response.timeline[0].deptid}')"></a></div>`
    one8. style.backgroundColor = "#60ff73"            
    one8.innerHTML = output
}













    //////////////////////// day order two /////////////////////////////

    
//fetchong day order-1
if(response.timeline[1].p1  != 0){
    
const periodId = response.timeline[1].p1
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two1.style.backgroundColor = "#ff918c" 
two1.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p1','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two1. style.backgroundColor = "#60ff73" 
two1.innerHTML = output
}

//fetchong day order-1
if(response.timeline[1].p2  != 0){

const periodId = response.timeline[1].p2
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two2.style.backgroundColor = "#ff918c" 

two2.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p2','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two2. style.backgroundColor = "#60ff73" 
two2.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[1].p3  != 0){

const periodId = response.timeline[1].p3
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`

two3.style.backgroundColor = "#ff918c" 
two3.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p3','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`

two3. style.backgroundColor = "#60ff73" 
two3.innerHTML = output
}

//fetchong day order-1
if(response.timeline[1].p4  != 0){

const periodId = response.timeline[1].p4
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two4.style.backgroundColor = "#ff918c" 
            
two4.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p4','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
// one4.style.backgroundColor = "#32ff36"
two4. style.backgroundColor = "#60ff73" 
two4.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[1].p5  != 0){

const periodId = response.timeline[1].p5
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two5.style.backgroundColor = "#ff918c"                                
two5.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p5','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two5. style.backgroundColor = "#60ff73"             
two5.innerHTML = output
}

//fetchong day order-1
if(response.timeline[1].p6  != 0){

const periodId = response.timeline[1].p6
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two6.style.backgroundColor = "#ff918c"                                 
two6.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two6. style.backgroundColor = "#60ff73"             
two6.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[1].p7  != 0){

const periodId = response.timeline[1].p7
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two7.style.backgroundColor = "#ff918c"                 
two7.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p7','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two7. style.backgroundColor = "#60ff73"             
two7.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[1].p8  != 0){

const periodId = response.timeline[1].p8
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
two8.style.backgroundColor = "#ff918c"                 
two8.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p8','${response.timeline[1].groupname}', '${response.timeline[1].date}', '${response.timeline[1].dayorder}', '${response.timeline[1].deptid}')"></a></div>`
two8. style.backgroundColor = "#60ff73"            
two8.innerHTML = output
}











///////////////////////////day order 3 /////////////////////////////////////////////////////////




//fetchong day order-1 
if(response.timeline[2].p1  != 0){
    
const periodId = response.timeline[2].p1
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three1.style.backgroundColor = "#ff918c" 
three1.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p1','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three1. style.backgroundColor = "#60ff73" 
three1.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[2].p2  != 0){

const periodId = response.timeline[2].p2
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three2.style.backgroundColor = "#ff918c" 

three2.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p2','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three2. style.backgroundColor = "#60ff73" 
three2.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[2].p3  != 0){

const periodId = response.timeline[2].p3
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`

three3.style.backgroundColor = "#ff918c" 
three3.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p3','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`

three3. style.backgroundColor = "#60ff73" 
three3.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[2].p4  != 0){

const periodId = response.timeline[2].p4
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three4.style.backgroundColor = "#ff918c" 
            
three4.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p4','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
// one4.style.backgroundColor = "#32ff36"
three4. style.backgroundColor = "#60ff73" 
three4.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[2].p5  != 0){

const periodId = response.timeline[2].p5
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three5.style.backgroundColor = "#ff918c"                                
three5.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p5','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three5. style.backgroundColor = "#60ff73"             
three5.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[2].p6  != 0){

const periodId = response.timeline[2].p6
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three6.style.backgroundColor = "#ff918c"                                 
three6.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three6. style.backgroundColor = "#60ff73"             
three6.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[2].p7  != 0){

const periodId = response.timeline[2].p7
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three7.style.backgroundColor = "#ff918c"                 
three7.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p7','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three7. style.backgroundColor = "#60ff73"             
three7.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[2].p8  != 0){

const periodId = response.timeline[2].p8
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
three8.style.backgroundColor = "#ff918c"                 
three8.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p8','${response.timeline[2].groupname}', '${response.timeline[2].date}', '${response.timeline[2].dayorder}', '${response.timeline[2].deptid}')"></a></div>`
three8. style.backgroundColor = "#60ff73"            
three8.innerHTML = output
}










/////////////////day order 4 ////////////////////////////////////


//fetchong day order-1 
if(response.timeline[3].p1  != 0){
    
const periodId = response.timeline[3].p1
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four1.innerHTML = output
four1.style.backgroundColor = "#ff918c" 

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p1','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four1.innerHTML = output
four1. style.backgroundColor = "#60ff73" 
}

//fetchong day order-1 
if(response.timeline[3].p2  != 0){

const periodId = response.timeline[3].p2
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four2.style.backgroundColor = "#ff918c" 

four2.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p2','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four2. style.backgroundColor = "#60ff73" 
four2.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[3].p3  != 0){

const periodId = response.timeline[3].p3
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`

four3.style.backgroundColor = "#ff918c" 
four3.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p3','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`

four3. style.backgroundColor = "#60ff73" 
four3.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[3].p4  != 0){

const periodId = response.timeline[3].p4
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four4.style.backgroundColor = "#ff918c" 
            
four4.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p4','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
// one4.style.backgroundColor = "#32ff36"
four4. style.backgroundColor = "#60ff73" 
four4.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[3].p5  != 0){

const periodId = response.timeline[3].p5
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four5.style.backgroundColor = "#ff918c"                                
four5.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p5','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four5. style.backgroundColor = "#60ff73"             
four5.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[3].p6  != 0){

const periodId = response.timeline[3].p6
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four6.style.backgroundColor = "#ff918c"                                 
four6.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four6. style.backgroundColor = "#60ff73"             
four6.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[3].p7  != 0){

const periodId = response.timeline[3].p7
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four7.style.backgroundColor = "#ff918c"                 
four7.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p7','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four7. style.backgroundColor = "#60ff73"             
four7.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[3].p8  != 0){

const periodId = response.timeline[3].p8
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
four8.style.backgroundColor = "#ff918c"                 
four8.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p8','${response.timeline[3].groupname}', '${response.timeline[3].date}', '${response.timeline[3].dayorder}', '${response.timeline[3].deptid}')"></a></div>`
four8. style.backgroundColor = "#60ff73"            
four8.innerHTML = output
}











/////////////////////////day order 5 ////////////////////////




//fetchong day order-1 
if(response.timeline[4].p1  != 0){
    
const periodId = response.timeline[4].p1
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five1.style.backgroundColor = "#ff918c" 
five1.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p1','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five1. style.backgroundColor = "#60ff73" 
five1.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[4].p2  != 0){

const periodId = response.timeline[4].p2
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five2.style.backgroundColor = "#ff918c" 

five2.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p2','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five2. style.backgroundColor = "#60ff73" 
five2.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[4].p3  != 0){

const periodId = response.timeline[4].p3
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`

five3.style.backgroundColor = "#ff918c" 
five3.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p3','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`

five3. style.backgroundColor = "#60ff73" 
five3.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[4].p4  != 0){

const periodId = response.timeline[4].p4
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five4.style.backgroundColor = "#ff918c" 
            
five4.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p4','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
// one4.style.backgroundColor = "#32ff36"
five4. style.backgroundColor = "#60ff73" 
five4.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[4].p5  != 0){

const periodId = response.timeline[4].p5
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five5.style.backgroundColor = "#ff918c"                                
five5.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p5','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five5. style.backgroundColor = "#60ff73"             
five5.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[4].p6  != 0){

const periodId = response.timeline[4].p6
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five6.style.backgroundColor = "#ff918c"                                 
five6.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five6. style.backgroundColor = "#60ff73"             
five6.innerHTML = output
}

    //fetchong day order-1 
if(response.timeline[4].p7  != 0){

const periodId = response.timeline[4].p7
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"  onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five7.style.backgroundColor = "#ff918c"                 
five7.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p7','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five7. style.backgroundColor = "#60ff73"             
five7.innerHTML = output
}

//fetchong day order-1 
if(response.timeline[4].p8  != 0){

const periodId = response.timeline[4].p8
const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
fetch(url).
then(data => data.json())
.then(response => {
console.log(response)
let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a></div>`
five8.style.backgroundColor = "#ff918c"                 
five8.innerHTML = output

}).
catch(err => console.log(err))
}else {
let output = `<div class="row"><a class="text-dark col" style="position:absolute; display:flex; align-items:center; justify-content:center; text-align:center; padding:0; width:100%; height:100%; top:0; overflow:hidden; left: 0;"   onclick="setPeriodInfo('p8','${response.timeline[4].groupname}', '${response.timeline[4].date}', '${response.timeline[4].dayorder}', '${response.timeline[4].deptid}')"></a></div>`
five8. style.backgroundColor = "#60ff73"            
five8.innerHTML = output
}






}


function getresponse(deptId) {
    url = `http://localhost/seminar/restapi/timeline/gettimeline.php?deptid=${deptId}`
    fetch(url).
    then(data => data.json()).
    then(response => {
        console.log(response)
        if(response.timeline.length > 0){
            const notifyMessage = document.getElementById('notifymessage')
            notifyMessage.innerHTML = ``
            insertTimelineValues(response)
        }
        else {
            const notifyMessage = document.getElementById('notifymessage')
            notifyMessage.innerHTML = `<div class="alert alert-danger"> No Data Found </div> `

        }
    }).
    catch(err => console.log(err))
}        

 

function setPeriodInfo(periodName,groupName,date,dayorder,deptid) {
    const periodMessageRef = document.getElementById('periodmessage')
    periodMessageRef.innerHTML = ``

    const uname = localStorage.getItem('uname')
    console.log(uname)
    const url = `http://localhost/seminar/restapi/workload/getworkload.php?username=${uname}`
    fetch(url)
    .then(data => data.json())
    .then(response => {
        const periodMessageRef = document.getElementById('periodmessage')
        periodMessageRef.innerHTML = ``
        console.log(response)
        let option = ``
        const element = response.workload
        element.forEach(e => {
            console.log(e.sub_code)
            option += `<option>${e.sub_code}-${e.dept}-${e.section}-sem-${e.sem}</option>`
        })
        console.log(option)

        const periodinfomodalRef = document.getElementById('periodContent')
        periodinfomodalRef.innerHTML = `<form onSubmit = "return false;">
                                        <h5 class="text-primary text-center">Book this Period ${periodName.split("")[1]} from dayorder ${dayorder}</h5>
                                        <hr>
                                       <div class="form-group" >
                                        <select id="periodSub" class="p-1 btn-outline-primary rounded btn-block">
                                            <option active>Select Subject </option>
                                            ${option}
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control rounded btn-outline-green" id="periodDesc" placeholder="Enter description" required></textarea>
                                        </div>
                                    </form>`
        const periodinfomodalRefFooter = document.getElementById('periodFooter')
        periodinfomodalRefFooter.innerHTML =`<button type="button" class="btn btn-primary" onClick = "setPeriodInfoCatch('${periodName}','${groupName}','${date}','${dayorder}','${deptid}')">Book</button>`
        periodinfomodalRefFooter.innerHTML += ` <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>`
        $('#periodinfomodal').modal('show')

    })
    .catch(err => console.log(err))

  

}



function setPeriodInfoCatch(periodName,groupName,date,dayorder,deptid) {
    const periodMessageRef = document.getElementById('periodmessage')
    periodMessageRef.innerHTML = `<i class="fas fa-spinner text-primary fa-spin"></i> <br>
                                    <p>please wait,processing</p>
                                    `
     $('#periodinfomodal').modal('show')
    const uname = localStorage.getItem('uname')
    const periodDesc = document.getElementById('periodDesc').value
    const periodSub = document.getElementById('periodSub').value
    console.log(periodDesc, periodSub, periodName,groupName,date,dayorder,deptid)

    if(periodDesc != "" && periodSub != "Select Subject" ) {
        url = `http://localhost/seminar/restapi/timeline/insertperioddetails.php?deptid=${deptid}&group=${groupName}&date=${date}&dayorder=${dayorder}&period=${periodName}&username=${uname}&subcode=${periodSub}&description=${periodDesc}&userid=${localStorage.getItem('token')}&roleid=${localStorage.getItem('roleId')}`
        console.log(url)
        fetch(url)
        .then(data => data.json())
        .then(response => {
            console.log(response)
            if(response.response.status) {
                const periodMessageRef = document.getElementById('periodmessage')
                periodMessageRef.innerHTML = `<p class="alert alert-success">Booking successfull</p>
                <i class="fas fa-spinner text-primary fa-spin"></i> <br>
                <p>please wait,redirecting you to homepage</p> `
                getresponse(deptid)
                $('#periodinfomodal').modal('show')
                
                setTimeout(function() {    
                    periodMessageRef.innerHTML = ''
                    $('#periodinfomodal').modal('hide')
                }, 3000)
            }
            else {
                const periodMessageRef = document.getElementById('periodmessage')
                periodMessageRef.innerHTML = `<p class="alert alert-danger">${response.response.error}</p>`
                $('#periodinfomodal').modal('show')
            }
    
    
        })
        .catch(err => console.log(err))
        
    }else {
        const periodMessageRef = document.getElementById('periodmessage')
        periodMessageRef.innerHTML = `<p class="alert alert-danger">Something went wrong try again with correct details</p>  `
        $('#periodinfomodal').modal('show')
    }

    
    

}



function getPeriodInfo(periodId) {
    const periodMessageRef = document.getElementById('periodmessage')
    periodMessageRef.innerHTML = ``

    const uname = localStorage.getItem('uname')
    console.log(uname)
    const url = `http://localhost/seminar/restapi/workload/getworkload.php?username=${uname}`
    fetch(url)
    .then(data => data.json())
    .then(response => {
        console.log(response)
        let option = ``
        const element = response.workload
        element.forEach(e => {
            console.log(e.sub_code)
            option += `<option>${e.sub_code}-${e.dept}-${e.section}-sem-${e.sem}</option>`
        })
        console.log(option)
        const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
        fetch(url)
        .then(data => data.json())
        .then(response => {
            const periodMessageRef = document.getElementById('periodmessage')
            periodMessageRef.innerHTML = ``
            console.log(response)
            const periodinfomodalRef = document.getElementById('periodContent')

            if(response.perioddetails[0].user_name != uname) {
                periodinfomodalRef.innerHTML = `<form onSubmit = "return false;">
                                            <p class=" font-weight-bold text-primary text-center">Already Booked Period ${response.perioddetails[0].period.split("")[1]} from dayorder ${response.perioddetails[0].day_order} date:${response.perioddetails[0].date}</p>
                                            <hr>
                                        <div class="form-group " >
                                                <div class="row bg-light">
                                                    <div class="col text-primary font-weight-bold">
                                                        Staff Name :
                                                    </div>
                                                    <div class="col">
                                                        ${response.perioddetails[0].user_name}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-primary font-weight-bold">
                                                        Subject Code :
                                                    </div>
                                                    <div class="col">
                                                        ${response.perioddetails[0].sub_code}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-primary font-weight-bold">
                                                        Class :
                                                    </div>
                                                    <div class="col">
                                                        ${response.perioddetails[0].dept_name} - ${response.perioddetails[0].sec} - sem - ${response.perioddetails[0].sem}
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col"> <hr> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center text-primary font-weight-bold ">Request Period</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                    <select id="periodSub" class="p-1 btn-outline-primary rounded btn-block">
                                                    <option active>Select Subject </option>
                                                        ${option}
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                    <textarea class="form-control rounded btn-outline-green" id="requestmsg" placeholder="Enter Request message" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>`
                const periodinfomodalRefFooter = document.getElementById('periodFooter')
                periodinfomodalRefFooter.innerHTML =`<button type="button" class="btn btn-danger" onClick = "getPeriodInfoCatch('${response.perioddetails[0].book_id}')">Request</button>`
                periodinfomodalRefFooter.innerHTML += ` <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>`
                $('#periodinfomodal').modal('show')
            } else {
                periodinfomodalRef.innerHTML = `<form onSubmit = "return false;">
                <p class=" font-weight-bold text-primary text-center">Already Booked Period ${response.perioddetails[0].period.split("")[1]} from dayorder ${response.perioddetails[0].day_order} date:${response.perioddetails[0].date}</p>
                <hr>
                <div class="form-group " >
                    <div class="row bg-light">
                            <div class="col text-primary font-weight-bold">
                                Staff Name :
                            </div>
                            <div class="col">
                                ${response.perioddetails[0].user_name}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-primary font-weight-bold">
                                Subject Code :
                            </div>
                            <div class="col">
                                ${response.perioddetails[0].sub_code}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-primary font-weight-bold">
                                Class :
                            </div>
                            <div class="col">
                                ${response.perioddetails[0].dept_name} - ${response.perioddetails[0].sec} - sem - ${response.perioddetails[0].sem}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-primary font-weight-bold">
                                Description :
                            </div>
                            <div class="col">
                                ${response.perioddetails[0].description}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"> <hr> </div>
                        </div>
                       
                    </div>
                </form>`
                const periodinfomodalRefFooter = document.getElementById('periodFooter')
                periodinfomodalRefFooter.innerHTML =`<button type="button" class="btn btn-danger" onClick = "getPeriodInfoCatch('${response.perioddetails[0].book_id}')">Cancel Booking</button>`
                periodinfomodalRefFooter.innerHTML += ` <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>`
                $('#periodinfomodal').modal('show')
            }

        })
        .catch(err => console.log(err))
    })
    .catch(err => console.log(err))
  

}


function getPeriodInfoCatch(book_id) {
    const periodMessageRef = document.getElementById('periodmessage')
    periodMessageRef.innerHTML = `<i class="fas fa-spinner text-primary fa-spin"></i> <br>
                                    <p>please wait,processing</p>
                                    `
     $('#periodinfomodal').modal('show')

    const Token = localStorage.getItem('token')
    const requestmsg = document.getElementById('requestmsg').value
    const periodSub = document.getElementById('periodSub').value    
    console.log(Token, requestmsg, book_id, periodSub)

    if(requestmsg != "" && periodSub != "Select Subject") {
        url = `http://localhost/seminar/restapi/pushmailapi/requestperiod.php?token=${Token}&book_id=${book_id}&request_msg=${requestmsg}&sub_code=${periodSub}`
        console.log(url)
        fetch(url)
        .then(data => data.json())
        .then(response => {
            console.log(response)
            if(response.response.status) {
                const periodMessageRef = document.getElementById('periodmessage')
                periodMessageRef.innerHTML = `<p class="alert alert-success">Request successfully sent, keep checking your email </p>
                <i class="fas fa-spinner text-primary fa-spin"></i> <br>
                <p>please wait,redirecting you to homepage</p> `
                // getresponse(deptid)
                $('#periodinfomodal').modal('show')
                
                setTimeout(function() {    
                    periodMessageRef.innerHTML = ''
                    $('#periodinfomodal').modal('hide')
                }, 3000)
            }
            else {
                const periodMessageRef = document.getElementById('periodmessage')
                periodMessageRef.innerHTML = `<p class="alert alert-danger">${response.response.error}</p>  `
                $('#periodinfomodal').modal('show')
            }
    
    
        })
        .catch(err => console.log(err))
        
    }else {
        const periodMessageRef = document.getElementById('periodmessage')
        periodMessageRef.innerHTML = `<p class="alert alert-danger">Something went wrong try again with correct details</p>  `
        $('#periodinfomodal').modal('show')
    }


  
}