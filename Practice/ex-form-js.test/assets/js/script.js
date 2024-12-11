// document.addEventListener('load', function(e) {
// })

// document.addEventListener('load', (e) => {
// })

// function test(){
// }

// const test = () => { // arrow key 
// } 


(() => {
    const frmInfo = document.getElementById('frm-info');

    // frmInfo.addEventListener('submit', function(e) {
    //     e.preventDefault();
    // })
    frmInfo.onsubmit = (e) => {
        e.preventDefault(); // prevent from submitting
        // alert('Hello teacher');

        const reqData = {
            name: document.getElementById('name').value,
            phone: document.getElementById('phone').value,
            email: document.getElementById('email').value
        }
        document.getElementById('btnSave').setAttribute('disabled', 'disabled');
        axios.post('/api/info.php', reqData).then((res) => {
            document.getElementById('btnSave').removeAttribute('disabled'); 
            console.log(res.data);
        })
    
    }
    
    // axios.post('/api/info.php', resData).then((res) => {
    //     // document.getElementById('btnSave').removeAttribute('disabled'); 
    //     console.log(res.data);
    // })

    // axios.get('/api/info.php').then((res) => {
    //     alert(res.data);
    // })
})();