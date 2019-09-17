<section class="paymentSection bg-dark ">
    <form class="modal" method="post" action="menu.php?action=finalize" id="payment">
        <div class="form-group">
            <div class="text-white">
                <label for="FullName">Full Name</label>
                <input class="form-control" type="text" name="FullName" id="FullName">

                <label for="Email">Email</label>
                <input class="form-control" type="text" name="Email" id="Email">

                <label for="Address">Address</label>
                <input class="form-control" type="text" name="Address" id="Address">

                <label for="City">City</label>
                <input class="form-control" type="text" name="City" id="City">

                <div class="row">
                    <label for="State">State</label>
                    <label for="Zip">Zip</label>
                </div>
                
                <div class="row">
                    <input class="form-control col-5" type="text" name="State" id="State"> 
                    <input class="form-control col-5" type="text" name="Zip" id="Zip">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="text-white">
                <label for="CardName"> Name on Card</label>
                <input class="form-control" type="text" name="CardName" id="CardName">

                <label for="CreditCard">Credit Card Number</label>
                <input class="form-control" type="text" name="CreditCard" id="CreditCard">

                <div class="row">
                    <label for="ExpMonth">Exp Month</label>
                    <label for="ExpYear">Exp Year</label>
                </div>

                <div class="row">
                    <input class="form-control col-5 mx-2" type="text" name="ExpYear" id="ExpYear">
                    <input class="form-control col-5 mx-2" type="text" name="ExpMonth" id="ExpMonth">  
                </div>
                

                <label for="CVV">CVV</label>
                <input class="form-control" type="text" name="CVV" id="CVV">
            </div>  
        </div>

        <input type="submit" name="finalize" class="btn btn-success mb-4 px-4">
        <button type="button" class="btn btn-secondary mb-4 px-4" data-dismiss="modal">Continue Shopping</button>
        
    </form>
</section>