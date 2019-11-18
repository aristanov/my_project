<?php include 'templates/header.php' ?>
<body>
  <?php
    require_once 'connection.php';     
    $sth->execute();
?>
    <div class="row">
    <div class="col-md-8">     
  <table class ='table table-striped'>  
    <caption> Список пользователей </caption>
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Имя</th>
        <th scope='col'>Фамилия</th>
        <th scope='col'>Email</th>
        <th scope='col'>Телефон</th>
        <th scope='col'>Работа</th>
        <th scope='col'></th>
      </tr>
    </thead>
      <tbody>
      <?php while ($row = $sth->fetch(PDO::FETCH_LAZY)): ?>
      <?php if ($row['del'] != 1): ?>
        <tr id="delete<?php echo $row['id'] ?>">        
            <th scope="row"><?=$row['id']?></th>
            <td><?=$row['name']?></td>
            <td><?=$row['surname']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['phone']?></td>
            <td><?=$row['job']?></td>
            <td><button  onclick = "deleteAjax(<?php echo $row['id'];?>)" type='button' class='btn btn-outline-danger'>Удалить</button></td>
        </tr>
        <?php endif?>
         <?php endwhile ?>
      </tbody>
  </table>
   </div>
        <div class="col-md-4">
            <form action="controllers/insert.php" method="POST">
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" id="name" name = "name" placeholder="Введите имя">
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Введите фамилию">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Введите адрес почты">
                </div>
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите номер телефона">
                </div>
                <div class="form-group">
                    <label>Профессия</label>
                    <input type="text" class="form-control" id="job" name="job" placeholder="Введите профессию">
                </div>
            <button name = "submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   
    </div>

  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="inc/js/main.js"></script>
  </body>
<?php include 'templates/footer.php' ?>