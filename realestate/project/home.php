<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kreu</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<!-- home section starts  -->

<div class="home">

   <section class="center">

      <form action="search.php" method="post">
         <h3>Gjeni shtëpinë e ëndrrave</h3>
         <div class="box">
            <p>Vendos vendodhjen <span>*</span></p>
            <input type="text" name="h_location" required maxlength="100" placeholder="Vendos emrin e qytetit" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>Tipi i pronës <span>*</span></p>
               <select name="h_type" class="input" required>
                  <option value="flat">Apartament</option>
                  <option value="house">Vilë</option>
                  <option value="shop">Dyqan</option>
               </select>
            </div>
            <div class="box">
               <p>Tipi i ofruar <span>*</span></p>
               <select name="h_offer" class="input" required>
                  <option value="sale">Shitje</option>
                 
                  <option value="rent">Qera</option>
               </select>
            </div>
            <div class="box">
               <p>Buxheti minimal <span>*</span></p>
               <select name="h_min" class="input" required>
                  <option value="5000">5k</option>
                  <option value="10000">10k</option>
                  <option value="15000">15k</option>
                  <option value="20000">20k</option>
                  <option value="30000">30k</option>
                  <option value="40000">40k</option>
                  <option value="40000">40k</option>
                  <option value="50000">50k</option>
                  
               </select>
            </div>
            <div class="box">
               <p>Buxheti maksimal <span>*</span></p>
               <select name="h_max" class="input" required>
                  <option value="5000">5k</option>
                  <option value="10000">10k</option>
                  <option value="15000">15k</option>
                  <option value="20000">20k</option>
                  <option value="30000">30k</option>
                  <option value="40000">40k</option>
                  <option value="40000">40k</option>
                  <option value="50000">50k</option>
                  <option value="100000">100k</option>
                  <option value="500000">500k</option>
                  
               </select>
            </div>
         </div>
         <input type="submit" value="Kërko pronën" name="h_search" class="btn">
      </form>

   </section>

</div>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading">Shërbimet</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Bli</h3>
         <p>Blini shtëpinë tuaj të ëndrrave duke eksploruar zgjedhjet tona të pasura pronash, të cilat janë vetëm një klikim larg bërjes së juaja.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Qera</h3>
         <p>Gjeni shtëpinë ideale për qira në platformën tonë, ku opsionet e shumta dhe lehtësia e kërkimit ju sjellin më afër shtëpisë që keni imagjinuar..</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Shit</h3>
         <p>Realizoni vlerën maksimale të shtëpisë suaj duke e listuar për shitje në platformën tonë, ku mijëra blerës potencialë janë vetëm një klikim larg.</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Apartamente dhe vila</h3>
         <p>Ofrim një gamë të gjerë ndërtesash, nga apartamentet moderne e deri te vilat luksoze, duke siguruar zgjedhje për çdo preferencë dhe buxhet.</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Qendra tregtare</h3>
         <p>Ofrim një gamë të gjerë ndërtesash, nga apartamentet moderne e deri te vilat luksoze, duke siguruar zgjedhje për çdo preferencë dhe buxhet.</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>24/7 Sherbim</h3>
         <p>Ofrim një gamë të gjerë ndërtesash, nga apartamentet moderne e deri te vilat luksoze, duke siguruar zgjedhje për çdo preferencë dhe buxhet.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- listings section starts  -->

<section class="listings">

   <h1 class="heading">Listimet e fundit</h1>

   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> Dhoma</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>M2</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">Shikoni pronat</a>
               <input type="submit" value="Dërgo kërkesë" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">Nuk është shtuar asnjë pronë! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">Shto një të re</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">Shikoni te gjitha</a>
   </div>

</section>

<!-- listings section ends -->








<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>

</body>
</html>