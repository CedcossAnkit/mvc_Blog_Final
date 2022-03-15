<?php
// print_r($data->post_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="m-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="blog">Home</a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $data->category ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data->post_topic ?></li>
            </ol>
        </nav>
    </div>
    <div class="row g-5 mx-3">
        <div class=" container col-md-8">
            <article class="blog-post">
                <h2 class="blog-post-title text-dark"><?php echo $data->post_title ?></h2>
                <p class="blog-post-meta text-success"> <a href="#" class="text-danger">Date:- </a>Post Date:- <?php echo $data->review_date ?></p>

                <hr>

                <h2>Blog Description</h2>
                <blockquote class="blockquote">
                    <p><?php echo $data->post_desc ?></p>

                </blockquote>

                <h1>Content</h1>
                <p><?php echo $data->post_content ?></p>

            </article>



        </div>

    </div>
</body>

</html>