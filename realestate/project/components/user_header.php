<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.php" class="logo"><i class="fas fa-house"></i>Kreu</a>

         <ul>
            <li><a href="post_property.php">Posto një pronë<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">Listimet<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">dashboard</a></li>
                     <li><a href="post_property.php">Posto pronë</a></li>
                     <li><a href="my_listings.php">Listimet e mia</a></li>
                  </ul>
               </li>
               <li><a href="#">Opsionet<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php">Kërko</a></li>
                     <li><a href="listings.php">Listimet</a></li>
                  </ul>
               </li>
               <li><a href="#">Ndihmë<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">Rreth nesh</a></i></li>
                     <li><a href="contact.php">Kontakto</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">Llogaria <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">Log in</a></li>
                  <li><a href="register.php">Regjistrohu </a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">Update </a></li>
                  <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">Logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->