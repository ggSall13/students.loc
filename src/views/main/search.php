<?php require INCLUDES . '/header.php' ?>

<div class="container">
   <h2 class="my-5">Список студентов:</h2>
   <details>
      <summary>Сортировка</summary>
      <p><a href="/sort/name">Сортировать по имени А-Я</a></p>
      <p><a href="/sort/name/desc">Сортировать по имени Я-А</a></p>
      <p><a href="/sort/lastName">Сортировать по фамилии А-Я</a></p>
      <p><a href="/sort/lastName/desc">Сортировать по фамилии Я-А</a></p>
      <p><a href="/sort/groupName">Сортировать по номеру группы А-Я</a></p>
      <p><a href="/sort/groupName/desc">Сортировать по номеру группы Я-А</a></p>
      <p><a href="/sort/grade/desc">Сортировать по оценке по убыванию</a></p>
      <p><a href="/sort/grade">Сортировать по оценке по возрастанию</a></p>
   </details>
   <table class="table my-5">
      <thead>
         <tr>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Номер Группы</th>
            <th scope="col">Баллы</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $user) : ?>
            <tr>
               <th scope="row"><?= $user['name'] ?></th>
               <td><?= $user['lastName'] ?></td>
               <td><?= $user['groupName'] ?></td>
               <td><?= $user['grade'] ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>


<?php require INCLUDES . '/footer.php' ?>