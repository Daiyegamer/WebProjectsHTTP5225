<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    include('reusables/nav.php');
    ?>
    <div class="container-fluid">

        <div class="container">

            <div class="row">
                <div class="col">
                    <h1 class="display-5"> Add a School</h1>
                </div>
            </div>

            <div class="row"></div>
                <div class="col-md-6">
                    <form method="POST" action="addSchool.php">
                    <div class="mb-3">
                        <label for="boardname" class="form-label">Board Name</label>
                        <input type="text" class="form-control" id="boardname" name="boardname" aria-describedby="BoardName">                       
                    </div>
                    <div class="mb-3">
                        <label for="language" class="form-label">Language</label>
                        <input type="text" class="form-control" id="language" name="language" aria-describedby="Language">
                    </div>
                    <div class="mb-3">
                        <label for="schooltype" class="form-label">School Type</label>
                        <input type="text" class="form-control" id="schooltype" name="schooltype" aria-describedby="SchoolType">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>    
</body>
</html>