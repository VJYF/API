var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

  prods = document.getElementById('prods');
  fetch("http://localhost/API/products/Read.php", requestOptions)
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
                                  <td colspan="2">`+products.tag_name+`</td>
                              </tr>
                          </tbody>
                      </table>` 
    });
  })
  .catch(error => console.log('error', error))




  tag = document.getElementById('tags');
  fetch("http://localhost/API/tags/Read.php", requestOptions)
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

