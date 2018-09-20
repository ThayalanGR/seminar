 

const wnameRef = document.getElementById('wname')
const orgRef = document.getElementById('org')
const locationRef = document.getElementById('loc')
const ondateRef = document.getElementById('onDate')
const ondatefRef = document.getElementById('onDatef')
const ondatetRef = document.getElementById('onDatet')
const wtypeRef = document.getElementById('wtype')
const ayearRef = document.getElementById('ayear')
const remarksRef = document.getElementById('remarks')
const disRef = document.getElementById('dis')




 //for changing password


 const notifyContentRef = document.getElementById('notifyContent')
 const notifyCloseRef = document.getElementById('notifyCloseButton')
 const passwordContentRef = document.getElementById('passwordContent')
 const passwordFooterRef = document.getElementById('passwordFooter')
 const messageRef = document.getElementById('message')
 const logoutRef = document.getElementById('logoutButton')
 function handleLogoutRequest(){
     window.location.href =  baseUrl+"/modules/logout/"
 }
$(document).ready(function() {
   const unameRef = document.getElementById('uname')
   unameRef.innerHTML = localStorage.getItem('uname')
})



function grabValue() {
  
   const sel = document.getElementById("dept");
   const value = sel.options[sel.selectedIndex].value;
   const text = sel.options[sel.selectedIndex].text;
   const wname = wnameRef.value
   const org = orgRef.value
   const location = locationRef.value
   const ondate = ondateRef.value
   const ondatef = ondatefRef.value
   const ondatet = ondatetRef.value
   const wtype = wtypeRef.value
   const ayear = ayearRef.value
   const remarks = remarksRef.value 
   const dispor = disRef.value
   const id1 = localStorage.getItem('token')
   console.log(id1,text,wname,org,location,ondate,ondatef,ondatet,wtype,ayear,remarks,dispor)
   url = `${baseUrl}/restapi/workshop/workshop.php?userid=${id1}&dept=${text}&wname=${wname}&org=${org}
   &loc=${location}&on=${ondate}&from=${ondatef}&to=${ondatet}&wtype=${wtype}&acad=${ayear}&rem=${remarks}&dis=${dispor}`
   fetch(url).
   then(data => data.json()).
   then(result =>{
       console.log(result)
   })

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
   url = `${baseUrl}/restapi/update/updatepassword.php?staffid=${userId}&password=${pass1}`
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
