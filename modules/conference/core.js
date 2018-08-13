 const authorRef = document.getElementById('author')
 const titleRef = document.getElementById('title')
 const cnameRef = document.getElementById('cname')
 const orgRef = document.getElementById('org')
 const locationRef = document.getElementById('loc')
 const ondateRef = document.getElementById('onDate')
 const ondatefRef = document.getElementById('onDatef')
 const ondatetRef = document.getElementById('onDatet')
 const pagesRef = document.getElementById('pages')
 const ctypeRef = document.getElementById('ctype')
 const urlRef = document.getElementById('url')
 const ayearRef = document.getElementById('ayear')
 const remarksRef = document.getElementById('remarks')
 const disRef = document.getElementById('dis')

function grabValue() {
   
    const author = authorRef.value
    const sel = document.getElementById("dept");
    const value = sel.options[sel.selectedIndex].value;
    const text = sel.options[sel.selectedIndex].text;
    const title = titleRef.value
    const cname = cnameRef.value
    const org = orgRef.value
    const location = locationRef.value
    const ondate = ondateRef.value
    const ondatef = ondatefRef.value
    const ondatet = ondatetRef.value
    const pages = pagesRef.value
    const ctype = ctypeRef.value
    const url = urlRef.value
    const ayear = ayearRef.value
    const remarks = remarksRef.value 
    const dispor = disRef.value
    const id1 = localStorage.getItem('token')
    console.log(id1,author,text,title,cname,org,location,ondate,ondatef,ondatet,pages,ctype,url,ayear,remarks,dispor)
    url = `http://localhost/seminar/restapi/confer/confer.php?userid=${id1}$auth=${author}&dept=${text}&tit=${title}&cname=${cname}&org=${org}
    &loc=${location}&on=${ondate}&from=${ondatef}&to=${ondatet}&pag=${pages}&ctype=${ctype}&url=${url}&acad=${ayear}&rem=${remarks}&dis=${dispor}`
    fetch(url).
    then(data => data.json()).
    then(result =>{
        console.log(result)
    })

}
