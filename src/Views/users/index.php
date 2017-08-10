<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Collective - Home</title>

        <!-- Fonts -->
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../public/css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>            
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="">
                    <div class="panel-heading"><h2>Collectiv</h2></div>
                    <div class="panel-body">
                        <a href="/user/create" class="btn btn-success btn-sm">Add New</a>
                        <br/><br/>

                        <?php if(isset($_SESSION['message'])) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['message'] ?>
                            </div>
                        <?php endif; ?> 

                        <table  class="table table-striped">
                            <thead>
                                <tr>    
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $item) : ?>
                                    <tr>
                                        <td><?php echo $item['id'] ?></td>
                                        <td><?php echo $item['first_name'] ?></td>
                                        <td><?php echo $item['last_name'] ?></td>
                                        <td><?php echo $item['email'] ?></td>
                                        <td>
                                            <a href="/user/edit/<?php echo $item['id'] ?>" class="btn btn-success btn-xs btn-round-xs">edit</a>
                                            <a href="/user/delete/<?php echo $item['id'] ?>"
                                                onClick="javascript: return confirm('Please confirm deletion');" 
                                                class="btn btn-danger btn-xs btn-round-xs">delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
