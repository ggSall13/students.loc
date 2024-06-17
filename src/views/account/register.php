<?php require INCLUDES . '/header.php' ?>

<form action="register" method="post">
   <div class="container py-3">
      <div class="row">
         <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
            <?php if ($error) : ?>
               <div class="mb-3">
                  <h3 class="error"><?= $error; ?></h3>
               </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" id="name" placeholder="Имя">
               <label for="name" class="form-label">Имя</label>
            </div>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="lastName" value="<?= isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '' ?>" id="name" placeholder="Фамилия">
               <label for="name" class="form-label">Фамилия</label>
            </div>
            <div class="form-floating mb-3">
               <input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" id="email" placeholder="Почта">
               <label for="email" class="form-label">Почта</label>
            </div>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="groupName" value="<?= isset($_POST['groupName']) ? htmlspecialchars($_POST['groupName']) : '' ?>" id="gropName" placeholder="Группа">
               <label for="gropName" class="form-label">Название группы</label>
            </div>
            <div class="form-floating mb-3">
               <input type="number" class="form-control" name="yearBirth" value="<?= isset($_POST['yearBirth']) ? htmlspecialchars($_POST['yearBirth']) : '' ?>" id="yearBirth" placeholder="Год рождения">
               <label for="yearBirth" class="form-label">Год рождения</label>
            </div>
            <div class="mb-3">
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                     Мужской
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                     Женский
                  </label>
               </div>
            </div>
            <div class="form-floating mb-3">
               <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
               <label for="password" class="form-label">Пароль</label>
            </div>
            <div class="form-floating mb-3">
               <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="Повторите пароль">
               <label for="rePassword" class="form-label">Повторите Пароль</label>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary">Ready</button>
            </div>
         </div>
      </div>

   </div>
</form>

<?php require INCLUDES . '/footer.php' ?>