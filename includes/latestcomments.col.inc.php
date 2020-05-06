<div class="col-md-8">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="my-4">Latest Comments</h1>
            </div>
            <div class="col-sm-6">
                <a href="../../Enterprise-Web-Software-Development/propose.php"><button class="btn btn-primary my-4">Propose an Idea</button></a>
            </div>
        </div>

        <!-- Idea -->

        <?php    
        
        // Select all comments from the 'comment' table and order them by the date posted
        $results = mysqli_query($conn, "SELECT * FROM comment ORDER BY comment_date DESC");

        while ($row = mysqli_fetch_array($results)) { 
            
            $user_id = $row['user__id'];
            $idea_id = $row['idea_id'];
            $time = new DateTime($row['comment_date']);
            $date = $time->format('F jS');
            $time = $time->format('H:i');

            $comment_content = $row['content'];
            // Retrieve user from 'user' table
            $user_result = mysqli_query($conn, "SELECT * FROM user WHERE id=$user_id");
            while ($row2 = mysqli_fetch_array($user_result)) {                    
            // Concatenate user firstname and lastname into 'author' variable and display author name
            $author = $row2['first_name'] . ' ' . $row2['last_name'];
            }
            $comment_content = $row['content'];
            // Retrieve idea title from 'idea' table
            $user_result = mysqli_query($conn, "SELECT * FROM idea WHERE id=$idea_id");
            while ($row3 = mysqli_fetch_array($user_result)) {                    
            // Concatenate user firstname and lastname into 'author' variable and display author name
            $idea_title = $row3['idea_title'];
            }
        ?>

        <div class="card mb-4">
            <div class="card-body">
                <h5><?php echo $author ?></h5>
                <i class="far fa-clock"></i> On <?php echo $date ?> at <?php echo $time ?>
                <p>Idea: <?php echo $idea_title ?> </p>
                <?php echo $comment_content ?>
            </div>
        </div>


        <?php } ?>

        <!-- /.Idea -->

        <!-- Pagination -->

        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

        <!-- /.Pagination -->