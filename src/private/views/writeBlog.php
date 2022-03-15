
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col text-primary text-center">
            <h1>Write Your Blog</h1>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <form method="post" action="">

            <select class="form-select" name="category" aria-label="Default select example">
                <option selected>Select Category</option>
                <option value="Science">Science</option>
                <option value="History">History</option>
                <option value="Sport">Sport</option>
            </select>

            <div class="form-group mt-3">
                <label for="exampleInputEmail1" class="text-danger">Blog Topic</label>
                <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-3">
                <label for="exampleInputEmail1">Blog title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="form-group mt-3">
                <label for="exampleInputEmail1">Blog Description</label>
                <input type="text" name="desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-3">
                <label for="exampleFormControlTextarea1">Blog Content</label>
                <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            <br><button type="submit" name="submit" value="submit" class="btn btn-primary text-center">Submit</button>
            <button class="btn btn-primary"><a href="blog" style="color: white; text-decoration:none;">Home</a></button>
        </form>
</body>
</div>

</html>