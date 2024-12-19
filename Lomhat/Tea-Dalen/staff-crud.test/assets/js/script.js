(() => {

    // document.getElementById()



    // return

    const frmStaff = document.getElementById('frm-staff');
    const iName = document.getElementById('name');
    const iPosition = document.getElementById('position');
    const iSalary = document.getElementById('salary');
    const iPhoto = document.getElementById('photo');
    const tblStaff = document.getElementById('tbl-staff');
    const sTotal = document.getElementById('span-total');

    const loadData = () => {
        axios.get('/api/staff/index.php').then(res => {
            // console.log('Res = ',res);
            tblStaff.innerHTML = '';
            res.data.staffs.forEach((staff) => {
                tblStaff.innerHTML += `
                    <tr class="align-middle">
                        <td>${staff.id}</td>
                        <td>
                            <div class="d-flex gap-3 align-items-center">
                                <img src="/storage/photo/${staff.photo}" alt="staff" class="object-fit-cover rounded-circle" style="width: 45px; height: 45px;">
                                <p class="mb-0">${staff.name}</p>
                            </div>
                        </td>
                        <td>${staff.position}</td>
                        <td>${staff.salary.toLocaleString()}$</td>
                        <td>
                            <div class="d-flex gap-3">
                                <a role="button" class="text-warning btn-edit">Edit</a>
                                <a data-id=${staff.id} role="button" class="text-danger btn-delete">Delete</a>
                            </div>
                        </td>
                    </tr>
                `;
            })
            sTotal.innerText = `$${res.data.total_salary.toLocaleString()}`;

            document.querySelectorAll('.btn-delete').forEach(btn => {
                btn.onclick = (e) => {
                    const selectedId = btn.getAttribute('data-id');
                    axios.get(`/api/staff/destroy.php?id=${selectedId}`).then(resDelete => {
                        console.log(resDelete);
                        loadData();
                    })
                }
            })

            document.querySelectorAll('.btn-edit').forEach(btn => {
                btn.onclick = (e) => {
                    alert('Edit')
                }
            })
        })
    }

    loadData();

 


    frmStaff.onsubmit = (e) => {
        e.preventDefault();

        let frmData = new FormData();
        frmData.append('name', iName.value);
        frmData.append('position', iPosition.value);
        frmData.append('salary', iSalary.value);
        frmData.append('photo', iPhoto.files[0]);

        axios.post('/api/staff/store.php', frmData)
            .then(res => {
                console.log(res);
                // if(!res.data.result){
                //     alert(res.data.message);
                //     return;
                // }
                iName.value = iPosition.value = iSalary.value = iPhoto.value = '';
                iName.focus();
                loadData();
            });
    }
})()