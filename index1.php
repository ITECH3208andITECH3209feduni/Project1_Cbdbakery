<?php
       $select = $conn->prepare("SELECT * FROM addmenu"); 
       $select->execute();
       $result = $select->get_result(); // Get the result set from the executed statement
    ?>

<?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr> 
                    <td><img src="<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>  <a href="adminupdate.php?edit=<?php echo $row['id'];?>" class="btn1"> <i class="fas fa-edit"></i>Edit</a>
                          <a href="index.php?delete=<?php echo $row['id'];?>" class="btn1"> <i class="fas fa-trash"></i>Delete</a>
                </td>
                </tr>
            <?php
            }
            ?> 