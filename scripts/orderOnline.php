<section id="orderOnline" class="bg-dark ">
    <div class="container">
        <div class="onlineTop py-3">
            <h4>My Order</h4>
            <span class="">(<?= isset($_SESSION['shoppingCart']) ? count($_SESSION['shoppingCart']) : 0 ?>) items</span>
        </div>
        
        <div class="table-responsive">
            <table id="onlineTable" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_SESSION['shoppingCart'])){
                            foreach ($_SESSION['shoppingCart'] as $key => $value) {
                    ?>
                        <tr>
                            <td><?=$_SESSION['shoppingCart'][$value['id']]['name']?></td>
                            <td><?=$_SESSION['shoppingCart'][$value['id']]['quantity']?></td>
                            <td><?=$_SESSION['shoppingCart'][$value['id']]['price']?></td>
                            <td><?=$_SESSION['shoppingCart'][$value['id']]['price']*$_SESSION['shoppingCart'][$value['id']]['quantity']?></td>
                            <td>
                                <a href="menu.php?action=delete&id=<?= $value['id']?>">
                                    <button type="button" class="btn-danger"?>Remove</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>

                    <tr>
                        <?php 
                            if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])){
                        ?>
                            <td class="orderNow" colspan="5"><button type="button" class="btn btn-success">Order Now</button></td>
                        <?php
                            }else{
                        ?>
                            <td class="orderNow" colspan="5"><button type="button" class="btn btn-secondary">Order Now</button></td>
                        <?php
                            }
                        ?>
                    </tr>

                </tbody>
            </table>
        </div>
        
    </div>
</section>
