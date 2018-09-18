$(document).ready(function() {
    let output = ``;

    // for p1

    function p1(element){    
        if(element.p1){
            const periodId = 'p'+element.p1
            console.log(periodId)
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.name} <br> ${response.subcode}</a>`
                p2(element)
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p1','${element.groupname}', '${element.date}')"></a>`
            p2(element)
        }
    }


    // for p2
    function p2(element){    

        if(element.p2){
            const periodId = 'p'+element.p2
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`
                p3(element)
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p2','${element.groupname}', '${element.date}')"></a>`
            p3(element)
        }

    }

    // for p3
    function p3(element){    

        if(element.p3){
            const periodId = 'p'+element.p3
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`                    
                p4(element)
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p3','${element.groupname}', '${element.date}')"></a>`
            p4(element)
        }
    }


    // for p4
    function p4(element){    

        if(element.p4){
            const periodId = 'p'+element.p4
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`
                p5(element)
                
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p4','${element.groupname}', '${element.date}')"></a>`
            p5(element)
        }
    }


    // for p5
    function p5(element){    

        if(element.p5){
            const periodId = 'p'+element.p5
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`
                p6(element)
                
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p5','${element.groupname}', '${element.date}')"></a>`
            p6(element)
        }
    }

    // for p6
    function p6(element){    

        if(element.p6){
            const periodId ='p'+ element.p6
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`
                p7(element)
                
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p6','${element.groupname}', '${element.date}')"></a>`
            p7(element)
        }

    }

    // for p7
    function p7(element){    

        if(element.p7){
            const periodId = 'p'+element.p7
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`                    
                p8(element)
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p7','${element.groupname}', '${element.date}')"></a>`
        }
    }
    // for p8
    function p8(element){    
        if(element.p8){
            const periodId = 'p'+element.p8
            const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
            fetch(url).
            then(data => data.json())
            .then(response => {
                console.log(response)
                output += `<a class="col period hoverable danger-color text-white" onclick="getPeriodInfo('${periodId}')">${response.user_name} <br> ${response.sub_code}</a>`
                
                
            }).
            catch(err => console.log(err))
        }
        else{
            output += `<a class="col period hoverable success-color text-white"  onclick="setPeriodInfo('p8','${element.groupname}', '${element.date}')"></a>`
        }
    }





function insertTimelineValues(response) {

    const maintimeline = document.getElementById('maintimeline')
    //fetchong day order-1-5
    response.timeline.forEach(element => {
        output += `<div class="row">`
        output += `<div class="col period font-weight-bold "><span>${element.dayorder}</span><br><span>${element.date}</span></div>`
        p1(element)
        output += `</div>`
    })

    maintimeline.innerHTML = output;
    
}

const deptId = localStorage.getItem('deptId')
url = `http://localhost/seminar/restapi/timeline/gettimeline.php?deptid=${deptId}`

fetch(url).
then(data => data.json())
.then(response => {
    console.log(response)
    insertTimelineValues(response)
}).
catch(err => console.log(err))

})