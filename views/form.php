<html>

<head>
    <title>Upload a file to AWS S3 Bucket</title>
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container input[type=file] {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .form-container button[type=submit] {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: none;
            background-color: blue;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Upload a file to S3 Bucket</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
</body>

</html>