(() => {

    const frmInfo = document.getElementById('frm-info');
    const iName = document.getElementById('name');
    const iPhoto = document.getElementById('photo');

    frmInfo.onsubmit = (e) => {
        e.preventDefault();

        let frmData = new FormData(); 
        frmData.append('name', iName.value);
        frmData.append('photo', iPhoto.files[0]);

        axios.post('/api/file.php',frmData)  // won't convert into json , unlike plain JavaScript objects
            .then((res) => {
                console.log(res);
            });
    }


})()