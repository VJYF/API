var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

prods = document.getElementById('prods');
tag = document.getElementById('tags');

fetch("http://localhost/TFE_V1/products/Read.php", requestOptions)
.then(response => response.json())
.then(response => {
  //document.write(response.products[0]);
  response.products.forEach(products => {
    console.log(products);
    prods.innerHTML += `<table>
                        <thead>
                            <tr>
                                <th colspan="2">`+products.name+`</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>`+products.details+`</td>
                                <td>`+products.price+`</td>
                            </tr>
                            <tr style="height:20px">
                                <td>`+products.tag_name+`</td>
                            </tr>
                        </tbody>
                    </table>` 
  });
})
.catch(error => console.log('error', error))

fetch("http://localhost/TFE_V1/tags/Read.php", requestOptions)
.then(response => response.json())
.then(response => {
  //document.write(response.products[0]);
  response.tags.forEach(tags => {
    console.log(tags);
    tag.innerHTML += `<div class="tag_box">
                          <span>
                            `
                            +tags.id+ ") " +tags.name+
                            `
                          </span>
                      </div>` 
  });
})
.catch(error => console.log('error', error))
