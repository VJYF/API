
function getProducts() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    }   
    prods = document.getElementById('prods');
    prods.innerHTML = "";
    fetch("http://localhost/API/API/products/Read.php", requestOptions)
        .then(response => response.json())
        .then(response => {
            //console.log(response.products[0]);
            
            response.products.forEach(products => {
                //console.log(products);
                prods.innerHTML += 
                `
                <div class="p-l-card">
                    <div class="p-inner-l-card">
                        <div class="nameP" data="`+products.id+`">`+products.name+`</div>
                        <img class="imgP" src="`+products.src+`"></img>
                    </div>
                    <div class="priceP">`+products.price+` €</div>
                    <div class="addbtn">Prendre RDV</div>
                </div>
                ` 
            });
        })
    .catch(error => console.log('error', error))
}
//getProducts();

function getTags() {
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    }
    tag = document.getElementById('tags');
    tag.innerHTML = "";
    fetch("http://localhost/API/API/tags/Read.php", requestOptions)
    .then(response => response.json())
    .then(response => {
      //document.write(response.products[0]);
      //console.log(response);
      response.tags.forEach(tags => {
        //console.log(tags);  
        tag.innerHTML += 
        `
        <div class="tag_box `+tags.id+`" id="tag_box_event_`+tags.id+`" onclick="getProdsOfOneTag(`+tags.id+`)" value="`+tags.id+`">
            <span> 
                `
                 +tags.name+
                `
            </span>
        </div>
        ` 
      });
    })
    .catch(error => console.log('error', error))
}
getTags();

function getProdsOfOneTag(tag_id){

    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    }
    prods = document.getElementById('prods');
    prods.innerHTML = "";
    fetch("http://localhost/API/API/products/Read.php", requestOptions)
        .then(response => response.json())
        .then(response => {
            
            var tag_box = document.getElementById("tag_box_event_"+tag_id);
            tag_box = tag_box.classList[1];
            //console.log(tag_box.classList[1]);
            //console.log();
            response.products.forEach(products => {
                if(products.tag_id==tag_box){
                    prods.innerHTML += 
                    `
                    <div class="p-l-card">
                    <div class="p-inner-l-card">
                        <div class="nameP">`+products.name+`</div>
                        <img class="imgP" src="`+products.src+`" />
                    </div>
                        <div class="priceP">`+products.price+` €</div>
                        <div class="addbtn">Prendre RDV</div>
                    </div>
                    ` 
                }
            });
        })
    .catch(error => console.log('error', error))
    
}