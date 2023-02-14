
function getProducts() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    prods = document.getElementById('prods');
    fetch("http://localhost/API/products/Read.php", requestOptions)
        .then(response => response.json())
        .then(response => {
            //console.log(response.products[0]);
            
            response.products.forEach(products => {
                console.log(products);
                prods.innerHTML += 
                `
                <div class="box_product">
                    <div class="box-img">image</div>
                    <div class="box-details">
                        <div class="box-inner box-t">`+products.name+`</div>
                        <div class="box-inner box-d">`+products.details+`</div>
                        <div class="box-inner box-p">`+products.price+`</div>
                    </div>
                </div>
                ` 
            });
        })
    .catch(error => console.log('error', error))
}
getProducts();

function getTags() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };
    tag = document.getElementById('tags');
    fetch("http://localhost/API/tags/Read.php", requestOptions)
    .then(response => response.json())
    .then(response => {
      //document.write(response.products[0]);
      response.tags.forEach(tags => {
        console.log(tags);
        tag.innerHTML += 
        `
        <div class="tag_box">
            <span>
                `
                +tags.id+ ") " +tags.name+
                `
            </span>
        </div>
        ` 
      });
    })
    .catch(error => console.log('error', error))
}
getTags();