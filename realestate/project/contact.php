<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>Na kontaktoni</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Vendosni emrin" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Vendosni email-in" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="Vendosni numrin e telefonit" class="box">
         <textarea name="message" placeholder="Shkruani mesazhin tuaj" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="Dergo " name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
      <div class="box active">
         <h3><span>Si mund të anullosh një rezervim?</span><i class="fas fa-angle-down"></i></h3>
         <p>Për të anuluar rezervimin tuaj, ju lutemi kontaktoni ekipin tonë të shërbimit ndaj klientit përmes emailit ose telefonit të dhënë në faqen e kontaktit.</p>
      </div>

      <div class="box active">
         <h3><span>Kur do e marr pronësinë?</span><i class="fas fa-angle-down"></i></h3>
         <p>Pronësia juaj do të bëhet zyrtare pas përfundimit të të gjitha procedurave ligjore dhe pagesës së plotë, të cilat zakonisht zgjasin nga disa javë deri në disa muaj.</p>
      </div>

      <div class="box">
         <h3><span>Kur mund të paguaj qeranë?</span><i class="fas fa-angle-down"></i></h3>
         <p>Qeraja duhet të paguhet brenda 5 ditëve të para të çdo muaji, duke siguruar që të mbani marrëdhënien tuaj me pronarin në kushte të mira.</p>
      </div>

      <div class="box">
         <h3><span>Si mund të kontaktoj shitësin?</span><i class="fas fa-angle-down"></i></h3>
         <p>Për të kontaktuar shitësin, ju lutemi përdorni butonin 'Kontakto Shitësin' në faqen e listimit të pronës ose dërgoni një email .</p>
      </div>

      <div class="box">
         <h3><span>Pse listimi i pronave nuk shfaqet?</span><i class="fas fa-angle-down"></i></h3>
         <p>Nëse listimi i pronave nuk shfaqet, kjo mund të ndodhë për shkak të përditësimeve të fundit të faqes, filtrave të vendosur nga ju që nuk përputhen me asnjë listim aktual.</p>
      </div>

      <div class="box">
         <h3><span>Si mund të listoj një pronë?</span><i class="fas fa-angle-down"></i></h3>
         <p>Për të listuar një pronë, ndiqni këto hapa: Hyni në llogarinë tuaj në website, zgjidhni opsionin 'Listo një Pronë'.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>