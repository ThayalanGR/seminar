$(document).ready(function() {

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

    //inserting timeline values
    function insertTimelineValues(response) {


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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one1.classList.add('btn-outline-danger')
                one1.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            one1.classList.add('btn-outline-success')
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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                // one2.style.border = "2px"     
                // one2.style.borderColor = "red"  
                one2.style.backgroundColor = "red"     
                one2.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            // one2.classList.add('btn-outline-success')
            one2.style.backgroundColor = "green"     
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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
             
                one3.classList.add('btn-outline-danger')
                one3.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`

            one3.classList.add('btn-outline-success')
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
                let output = `<a class="" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one4.classList.add('btn-outline-danger')
                            
                one4.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            // one4.style.backgroundColor = "#32ff36"
            one4.classList.add('btn-outline-success')
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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one5.classList.add('btn-outline-danger')                               
                one5.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            one5.classList.add('btn-outline-success')            
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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one6.classList.add('btn-outline-danger')                                
                one6.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            one6.classList.add('btn-outline-success')            
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
                let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one7.classList.add('btn-outline-danger')                
                one7.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            one7.classList.add('btn-outline-success')            
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
                let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
                one8.classList.add('btn-outline-danger')                
                one8.innerHTML = output
                
            }).
            catch(err => console.log(err))
        }else {
            let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[0].groupname}', '${response.timeline[0].date}')"></a>`
            one8.classList.add('btn-outline-success')           
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two1.classList.add('btn-outline-danger')
        two1.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two1.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two2.classList.add('btn-outline-danger')
        
        two2.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two2.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
     
        two3.classList.add('btn-outline-danger')
        two3.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`

    two3.classList.add('btn-outline-success')
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
        let output = `<a class="" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two4.classList.add('btn-outline-danger')
                    
        two4.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    // one4.style.backgroundColor = "#32ff36"
    two4.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two5.classList.add('btn-outline-danger')                               
        two5.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two5.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two6.classList.add('btn-outline-danger')                                
        two6.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two6.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two7.classList.add('btn-outline-danger')                
        two7.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two7.classList.add('btn-outline-success')            
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
        let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        two8.classList.add('btn-outline-danger')                
        two8.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[1].groupname}', '${response.timeline[1].date}')"></a>`
    two8.classList.add('btn-outline-success')           
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three1.classList.add('btn-outline-danger')
        three1.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three1.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three2.classList.add('btn-outline-danger')
        
        three2.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three2.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
     
        three3.classList.add('btn-outline-danger')
        three3.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`

    three3.classList.add('btn-outline-success')
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
        let output = `<a class="" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three4.classList.add('btn-outline-danger')
                    
        three4.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    // one4.style.backgroundColor = "#32ff36"
    three4.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three5.classList.add('btn-outline-danger')                               
        three5.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three5.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three6.classList.add('btn-outline-danger')                                
        three6.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three6.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three7.classList.add('btn-outline-danger')                
        three7.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three7.classList.add('btn-outline-success')            
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
        let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        three8.classList.add('btn-outline-danger')                
        three8.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[2].groupname}', '${response.timeline[2].date}')"></a>`
    three8.classList.add('btn-outline-success')           
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four1.innerHTML = output
        four1.classList.add('btn-outline-danger')
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four1.innerHTML = output
    four1.classList.add('btn-outline-success')
}

       //fetchong day order-1 
if(response.timeline[3].p2  != 0){

    const periodId = response.timeline[3].p2
    const url = `http://localhost/seminar/restapi/timeline/getperioddetails.php?periodid=${periodId}`
    fetch(url).
    then(data => data.json())
    .then(response => {
        console.log(response)
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four2.classList.add('btn-outline-danger')
        
        four2.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four2.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
     
        four3.classList.add('btn-outline-danger')
        four3.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`

    four3.classList.add('btn-outline-success')
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
        let output = `<a class="" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four4.classList.add('btn-outline-danger')
                    
        four4.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    // one4.style.backgroundColor = "#32ff36"
    four4.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four5.classList.add('btn-outline-danger')                               
        four5.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four5.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four6.classList.add('btn-outline-danger')                                
        four6.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four6.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four7.classList.add('btn-outline-danger')                
        four7.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four7.classList.add('btn-outline-success')            
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
        let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        four8.classList.add('btn-outline-danger')                
        four8.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[3].groupname}', '${response.timeline[3].date}')"></a>`
    four8.classList.add('btn-outline-success')           
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five1.classList.add('btn-outline-danger')
        five1.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five1.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five2.classList.add('btn-outline-danger')
        
        five2.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five2.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
     
        five3.classList.add('btn-outline-danger')
        five3.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`

    five3.classList.add('btn-outline-success')
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
        let output = `<a class="" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five4.classList.add('btn-outline-danger')
                    
        five4.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    // one4.style.backgroundColor = "#32ff36"
    five4.classList.add('btn-outline-success')
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five5.classList.add('btn-outline-danger')                               
        five5.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five5.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five6.classList.add('btn-outline-danger')                                
        five6.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five6.classList.add('btn-outline-success')            
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
        let output = `<a class="text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five7.classList.add('btn-outline-danger')                
        five7.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five7.classList.add('btn-outline-success')            
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
        let output = `<a class=" text-dark" onclick="getPeriodInfo('${periodId}')">${response.perioddetails[0].user_name} <br> ${response.perioddetails[0].sub_code}</a>`
        five8.classList.add('btn-outline-danger')                
        five8.innerHTML = output
        
    }).
    catch(err => console.log(err))
}else {
    let output = `<a class="text-dark"  onclick="setPeriodInfo('p6','${response.timeline[4].groupname}', '${response.timeline[4].date}')"></a>`
    five8.classList.add('btn-outline-success')           
    five8.innerHTML = output
}



        

        
    }




    const  departmentView = document.getElementById('departmentView')
    const deptId = localStorage.getItem('deptId')

    let deptVal

    if(deptId == 1)
       deptVal = 'CSE'
    if(deptId == 2)
       deptVal = 'ECE'
    if(deptId == 3)
       deptVal = 'IT'
    if(deptId == 4)
       deptVal = 'EEE'
    if(deptId == 5)
       deptVal = 'CIVIL'
    if(deptId == 6)
       deptVal = 'MECH'
    if(deptId == 7)
       deptVal = 'ICE'
    if(deptId == 8)
       deptVal = 'ENG'


    departmentView.value =  deptVal

    url = `http://localhost/seminar/restapi/timeline/gettimeline.php?deptid=${deptId}`
    fetch(url).
    then(data => data.json()).
    then(response => {
        console.log(response)
        if(response.timeline.length > 0){
            insertTimelineValues(response)
        }
        else {
            const notifyMessage = document.getElementById('notifymessage')
            notifyMessage.innerHTML = `<div class="alert alert-danger"> No Data Found </div> `

        }
    }).
    catch(err => console.log(err))


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
            deptId = 3
        if(deptVal == 'EEE')
            deptId = 4
        if(deptVal == 'CIVIL')
            deptId = 5
        if(deptVal == 'MECH')
            deptId = 6
        if(deptVal == 'ICE')
            deptId = 7
        if(deptVal == 'ENG')
            deptId = 8
    
        url = `http://localhost/seminar/restapi/timeline/gettimeline.php?deptid=${deptId}`
        fetch(url).
        then(data => data.json()).
        then(response => {
            console.log(response)
            if(response.timeline.length > 0){
                insertTimelineValues(response)
            }
            else {
                const notifyMessage = document.getElementById('notifymessage')
                notifyMessage.innerHTML = `<div class="alert alert-danger"> No Data Found </div> `
    
            }
        }).
        catch(err => console.log(err))
    
    
    })
    





})



