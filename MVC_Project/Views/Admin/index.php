<h1>Admin</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/MVC_Project/Admin/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
            <tr>
                <th>No.</th>
                <!-- <th>ID</th> -->
                <th>Admin ID</th>
                <th>Admin Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php $count = 0; foreach ($admin as $ad) { $count ++?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $ad->id; ?></td>
                <td><?php echo $ad->name; ?></td>
                <td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_Project/Tasks/edit/<?php echo $task->id; ?>' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_Project/Admin/delete/<?php echo $task->id ?>' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove' onclick="return confirm('Do you want to delete this item?');"></span> Del</a></td>
            </tr>
        <?php } ?>
    </table>
</div>