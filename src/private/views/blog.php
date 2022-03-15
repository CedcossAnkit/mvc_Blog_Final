<?php
echo "<pre>";
// print_r($data);
// foreach ($data['feature'] as $key => $value) {
//   print_r($value);
//   //  $value->post_id;
// }
// print_r($data['feature']);
// echo $data['feature']->post_title;
echo "</pre>";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Blog Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">

  <link rel="stylesheet" href="../../public/assest/blog.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="blog.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <!-- <a class="link-secondary" href="#">Subscribe</a> -->
        </div>
        <div class="col-4 text-center">
          <h3 class="text-primary">Welcome to the Blog "<?php if (isset($_SESSION['login'])) {
                                                                echo $_SESSION['login']['name'];
                                                              } else {
                                                                echo "**";
                                                              } ?>"</h3>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
              <title>Search</title>
              <circle cx="10.5" cy="10.5" r="7.5" />
              <path d="M21 21l-5.2-5.2" />
            </svg>
          </a>
          <a class="btn btn-sm btn-outline-secondary" href="<?php
                                                            if (isset($_SESSION['login'])) {
                                                              echo "http://localhost:8080/public/admin/signin";
                                                            } else {
                                                              echo "http://localhost:8080/public/admin/signin";
                                                            }
                                                            ?>
                                                                
                                                                "><?php
                                                                  if (isset($_SESSION['login'])) {
                                                                    echo "Sign Out";
                                                                  } else {
                                                                    echo "Sign in";
                                                                  }
                                                                  ?></a>
        </div>
      </div>
    </header>


    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <!-- <a class="p-2 link-secondary" href="#">World</a>
      <a class="p-2 link-secondary" href="#">U.S.</a>
      <a class="p-2 link-secondary" href="#">Technology</a>
      <a class="p-2 link-secondary" href="#">Design</a>
      <a class="p-2 link-secondary" href="#">Culture</a>
      <a class="p-2 link-secondary" href="#">Business</a>
      <a class="p-2 link-secondary" href="#">Politics</a>
      <a class="p-2 link-secondary" href="#">Opinion</a>
      <a class="p-2 link-secondary" href="#">Science</a>
      <a class="p-2 link-secondary" href="#">Health</a>
      <a class="p-2 link-secondary" href="#">Style</a> -->
        <button class="btn btn-warning"><a class="p-2 link-secondary" href="http://localhost:8080/public/admin/writeBlog">Write Blog</a></button>
        <button class="btn btn-warning"><a class="p-2 link-secondary" href="http://localhost:8080/public/admin/dashboard">Your Profile</a></button>

      </nav>
    </div>
    <main class="container">
      
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic"><?php echo $data['feature']->post_title; ?></h1>
          <p class="lead my-3"><?php echo $data['feature']->post_desc; ?></p>
          <a href="http://localhost:8080/public/admin/SinglePage?BlogID=7756">Continue reading</a>
        </div>
      </div>


      
      <div class="row mb-2">

      <?php
      if (isset($data)) 
      {
        $htm="";
        foreach ($data['main'] as $key => $value) 
        {
          if($value->status=="Approved"){

            $htm.='<div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">'.$value->category.'</strong>
            <h3 class="mb-0">'.$value->post_title.'</h3>
            <div class="mb-1 text-muted">'.$value->review_date.'</div>
            <p class="card-text mb-auto">'.$value->post_desc.'</p>
            <a href="http://localhost:8080/public/admin/SinglePage?BlogID='.$value->post_id.'" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            <title>Placeholder</title>
            </svg>
            
            </div>
            </div>
            </div>';
          }
        }
              echo $htm;
      }
      ?>
        
        <!-- <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>

            </div>
          </div>
        </div>
      </div> -->











    </main>

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>



</body>

</html>