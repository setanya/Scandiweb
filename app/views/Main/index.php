
<div id="productList">
    <form class="container-fluid" action="/" method="POST" >
        <div class="title">
            <div class="list">
                <h1>Product List</h1>
            </div>
            <div class="button">
                <a href="/form" class="btn btn-outline-dark">ADD</a>
                <button class="btn btn-outline-dark" type="submit" name="delete">MASS DELETE</button>
            </div>
        </div>
        <div class="products" id="blockProducts">
            <div class="row row-cols-2 row-cols-md-4 ">
                <?php foreach ($arrProduct as $key):?>
                <div class="col productCard">
                    <div class="card " style="border: 2px solid black">
                        <div class="check">
                            <input  type="checkbox" value="<?=$key['id'];?>" name="checkbox[<?=$key['id'];?>]" style="width: 2rem; height: 2rem;">
                        </div>
                        <div class="textCard">
                            <p><?=$key['sku'];?></p>
                            <p><?=$key['name'];?></p>
                            <p><?=$key['price'];?> $</p>
                            <p><?=$key['type'] ." ". $key['value_tip'];?></p>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </form>
</div>