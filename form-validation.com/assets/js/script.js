const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function (e) {
        
        const type = password.type === 'password' ? 'text' : 'password';  // type (attribute of input)
        password.type = type;

        
        eyeIcon.classList.toggle('bi-eye');  // toggle() means if the class exists => remove, if don't => add
        eyeIcon.classList.toggle('bi-eye-slash');
    });


(() => {
    const frmInfo = document.getElementById('frm-info');
    const mdlMessage = new bootstrap.Modal(document.getElementById('mdl-message'));

    //mdlMessage.show();

    frmInfo.onsubmit = (e) => {
        e.preventDefault(); // prevents the form from submitting in the normal way (no page reload or refresh)
        
        const reqData = {
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        }

        axios.post('/api/info.php', reqData).then((res) => {  // send an HTTP POST request to /api/info.php with the reqData object
            console.log(res);
            if (res.data.result == false)
            {
                document.getElementById('message-fail').innerText = res.data.message
                mdlMessage.show();
            }else{
                window.location.href = res.data.page;
            }
        })

        // axios.get('/api/info.php').then((res) => {
        //     alert(res.data);  
        // })
    }
})();

/*
    axios.post : send an HTTP POST request to /api/info.php with the reqData object 
    .then((res) => { ... }): Handles the response from the server.
    res.data: Contains the parsed JSON response from the backend(info.php).

 */ 