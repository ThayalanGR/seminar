
 const titleRef = document.getElementById('bname')
 const authorRef = document.getElementById('aname')
 const monyRef = document.getElementById('mon')
 const remarkRef = document.getElementById('remark')

function grabBook() {

    const title = titleRef.value
    const author   = authorRef.value
    const mony  = monyRef.value
    const remarks   = remarkRef.value
    const id1 = localStorage.getItem('token')
    console.log(id1,title,author,remarks)
    url = `http://localhost/seminar/restapi/book/book.php?tit=${title}&auth=${author}&userid=${id1}&monyr=${mony}&rem=${remarks}`
    fetch(url).
    then(data => data.json()).
    then(result => {
        console.log(result)
    })
}