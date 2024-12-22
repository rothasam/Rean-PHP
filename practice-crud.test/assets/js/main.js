(() => {
    
    const frmInfo = document.getElementById('frmInfo');
    const proName = document.getElementById('productName');
    const brandName = document.getElementById('brandName');
    const price = document.getElementById('price');
    const stockQty = document.getElementById('stock');
    const image = document.getElementById('image');
    let tbProduct = document.getElementById('tbody');
    // const labelName = document.getElementById('labelName');
    // const searchBar = document.getElementById('searchBar');
    const titleAction = document.getElementById('title-action');
    const btnSubmit = document.getElementById('btn-submit');

    let productID = 0;

    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0]; // Get the selected file
    
        if (file) {
            const reader = new FileReader(); // Create a FileReader to read the file
            reader.onload = function (e) {
                const previewImg = document.getElementById('previewImg');
                previewImg.src = e.target.result; // Set the image source to the file's data URL
                previewImg.style.display = 'block'; // Show the image preview
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            // If no file is selected, hide the preview image
            const previewImg = document.getElementById('previewImg');
            previewImg.src = '';
            // previewImg.style.display = 'none';
        }
    });
    


    const fetchData = () => {
        axios.get('/api/getProducts.php')
           .then((resFetch) => {

                tbProduct.innerHTML = '';
                // console.log(resFetch);
                resFetch.data.products.forEach((pro) => {   // products is the key (back to getProducts.php in line 21)
                    console.log(pro.id);
                    tbProduct.innerHTML += `
                        <tr class="text-center align-middle">
                            <td>${pro.id}</td>
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
        formData.append('image', image.files[0]);

        if(productID > 0 ){
            formData.append('id', productID);  
        }

        if(productID == 0){
            axios.post('/api/store.php', formData)
           .then((res) => {
                // console.log(res.data);
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus();
                fetchData();
                
            });
        } else {  // edit
            
            axios.post('/api/update.php', formData)
            .then((resUpdate) => {
                // console.log(resUpdate);
                titleAction.innerHTML = 'Add New Product';
                btnSubmit.innerHTML = 'Add Product';
                productID = 0;
                proName.value = brandName.value = price.value = stockQty.value = image.value = '';
                proName.focus();
                fetchData();
            })
            .catch(error => console.error('Error:', error));
        }

        
    }

})();


