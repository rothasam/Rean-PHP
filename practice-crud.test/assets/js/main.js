(() => {
    
    const frmInfo = document.getElementById('frmInfo');
    const proName = document.getElementById('productName');
    const brandName = document.getElementById('brandName');
    const price = document.getElementById('price');
    const stockQty = document.getElementById('stock');
    const image = document.getElementById('image');
    let tbProduct = document.getElementById('tbody');
    const titleAction = document.getElementById('title-action');
    const btnSubmit = document.getElementById('btn-submit');
    const inputSearch = document.getElementById('inputSearch');
    const frmSearch = document.getElementById('frmSearch');
    btnSubmit.style.backgroundColor = '#3A6DC4';

    let productID = 0;
    
    const showToast = (message,classColor) => {
        const toastMsg = document.getElementById('toastBody');
        const toastLive = document.getElementById('liveToast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLive);
        toastMsg.innerHTML = message;
        toastLive.classList.add(classColor);
        toastBootstrap.show()
    }


    const fetchData = () => {
        axios.get('/api/getProducts.php')
           .then((resFetch) => {

                tbProduct.innerHTML = '';
                // console.log(resFetch);
                resFetch.data.products.forEach((pro) => {   // products is the key (back to getProducts.php 21)
                    console.log(pro.id);
                    tbProduct.innerHTML += `
                        <tr class="text-center align-middle">
                            <td class="fw-semibold">#${pro.id}</td>
                            <td class="d-flex gap-3 align-items-center ps-5">
                                <div style="width: 85px; height: 60px;">
                                    <img src="storage/photo/${pro.image}" alt="product" class="h-100 w-100 object-fit-cover rounded-1">
                                </div>
                                <p class="mb-0">${pro.name}</p>
                            </td>
                            <td>${pro.brand}</td>
                            <td>$${pro.price}</td>
                            <td>${pro.stock}</td>
                            <td>
                
                                <button data-id-edit='${JSON.stringify(pro)}' class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil"></i></button>
                                <button data-id-delete='${pro.id}' class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                    `;
                })
                // <button data-id-view='${pro.id}' class="btn btn-success btn-view"><i class="fa-solid fa-eye"></i></button>

                document.querySelectorAll('.btn-edit').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        titleAction.innerHTML = 'Edit Product';
                        btnSubmit.innerHTML = 'Save Update';
                        btnSubmit.style.backgroundColor = '#FFC107';
                        const productJSON = btn.getAttribute('data-id-edit');   
                        // console.log(productJSON);
                        const productOBJ = JSON.parse(productJSON);   
                        productID = productOBJ.id;
                        proName.value = productOBJ.name;
                        brandName.value = productOBJ.brand;
                        price.value = productOBJ.price;
                        stockQty.value = productOBJ.stock;
                        fetchData();
                    })
                })

                document.querySelectorAll('.btn-delete').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const seletedID = btn.getAttribute('data-id-delete');
                        // console.log(seletedID);
                        axios.get(`/api/destroy.php?id=${seletedID}`)
                        .then( redDelete =>{
                            // console.log(redDelete);
                            showToast('Delete Product Successful','bg-danger');
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
        formData.append('image', image.files[0]);

        if(productID > 0 ){
            formData.append('id', productID);  
        }

        if(productID == 0){
            axios.post('/api/store.php', formData)
            .then((res) => {
                // console.log(res.data);
                showToast('Add Product Successful','bg-success');
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus();
                fetchData();
                
            })
            .catch(error => console.error('Error:', error));
        } else {  // edit
            
            axios.post('/api/update.php', formData)
            .then((resUpdate) => {
                // console.log(resUpdate);
                showToast('Update Product Successful','bg-success');
                titleAction.innerHTML = 'Add New Product';
                btnSubmit.innerHTML = 'Add Product';
                btnSubmit.style.backgroundColor = '#3A6DC4';
                productID = 0;
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus();
                fetchData();
            })
            .catch(error => console.error('Error:', error));
        }

        
    }


    frmSearch.onsubmit = (e) => {
        e.preventDefault();
    
        let formData = new FormData();
        formData.append('search', inputSearch.value);
    
        axios.post('/api/search.php', formData)
            .then((resSearch) => {
                const results = resSearch.data.products;
                tbProduct.innerHTML = ''; 
    
                if (results.length > 0) {
                    results.forEach((product) => {
                        tbProduct.innerHTML += `
                            <tr class="text-center align-middle">
                                <td class="fw-semibold">#${product.id}</td>
                                <td class="d-flex gap-3 align-items-center ps-5">
                                    <div style="width: 85px; height: 60px;">
                                        <img src="storage/photo/${product.image}" alt="product" class="h-100 w-100 object-fit-cover rounded-1">
                                    </div>
                                    <p class="mb-0">${product.name}</p>
                                </td>
                                <td>${product.brand}</td>
                                <td>$${product.price}</td>
                                <td>${product.stock}</td>
                                <td>
                                    <button data-id-edit='${JSON.stringify(product)}' class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil"></i></button>
                                    <button data-id-delete='${product.id}' class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                } 
                else {
                    tbProduct.innerHTML = `
                    <tr class="proNotFound">
                    	<td colspan="6" class="text-center">
                        <div>
                            <img src="assets/img/no-data.png" alt="Not Found" >
                            <h4 class="py-4">Product Not Found!!!</h4>
                        </div>
    
                        </td>
                    </tr>`;
                }
            })
            .catch((error) => {
                console.error('Search failed:', error);
                tbProduct.innerHTML = '<tr><td colspan="6" class="text-center">Search failed. Please try again.</td></tr>';
            });
    };

    


    // const row = document.getElementsByTagName('tr');
    // const clickEdit = document.querySelectorAll('.btn-edit');

    // tbProduct.forEach((item) => {
    //     clickEdit.addEventListener('click',() => {
    //         row.forEach( i => {
    //             i.style.backgroundColor = '';
    //         })
    //         row.style.backgroundColor = 'lightblue';
    //     })    
    // });


})();


