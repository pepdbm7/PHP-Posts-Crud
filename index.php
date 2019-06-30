<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>PHP Postits Crud</title>
  </head>
  <body>
    <?php require_once 'process.php' ?>
    <div class="container">
        <!-- access to our mysql db, and create variable 'result' which refers to all the data from the db -->
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query('SELECT * FROM data') or die($mysqli->error);
        ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content:</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <?php
                // while loop used as a map() of the fetched data, to create dynamic content:
                while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div class="mx-auto" style="width: 300px;">
            <form action="process.php" method="POST">
                <div class="form-group">
                <label for="titleInput">Title</label>
                <input
                    type="text"
                    id="titleInput"
                    name="title"
                    class="form-control"
                    placeholder=" Enter a title"
                />
                </div>
                <div class="form-group">
                <label for="contentInput">Content</label>
                <input
                    type="text"
                    id="contentInput"
                    name="content"
                    class="form-control"
                    rows="3"
                    placeholder="Write the content..."
                />
                </div>
                <div class="form-group">
                <button type="submit" name="create" class="btn btn-primary">
                    Create
                </button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>