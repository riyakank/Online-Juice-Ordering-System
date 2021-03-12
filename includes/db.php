<?php

    $connection=mysqli_connect('localhost' , 'root' , '' , 'hariomjuicebar');
    if($connection)
    {
      // echo "success";
    }
    else
    {
        echo "ERROR IN".mysqli_error($connection);
    }


?>