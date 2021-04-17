<section id="goToContact" class="contact">
    <div class="contactSeparator">
        <form class="container" method="post"  action="https://formspree.io/blacr7@mail.broward.edu">
            <h2><span>Book a </span> <span>Table</span></h2>

            <div class="form-group ">
                <label for="formName" class="col-form-label">Table Name *</label>

                <input type="Text" class="form-control" id="formName" placeholder="Please Enter Your Name" required>
            </div>

            <div class="form-group formNumbers">
                <div class="form-group">
                    <label for="formPhoneNumber" class="col-form-label">Phone Number </label>
            
                    <input type="tel" class="form-control" id="formPhoneNumber"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
                </div>

                <div class="form-group">
                    <label for="formNumber" class="col-form-label">Number of Guests *</label>
                
                    <input type="number" class="form-control" id="formNumber"  value='1' min='1' max='10' required>
                </div>
                
                
            </div>

            <div class="form-group ">
                <label for="dateTime" class=" col-form-label">Date and Time *</label>

                <input class="form-control" type="datetime-local" min="<?php echo date("Y-m-d", strtotime("-0 days")) . "T00:00"; ?>" id="dateTime" required>
            </div>

            <div class="form-group ">
                <label for="formTextarea">Special Requests</label>
                <textarea class="form-control" id="formTextarea" placeholder="Do you need special accommodations, or have other information you'd like us to know? write it here:  " rows="5" ></textarea>
            </div>

            <div class="form-group submit"><input class="form-control" type="submit" value="Submit"></div>
        </form>
    </div>
    
</section>