
    if(localStorage.getItem('token') != null) {
        
        const token = localStorage.getItem('token')
        console.log(token)
        if(token != 0) {
            window.location.href = "http://localhost/seminar/modules/home/"
        }      
    }
    else{
        localStorage.setItem('token', 0)
        const token = localStorage.getItem('token')
        console.log(token)
        if(token == 0) {
            window.location.href = "http://localhost/seminar/modules/login/"
        }     

    }



   