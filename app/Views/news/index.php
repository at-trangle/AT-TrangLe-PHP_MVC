<?php
  include('../public/layout/header.php');
?>
  <h1><span class="blue"><span class="yellow">Show list news</pan></h1>
  <table class="container">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Preview</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
        foreach($result as $key => $values){
      ?>
        <td scope="row"><?php echo $values['id']; ?></td>
        <td><?php echo $values['name']; ?></td>
        <td><?php echo $values['preview']; ?></td>
        <td>
          <a href="/news/edit/<?php echo $values['id']; ?>"><i class="fas fa-edit"></i></a> |
          <a href="/news/del/<?php echo $values['id']; ?>" onclick="alert('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class = "pagination">
    <?php
      if($current_page > 1 && $paginate > 1){
        echo '<a href="/news/index?page='.($current_page-1).'">Prev</a> | ';
      }
      for ($i = 1; $i <= $paginate; $i++){
        if ($i == $current_page){
          echo '<span>'.$i.'</span> | ';
        }
        else{
          echo '<a href="/news/index?page='.$i.'">'.$i.'</a> | ';
        }
      }
      if ($current_page < $paginate && $paginate > 1){
        echo '<a href="/news/index?page='.($current_page+1).'">Next</a> ';
      }
    ?>
  </div>
  
</body>
</html>
