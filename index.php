<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import-Export CSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>
<body class="bg-black text-white">
    <div class="container ">
    <h1 class="text-center my-5">Create a form to Upload your CSV</h1>
        <div class="row">
       
            <div class="col-12 col-md-6 mx-auto my-4">
            <h2>Upload your CSV</h2>
            <form method="post" action="import.php" enctype="multipart/form-data">
            <div class="mb-3">
                <!-- <input type="text" name="prova"> -->
                <label for="formFile" class="form-label">File CSV</label>
                <input class="form-control" type="file" id="formFile" name="uploaded_file">
            </div>
            <button type="submit" class="btn btn-outline-success">Load</button>
        </form>
            </div>
        </div>
        <div class="col-12 col-md-10 mx-auto my-4 d-flex justify-content-center align-items-center">
        <h2 class="me-2">Download the export in CSV</h2>
        <a class="btn btn-outline-success" href="files/export.csv" download>Download</a>
        </div>
    </div>
</body>
</html>