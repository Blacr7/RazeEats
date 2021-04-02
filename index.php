<?php  
    require 'scripts/header.php' ;
?>

<section  class="homePageSection" >
    <div class="homepage">
        <div  class="container aboutUs">
            <div class="topSection">
                <div class="aboutUsText">
                    <h3><span>Reservations</span> </h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id consectetur quis facere distinctio sed cum tempore quo cumque omnis inventore non commodi aut excepturi, dolor deserunt ad voluptatibus voluptatem expedita. omnis inventore </p>

                    <button class="btn">Book a Table</button>
                </div>
                <div class="image"></div>

            </div>
            <div class="bottomSection">
                <div class="image"></div>

                <div class="aboutUsText">
                    <h3><span>About</span><span> Us</span></h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id consectetur quis facere distinctio sed cum tempore quo cumque omnis inventore non commodi aut excepturi, dolor deserunt ad voluptatibus voluptatem expedita. omnis inventore non commodi aut excepturi, dolor deserunt ad voluptatibus amet consectetur adipisicing elit. Distinctio dolore sapiente earum, neque hic maiores quia nemo laborum optio quibusdam ullam necessitatibus</p>
                </div>
            </div>
        </div>
    </div>

    <div class="headerImage ourTeam">
        <h3 class=" display-4 headerImageText"><span>Our</span><span> Team</span></h3>
    </div>

    <div class="homepage">
        <?php  require 'scripts/team.php';?>
    </div>
</section>

<?php 
    require 'scripts/contact.php';
    require 'scripts/footer.php' ;
?>
