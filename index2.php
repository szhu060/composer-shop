<?php
  require_once('db.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
     .fixed {
      width: 200px;
      height: 100px;
      background-color: lightyellow;
      position: fixed;
      border:1px solid green;
      top: 30px;
      z-index: 10;
     }
    </style>

    <title>Jacob's Shop</title>
  </head>
  <body>

    <div class="container">
      <h1 class="text-center text-primary my-5">Welcome to Josh's Shop</h1>
      <div class="row">
        <div class="fixed" style="display: none"></div>
        <?php

          $db = new DBConnection();

          $result = $db->getAllItemsReturnObj();
          
            
          foreach($result as $thing) {
        ?>
        <!-- <div style="display: none;" class="<?php
                  //echo $thing->getName();
                  ?>">
                  <?php
                 // echo $thing->getDescription();
                  ?>
                </div> -->


          <div class="col-4">
            <div class="card" id="<?php
                  echo $thing->getId();
                  ?>" style="width: 18rem; max-width:100%">
              <img class="card-img-top" src="<?php echo $thing->getImage_url(); ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" style="min-height: 5rem">
                  <?php
                  echo $thing->getName();
                  ?>
                </h5>
                <h4 class="card-title" style="display: none">
                  <?php
                  echo $thing->getDescription();
                  ?>
                </h4>
                <p class="text-right text-primary">
                  <b>
                  <?php
                  echo $thing->getPrice();
                  ?>
                  </b>
                </p>
                <div class="text-right">
                  <button class="btn btn-success jacob-purchase" data-price="<?php echo $thing->getPrice(); ?>">
                    Purchase.....
                  </button>
                </div>
              </div>
            </div>   
          </div>
        
        <?php
       }

        ?>
        <div style="background-color: #ddd; color: #222; position:fixed; right: 2rem; bottom: 2rem; padding: 1rem 2.5rem; border-radius: 1rem">
          Total: <span class="TotalPrice">0</span>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // function AddPrice(price){
          // console.log(price);
          // var current_price = $('.TotalPrice').text();
          // $('.TotalPrice').text((parseFloat(current_price)+parseFloat(current_price)).toFixed(2));
          //toFixed(2) 后面保留两位小数
          // }
$(document).ready(function(){
   $('.jacob-purchase').click(function(){
              // console.log('123');
              //$(this):被点击的html元素,对这个元素进行data这个function,找data-?的这个属性
              var price = $(this).data('price');
              var current_price = $('.TotalPrice').text();
              $('.TotalPrice').text((parseFloat(current_price)+parseFloat(price)).toFixed(2));
            }
         );
   $('.card').mouseenter(function(){
       $id = $(this).attr('id');
       
      $.ajax({
          
        url: "des.php",
          
          data: {
              idphp: $id
              
          },
       
          type: "POST",
                
          dataType : "json",
          success : function(data){
            $('.fixed').css('display','block');
            $('.fixed').html(data);     
              }

          })
        .fail(function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem! Your usename or password is wrong" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
      })
   });
   $('.card').mouseleave(function(){
    $('.fixed').css('display','none');
    
   });

   // $(".card").mouseenter(function(){
   //    $id = $(this).attr('id');
   //    $(".$id").css('display','block');
   // });
   // $(".card").mouseleave(function(){
   //     $id = $(this).attr('id');
   //    $(".$id").css('display','none');
   // })
});


         
         // $('.jacob-purchase').each(function(){
         //    $(this).click(function(){
         //      $(this)
         //    })
         // });
        
    </script>
  </body>
</html>