<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container py-5">
        <div class="row">
            <div class="col-5 mx-auto ">
                <h1>Example Form</h1>
            <!-- attribute form : action (which file u want to send to) , method -->
            <!-- use GET => data show in url  -->
            <form method="POST" action="./store_info.php">   <!-- ./  mean in the same folder -->
                <div class="mb-3">
                    <!--  for attribute connect label to input when click on label -->
                    <label for="num1">Num 1 : </label>
                    <input type="text" id="num1" name="num_one">  <!-- in js name attribute sometime no need -->
                </div>
                <div class="mb-3">
                    <label for="num2">Num 2 : </label>
                    <input type="text" id="num2" name="num_two">
                </div>
                <button type="submit">Submit</button>
            </form>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- What is MVC ? -->
</body>
</html>