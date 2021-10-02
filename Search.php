
<?php

require 'functions.php';

$q = $_GET['q'];
$q = ucwords($q);
$result = query("SELECT * FROM diskusi WHERE title LIKE '%$q%' AND approve = 1");
$result2 = query("SELECT * FROM diskusi");

SESSION_START();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Hasil Pencarian : </h3>
	<?php foreach ($result as $row): ?>


		<div class="page-content">
          	<section class="row navbar-fixed-top">
                <div class="col-12 col-lg-9">
                    <section class="section">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center"><?php echo $row['title'] ?></h4>
                                      	<div class="text-center" style="font-size: 12px;">Create by : <?php echo $row['author']; ?></div>
                                        <a href="forum.php?id= <?= $row['id']; ?>" >
                                            <div class="px-4">
                                            	<?php if ($_SESSION['username'] == 'admin132'): ?>
                                            		<br>
													<a href="deletediscussion.php?id= <?= $row['id']; ?>" style="text-align:center;">
	                                                    <div class="px-4">
	                                                        <button type="button" class="btn btn-danger">Delete</button>
	                                                    </div>
	                                                </a>
                                            		
                                            	<?php endif ?>
                                                        
                                                <button class='btn btn-block btn-m btn-light-primary font-bold mt-3 hover'>
                                                  	Mulai Diskusi !
                                                </button>
                                                
                                            </div>
                                        </a>
                                    </div>
             		            </div>
                      	    </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
	<?php endforeach ?>
	<b></b>Tidak menemukan yang anda inginkan ? anda dapat membuatnya <a href="makeDiscuss.php">disini</a>

	<hr style="border: 10px solid black; border-radius: 5px;">


</body>
</html>