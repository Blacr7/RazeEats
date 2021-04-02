<?php 
    session_start();
    $itemIds = array();
    $currentId = filter_input(INPUT_GET, 'id');
    //session_destroy();
    
    //Print_r wrapped in <pre> tags
    function customPrint($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    if(filter_input(INPUT_POST, 'add')){
        if(isset($_SESSION['shoppingCart'])){
            $count = count($_SESSION['shoppingCart']);
            $itemIds = array_column($_SESSION['shoppingCart'], 'id');

            if(!in_array(filter_input(INPUT_GET, 'id'), $itemIds)){
                $_SESSION['shoppingCart'][$currentId] = array(
                    'id'=>filter_input(INPUT_GET, 'id'),
                    'name'=>filter_input(INPUT_POST, 'name'),
                    'price'=>filter_input(INPUT_POST, 'price'),
                    'quantity'=>filter_input(INPUT_POST, 'quantity')
                );
            }else{
                for($i = 0; $i < count($itemIds); $i++){
                    if($itemIds[$i] == filter_input(INPUT_GET, 'id')){
                        $_SESSION['shoppingCart'][$currentId]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    }
                }
            }

        }else{
            $_SESSION['shoppingCart'][$currentId] = array(
                'id'=>filter_input(INPUT_GET, 'id'),
                'name'=>filter_input(INPUT_POST, 'name'),
                'price'=>filter_input(INPUT_POST, 'price'),
                'quantity'=>filter_input(INPUT_POST, 'quantity'),
            );
        }
    }

    if(filter_input(INPUT_GET, 'action') === 'delete'){
        foreach ($_SESSION['shoppingCart'] as $key => $value) {
            if($value['id'] === filter_input(INPUT_GET, 'id')){
                unset($_SESSION['shoppingCart'][$key]);
            }
        }
    }

    if(filter_input(INPUT_POST, 'finalize') && isset($_SESSION['shoppingCart'])){
        foreach ($_SESSION['shoppingCart'] as $key => $value) {
            unset($_SESSION['shoppingCart'][$key]);
        }
        session_destroy();
        echo '<script language="javascript"> ';
        echo 'alert("Thank you for your purchase")';
        echo '</script>';
        
    }

    if(filter_input(INPUT_GET, 'action') === 'removeAll' && isset($_SESSION['shoppingCart'])){
        foreach ($_SESSION['shoppingCart'] as $key => $value) {
            unset($_SESSION['shoppingCart'][$key]);
        }
        session_destroy();
    }

    require 'scripts/header.php'; 
    require 'scripts/payment.php';

    //mysql://b6358edcee6a94:92247908@us-cdbr-iron-east-02.cleardb.net/heroku_960d9c70cf03fa6?reconnect=true
    $connect = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b6358edcee6a94', '92247908', 'heroku_960d9c70cf03fa6');
    $query = 'SELECT * FROM menu ORDER by id ASC';

    
    $result = mysqli_query($connect, $query);
?>

<section class="menu bg-dark" id="menu">
    <div class="container">

        <h2 class="text-white text-center pt-4">Menu</h2>

        <div class="card-deck flex-xl-row column flex-column ">
            <?php
                if($result){
                    if(mysqli_num_rows($result)>0){
                        // Generate the form and a card for every Row in the $result table
                        while($item = mysqli_fetch_assoc($result)){
                        ?>
                            <form target="_top" class="foodItems" method="post" action="menu.php?action=add&id=<?=$item['id']; ?>" >
                                <div class="card my-3">
                                    <img class="card-img-top" src="<?= $item['Image'];?>" alt="">
                                        
                                        <div class="card-header">
                                            <h4 class="card-title"><?=$item['Name']?></h4>
                                        </div>

                                        <div class="card-body">
                                            <span class="text"><?= $item['Description']?></span>
                                            <input class="text form-control" type="text" name="quantity" id="<?= $item['Name'] . " quantity"?>" value=<?= $item['Quantity'] ?>>
                                            <input type="hidden" name="name" value="<?=$item['Name']?>">
                                            <input type="hidden" name="price" value="<?=$item['Price']?>">

                                            <input class="btn btn-success text" name="add" type="submit" value="Add To Cart">

                                            <div class="prices">
                                                <!-- Display the Price of the Current Item -->
                                                <span class="">$<?= $item['Price']; ?></span>
                                                
                                                <!-- Display the total price of the current Quantity of items -->
                                                <span class="">$<?= isset($_SESSION['shoppingCart'][$item['id']]) ? $item['Price']*$_SESSION['shoppingCart'][$item['id']]['quantity'] . " ({$_SESSION['shoppingCart'][$item['id']]['quantity']})" : $item['Price']*$item['Quantity'] . " ({$item['Quantity']})" ?></span>  
                                            </div>
                                        </div>
                                    </div>        
                            </form>
                        <?php
                        }
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php 
    require 'scripts/carousel.php';
    require 'scripts/orderOnline.php'; 
    require 'scripts/footer.php';
?>