(() => {
    
    const frmInfo = document.getElementById('frmInfo');
    const proName = document.getElementById('productName');
    const brandName = document.getElementById('brandName');
    const price = document.getElementById('price');
    const stockQty = document.getElementById('stock');
    const image = document.getElementById('image');
    let tbProduct = document.getElementById('tbody');

    let productID = 0;

    const fetchData = () => {
        axios.get('/api/getProducts.php')
           .then((resFetch) => {

                tbProduct.innerHTML = '';
                // console.log(resFetch);
                resFetch.data.products.forEach((pro) => {   // products is the key (back to getProducts.php in line 21)
                    console.log(pro.id);
                    tbProduct.innerHTML += `
                        <tr class="align-middle">
                            <td>${pro.name}</td>
                            <td>${pro.brand}</td>
                            <td>${pro.price}</td>
                            <td>${pro.stock}</td>
                            <td>
                                <div style="width: 85px; height: 45px;">
                                    <img src="storage/photo/${pro.image}" alt="staff" class="h-100 w-100 object-fit-cover">
                                </div>
                            </td>
                            <td>
                                <button data-id-edit='${JSON.stringify(pro)}' class="btn btn-warning btn-edit">Edit</button>
                                <button data-id-delete='${pro.id}' class="btn btn-danger btn-delete">Delete</button>
                            </td>
                        </tr>
                    `;
                })


                document.querySelectorAll('.btn-edit').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productJSON = btn.getAttribute('data-id-edit');   //  ?
                        // console.log(productJSON);
                        const productOBJ = JSON.parse(productJSON);   // ?
                        productID = productOBJ.id;
                        proName.value = productOBJ.name;
                        brandName.value = productOBJ.brand;
                        price.value = productOBJ.price;
                        stockQty.value = productOBJ.stock;
                    })
                })

                document.querySelectorAll('.btn-delete').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const seletedID = btn.getAttribute('data-id-delete');
                        // console.log(seletedID);
                        axios.get(`/api/destroy.php?id=${seletedID}`).then( redDelete =>{
                            console.log(redDelete);
                            fetchData();
                        })
                    })
                })
            })
            .catch((error) => {
                console.error('Failed to fetch products:', error);
                tbProduct.innerHTML = '<tr class="align-middle"><td colspan="6">Failed to load products</td></tr>';
            });
    }

    fetchData();


    frmInfo.onsubmit = (e) => {
        e.preventDefault();

        let formData = new FormData();
        formData.append('name', proName.value);
        formData.append('brand', brandName.value);
        formData.append('price', price.value);
        formData.append('stock', stockQty.value);
        // formData.append('image', image.files[0]);

        if(productID > 0 ){
            formData.append('id', productID);  
        }

        if(productID == 0){
            axios.post('/api/store.php', formData)
           .then((res) => {
                // console.log(res.data);
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus;
                fetchData();
                
            });
        } else {  // edit
            alert('jg edit men');
            axios.post('/api/update.php', formData)
            .then((resUpdate) => {
                // console.log(resUpdate);
                productID = 0;
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus();
                fetchData();
            })
            .catch(error => console.error('Error:', error));
        }

        
    }


    // axios.get('/api/getProducts.php')
    //     .then((res) => {
    //         console.log(res.data);
    //         array = res.data;
    //         array.forEach((element) => {
    //             // console.log(element.name);
    //             tbProduct.innerHTML += `
    //                 <tr>
    //                     <td>${element.name}</td>
    //                     <td>${element.brand}</td>
    //                     <td>${element.price}</td>
    //                     <td>${element.stock}</td>
                        
    //                 </tr>
    //             `;

    //         });
            
    //     });
/* <td><img src="${element.image}" alt="${element.name}" width="50"></td> */
})();


