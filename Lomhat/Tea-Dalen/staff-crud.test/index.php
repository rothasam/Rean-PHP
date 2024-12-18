<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff CRUD</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-4">
                    <form id="frm-staff"  class="p-5">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position">
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary">
                        </div>
                        <div class="mb-4">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
                <div class="col-12 col-lg-6 col-xl-8">

                </div>
            </div>
        </div>
    </main>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>