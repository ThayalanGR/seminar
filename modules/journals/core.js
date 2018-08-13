const authorRef = document.getElementById('author')
const titleRef = document.getElementById('title')
const jnameRef = document.getElementById('jname');
const monRef = document.getElementById('month')
const yearRef = document.getElementById('year')
const volRef = document.getElementById('vol')
const isRef = document.getElementById('issue')
const pagesRef = document.getElementById('pages')
const jtypeRef = document.getElementById('jtype')
const jurlRef = document.getElementById('jurl')
const ptypeRef = document.getElementById('ptype')
const ayearRef = document.getElementById('ayear')
const remarksRef = document.getElementById('remarks')
const disRef = document.getElementById('dis')

function grabValue() {
  
   const author = authorRef.value
   const sel = document.getElementById("dept");
   const value = sel.options[sel.selectedIndex].value;
   const text = sel.options[sel.selectedIndex].text;
   const title = titleRef.value
   const jname = jnameRef.value
   const month = monRef.value
   const year = yearRef.value
   const volume = volRef.value
   const issue = isRef.value
   const pages = pagesRef.value
   const jtype = jtypeRef.value
   const jurl = jurlRef.value
   const ptype = ptypeRef.value
   const ayear = ayearRef.value
   const remarks = remarksRef.value 
   const dispor = disRef.value
   const id1 = localStorage.getItem('token')
   console.log(id1,author,text,title,jname,month,year,volume,issue,pages,jtype,jurl,ptype,ayear,remarks,dispor)
   url = `http://localhost/seminar/restapi/journals/journals.php?userid=${id1}$auth=${author}&dept=${text}&tit=${title}&jname=${jname}&mon=${month}
   &year=${year}&vol=${volume}&is=${issue}&pag=${pages}&jtype=${jtype}&jurl=${jurl}&ptype=${ptype}&acad=${ayear}&rem=${remarks}&dis=${dispor}`
   fetch(url).
   then(data => data.json()).
   then(result =>{
       console.log(result)
   })

}
