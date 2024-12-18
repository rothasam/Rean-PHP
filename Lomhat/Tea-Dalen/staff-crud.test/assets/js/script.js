(() => {
    const frmStaff = document.getElementById('frm-staff');
    const iName = document.getElementById('name');
    const iPosition = document.getElementById('position');
    const iSalary = document.getElementById('salary');
    const iPhoto = document.getElementById('photo');

    frmStaff.onsubmit = (e) => {
        e.preventDefault();

        let frmData = new FormData();
        frmData.append('name', iName.value);
        frmData.append('position', iPosition.value);
        frmData.append('salary', iSalary.value);
        frmData.append('photo', iPhoto.files[0]);

        axios.post('/api/staff/store.php', frmData)
            .then((res) => {
                console.log(res);
            });
    }
})()