<?php require INCLUDES . '/header.php' ?>

<form action="register" method="post">
   <div class="container py-3">
      <div class="row">
         <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
            <h2 class="py-3">Профиль</h2>
            <hr>
            <?php if ($error) : ?>
               <div class="mb-3">
                  <h3 class="error"><?= $error; ?></h3>
               </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($account->name) ?>" id="name" placeholder="Имя">
               <label for="name" class="form-label">Имя</label>
            </div>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="lastName" value="<?= htmlspecialchars($account->lastName) ?>" id="name" placeholder="Фамилия">
               <label for="name" class="form-label">Фамилия</label>
            </div>
            <div class="form-floating mb-3">
               <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($account->email) ?>" id="email" placeholder="Почта">
               <label for="email" class="form-label">Почта</label>
            </div>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="groupName" value="<?= htmlspecialchars($account->groupName) ?>" id="gropName" placeholder="Группа">
               <label for="gropName" class="form-label">Название группы</label>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary">Ready</button>
            </div>
         </div>
      </div>

   </div>
</form>

<?php require INCLUDES . '/footer.php' ?>