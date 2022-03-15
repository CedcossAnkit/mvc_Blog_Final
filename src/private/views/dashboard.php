<?php

$name = "";
$role = "";
if (isset($_SESSION['login'])) {
  $name = $_SESSION['login']['name'];
  $role = $_SESSION['login']['role'];
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


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
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="blog">Ankit's Blog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="http://localhost:8080/public/admin/signin">Sign out <?php echo $name ?></a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="blog">
                <span data-feather="home"></span>
                Go to Blog
              </a>
            </li>

          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2"> <?php echo $role ?>-Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            
            </div>
           
          </div>
        </div>

        <h2>Users</h2>
        <div class="table-responsive text-center">
          <table class="table table-striped table-sm">
            <?php
            $htm = "<thead class='text-danger'>
             <tr>
               <th scope='col'>ID</th>
               <th scope='col'>Name</th>
               <th scope='col'>Username</th>
               <th scope='col'>Email</th>
               <th scope='col'>Password</th>
               <th scope='col'>Role</th>
               <th scope='col'>Status</th>
               <th scope='col'>Action</th>
 
             </tr>
           </thead>";
            if ($role == "admin") {

              foreach ($data['users'] as $key => $value) {
                $htm .= "
                        <tbody>
                          <tr>
                            <td class='text-primary'>" . $value->id . "</td>
                            <td>" . $value->name . "</td>
                            <td>" . $value->name . "</td>
                            <td>" . $value->email . "</td>
                            <td>" . $value->password . "</td>
                            <td>" . $value->role . "</td>
                            <td>" . $value->status . "</td>
                            <td><button class='btn btn-success'><a href='?idapp=" . $value->id . "' style='color:white;text-decoration:none'>Approved</a>
                            <button class='btn btn-danger'><a href='?idrejj=" . $value->id . "'style='color:white;text-decoration:none'>Reject</a>
                            <button class='btn btn-warning'><a href='?iddell=" . $value->id . "'style='color:white;text-decoration:none'>Delete</a>
                            </td>
                          </tr>
                        </tbody>";
              }
            } else {
              $htm .= "<tbody>
                          <tr>
                            <td>" . $_SESSION['login']['id'] . "</td>
                            <td>" . $_SESSION['login']['name'] . "</td>
                            <td>" . $_SESSION['login']['name'] . "</td>
                            <td>" . $_SESSION['login']['email'] . "</td>
                            <td>" . $_SESSION['login']['password'] . "</td>
                            <td>" . $_SESSION['login']['role'] . "</td>
                            <td>" . $_SESSION['login']['status'] . "</td>
                            <td>Not Allow</td>
                          </tr>
                        </tbody>";
            }


            echo $htm;


            ?>

          </table>
        </div>

        <h2>Blogs</h2>
        <div class="table-responsive text-center">
          <table class="table table-striped table-sm">
            <?php
            $htm = "<thead class='text-danger'>
             <tr>
               <th scope='col'>Blog ID</th>
               <th scope='col'>Blog TITLE</th>
               <th scope='col'>Blog Topic</th>

               <th scope='col'>Review Date</th>
               <th scope='col'>Status</th>
               <th scope='col'>Action</th>
 
             </tr>
           </thead>";
            if ($role == "admin") {

              foreach ($data['blogs'] as $key => $value) {
                $htm .= "
                        <tbody >
                          <tr>
                            <td class='text-primary'>" . $value->post_id . "</td>
                            <td>" . $value->post_title . "</td>
                            <td>" . $value->post_topic . "</td>
                            <td>" . $value->review_date . "</td>
                            <td>" . $value->status . "</td>
                            <td><button class='btn btn-success'><a href='?ABlogid=" . $value->post_id . "'style='color:white;text-decoration:none'>Approved</a></button><button class='btn btn-danger'><a href='?RBlogid=" . $value->post_id . "'style='color:white;text-decoration:none'>Reject</a></button><button class='btn btn-warning'><a href='?DBlogid=" . $value->post_id . "'style='color:white;text-decoration:none'>Delete</a></button></>
                          </tr>
                        </tbody>";
              }
            } else {
              foreach ($data['blogs'] as $key => $value) {
                if ($value->user_id == $_SESSION['login']['id'])
                  $htm .= "
                        <tbody>
                          <tr>
                            <td>" . $value->post_id . "</td>
                            <td>" . $value->post_title . "</td>
                            <td>" . $value->post_topic . "</td>
                            <td>" . $value->review_date . "</td>
                            <td>" . $value->status . "</td>
                            <td><button><a href='?Blogid=" . $value->post_id . "'>Delete</a></button></>
                          </tr>
                        </tbody>";
              }
            }
            echo $htm;
            ?>

          </table>
        </div>
      </main>
    </div>
  </div>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>