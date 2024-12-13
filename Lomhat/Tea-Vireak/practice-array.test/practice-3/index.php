<?php
    $students = [    
        ["name" => "Alice", "score" => 85],    
        ["name" => "Bob", "score" => 65],    
        ["name" => "Charlie", "score" => 90],    
        ["name" => "Diana", "score" => 72]
    ];
    $average_score = 70; 
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Results</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .results-table {
            margin: 20px auto;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Student Results</h1>
        <div class="results-table">
            <table class="table table-bordered">
                <thead class="table-header">
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Score</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $stu){ ?>
                        <tr>
                            <td><?php echo $stu['name']; ?></td>
                            <td><?php echo $stu['score']; ?></td>
                            <?php
                                echo $stu['score'] > $average_score ? "<td class='text-success fw-bold'> Passed </td>" : "<td class='text-danger fw-bold'> Failed </td>";
                            ?>
                        </tr>
                        
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>