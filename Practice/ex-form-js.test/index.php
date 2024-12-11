<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST"id="frm-info">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" >
        </div>
        <button type="submit" id="btnSave" >Save</button>
    </form>

    <script src="/assets/js/axios.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>
</html>