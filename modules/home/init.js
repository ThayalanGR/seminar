
    let baseUrl = localStorage.getItem('baseUrl')

    if(localStorage.roleId == 3) {
        window.location.href =  baseUrl+"/modules/admin/"
    }  

    if(localStorage.getItem('token') != null) {
        
        const token = localStorage.getItem('token')
        console.log(token)
        if(token == 0) {
            window.location.href =  baseUrl+"/modules/login/"
        }      
    }else {
        localStorage.setItem('token', 0)
        const token = localStorage.getItem('token')
        console.log(token)
        window.location.href =  baseUrl+"/modules/login/"
    }



   