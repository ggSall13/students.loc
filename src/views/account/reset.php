<?php require INCLUDES . '/header.php' ?>

<form action="reset" method="post">
   <div class="container py-3">
      <div class="row">
         <div class="col-md-6 position-absolute top-50 start-50 translate-middle">
            <div class="form-floating mb-3">
               <input type="email" class="form-control" name="email" id="email" placeholder="Почта">
               <label for="email" class="form-label">Введите новую почту</label>
            </div>
            <div class="mb-3">
               <button class="btn btn-primary">Ready</button>
            </div>
         </div>
      </div>

   </div>
</form>

<?php require INCLUDES . '/footer.php' ?>