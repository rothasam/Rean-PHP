<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-5 mx-auto">
                <form action="" method="post" id="frm-info">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div>
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </main>
    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>
</html>