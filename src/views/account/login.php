<?php require INCLUDES . '/header.php' ?>

<form action="login" method="post">
   <div class="container py-3">
      <div class="row">
         <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
            <?php if ($error) : ?>
               <div class="mb-3">
                  <h3 class="error"><?= $error; ?></h3>
               </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
               <input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" id="email" placeholder="Почта">
               <label for="email" class="form-label">Почта</label>
            </div>
            <div class="form-floating mb-3">
               <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
               <label for="password" class="form-label">Пароль</label>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary">Ready</button>
            </div>
         </div>
      </div>

   </div>
</form>

<?php require INCLUDES . '/footer.php' ?>