(() => {
    
    const frmInfo = document.getElementById('frmInfo');
    const proName = document.getElementById('productName');
    const brandName = document.getElementById('brandName');
    const price = document.getElementById('price');
    const stockQty = document.getElementById('stock');
    const image = document.getElementById('image');

    let tbody = document.getElementById('tbody');


    frmInfo.onsubmit = (e) => {
        e.preventDefault();

        let formData = new FormData();
        formData.append('name', proName.value);
        formData.append('brand', brandName.value);
        formData.append('price', price.value);
        formData.append('stock', stockQty.value);
        formData.append('image', image.files[0]);

        axios.post('/api/store.php', formData)
           .then((res) => {
                console.log(res.data);
            });
        
    }


    axios.get('/api/getProducts.php')
        .then((res) => {
            console.log(res.data);
            array = res.data;
            array.forEach((element) => {
                // console.log(element.name);
                tbody.innerHTML += `
                    <tr>
                        <td>${element.name}</td>
                        <td>${element.brand}</td>
                        <td>${element.price}</td>
                        <td>${element.stock}</td>
                        
                    </tr>
                `;

            });
            
        });
{/* <td><img src="${element.image}" alt="${element.name}" width="50"></td> */}
})();


