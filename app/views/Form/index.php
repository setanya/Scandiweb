    <div id="formAdd">
        <div class="container-fluid" >
            <form action="" method="POST"  class="form">
                <div class="title">
                    <div class="list">
                        <h1>Product Add</h1>
                    </div>
                    <div class="button">
                        <button class="btn btn-outline-dark" type="submit" name="submit">Save</button>
                        <a href="/" class="btn btn-outline-dark" >Cancel</a>
                    </div>
                </div>
                <div><br>
                    <span style="margin-right:30px;"><b>SKU</b></span>
                    <input type="text" name="sku"><br><br>
                    <span style="margin-right: 18px;"><b>Name</b></span>
                    <input type="text" name="name"><br><br>
                    <b>Price ($)</b>
                    <input type="text" name="cost"><br>
                </div>
                <?if((isset($_POST['sku']) && empty($_POST['sku'])) || (isset($_POST['name']) && empty($_POST['name'])) || (isset($_POST['cost']) && empty($_POST['cost']))):?>
                    <p style="color:red;"><? echo'Please, submit required data';?></p>
                <?endif;?>
                <br><b>Type Switcher</b>
                <select  name="type"  onchange='showHideDiv(this)' >
                    <option></option>
                        <?foreach ($category as $value):?>

                            <option  value="<?=$value['id'];?>"><?=$value['category'];?></option>
                        <?endforeach;?>
                </select><br>
                <?if(isset($_POST['type']) && ($_POST['type'] ==="")):?>
                    <p style="color:red;"><? echo 'Please, provide the data of indicated type';?></p>
                <?endif;?>
                <div class="option">
                    <div id="optionSize" class="optionSize">
                        <div class="blockForm">
                            <b>Size (MB)</b>
                                <input type="text" name="size">
                                <p style="padding-top: 10px"><b>"Product description"</b></p>
                        </div>
                    </div>
                    <div id="optionWeight" class="optionWeight">
                        <div class="optionSize">
                            <div class="blockForm">
                                <b>Weight (KG)</b>
                                <input type="text" name="weight">
                                <p style="padding-top: 10px"><b>"Product description"</b></p>
                            </div>
                        </div>
                    </div>
                    <div id="optionDimension" class="optionDimension">
                        <div class="blockForm">
                            <b>Height (CM)</b>
                            <input type="text" name="height"><br>
                            <b>Width (CM)</b>
                            <input type="text" name="width" style="margin-left: 5px"><br>
                            <b>Length (CM)</b>
                            <input type="text" name="length"><br>
                            <p style="padding-top: 10px"><b>"Product description"</b></p>
                        </div>
                    </div>
                    <?if(($_POST['type'] == 1) && empty($_POST['size'])):?>
                        <p style="color:red;"><? echo 'Please, provide dimensions';?></p>
                    <?endif;?>
                    <?if(($_POST['type'] == 2) && empty($_POST['weight'])):?>
                        <p style="color:red;"><? echo 'Please, provide weight';?></p>
                    <?endif;?>
                    <?if(($_POST['type'] == 3) && (empty($_POST['height']) && empty($_POST['width']) && empty($_POST['length']))):?>
                            <p style="color:red;"><? echo 'Please, provide size';?></p>
                    <?endif;?>
                </div>
            </form>
        </div>
    </div>
