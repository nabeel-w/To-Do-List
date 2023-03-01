<!DOCTYPE html>
<html lang="en">
	<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <style>
            .form{
                
            }
        </style>
	</head>
<body>
		<h3 class="display-4" style="text-align: center;" >PHP - Simple To Do List App</h3><br><br>
				<form method="POST" class="form-inline" action=".partials\add.php">
                <div style="margin-left: 40em; margin-right: auto;" class="row g-3 align-items-center">
                <div class="col-auto">
					<input type="text" autocomplete="off" placeholder="Write your Task here" class="form-control" name="task" required/>
                </div>
                <div class="col-auto">	
                    <button class="btn btn-outline-primary form-control" name="add" style="border-radius: 25px;">Add Task</button>
                </div>
                
                </div>
				</form>
                <br>
                <br>
                <h3 class="display-5" style="text-align: center;">Your Tasks</h3><br>
                <div class="row justify-content-center">
                <div class="col-auto">
		    <table class="table table-striped table table-bordered table table-responsive">
			<thead>
				<tr>
					<th>Serial Number</th>
					<th>Task</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				<?php
					require '.partials\conn.php';
					$query = $conn->query("SELECT * FROM `tasks` ORDER BY `task_id` ASC");
					$count = 1;
					while($fetch = $query->fetch_array()){
				?>
                <?php if($fetch['status']==1){
				echo '<tr class="table-success">';
                } ?>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['task']?></td>
					<td><?php 
                        if($fetch['status']==1){
                            echo "Done";
                        }
                        else
                            echo "Pending"
                        ?>
                    </td>
					<td colspan="2">
						<center>
							<?php
								if($fetch['status'] != 1){
									echo 
									'<a href=".partials\update.php?task_id='.$fetch['task_id'].'" style="border-radius: 25px;" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                  </svg>
                                  </a> |';
								}
							?>
							 <a href=".partials\delete.php?task_id=<?php echo $fetch['task_id']?>" style="border-radius: 25px;" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></span></a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
        </div>
        </div>
	</div>
</body>
</html>