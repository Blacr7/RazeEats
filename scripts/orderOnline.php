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
                            $total = 0;
                            foreach ($_SESSION['shoppingCart'] as $key => $value) {
                                $currentItem = $_SESSION['shoppingCart'][$value['id']];
                                $total += $_SESSION['shoppingCart'][$value['id']]['price']*$_SESSION['shoppingCart'][$value['id']]['quantity'];
                    ?>
                        <tr>
                            <td><?=$currentItem['name']?></td>
                            <td><?=$currentItem['quantity']?></td>
                            <td><?="$" . $currentItem['price']?></td>
                            <td><?="$" . $currentItem['price'] * $currentItem['quantity']?></td>
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
                        <tr class="grandTotal ">
                            <td colspan="3">Total</td>
                            <td colspan="2"><?= isset($total) ? "$$total" : "$0";?></td>
                        </tr>

                    
                        <?php 
                            if(isset($_SESSION['shoppingCart']) && !empty($_SESSION['shoppingCart'])){
                        ?>
                            <tr>
                                <td class="orderNow" colspan="5"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#payment">Order Now</button></td>
                            </tr> 
                        <?php
                            }else{
                        ?>  
                            <tr>
                                <td colspan="5">Your Cart's Empty, Add some Items!</td>
                            </tr>
                            <tr>
                                <td class="orderNow" colspan="5"><button type="button" class="btn btn-secondary">Order Now</button></td>
                            </tr>
                            
                        <?php
                            }
                        ?>
                    

                </tbody>
            </table>
        </div>
        
    </div>
</section>
