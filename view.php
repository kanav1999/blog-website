<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-image: url("background.jpg"); /* Replace "background.jpg" with your background image */
            background-size: cover;
            background-position: center;
            background-blur: 5px;
        }

        header {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background for header */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        header h1 a {
            color: #fff; /* Text color for header */
            text-decoration: none; /* Remove underline for header link */
        }

        .glassmorphism-container {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent white background */
            backdrop-filter: blur(10px); /* Blurred effect */
            border-radius: 20px;
            padding: 20px;
            margin-top: 50px;
            max-width: 800px; /* Increased max-width */
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .post {
            background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background */
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        #backButton {
            background-color: rgba(0, 123, 255, 0.8); /* Semi-transparent blue */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: absolute;
            top: 20px;
            right: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

        #backButton:hover {
            background-color: rgba(0, 123, 255, 1); /* Solid blue on hover */
        }

        .post h1 {
            text-align: center; /* Center align title */
            color: #333; /* Title color */
            margin-bottom: 20px; /* Add space below title */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .post p {
            text-align: justify; /* Justify align content */
            color: #333; /* Content color */
            margin-bottom: 10px; /* Add space below paragraphs */
        }

        @media screen and (max-width: 768px) {
            .glassmorphism-container {
                max-width: 90%; /* Adjusted max-width for smaller screens */
            }
        }

        /* Animation for title */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post h1 {
            animation: slideIn 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>
    <div class="glassmorphism-container">
        <div class="container">
            <?php
                $id = $_GET['id'];
                if ($id) {
                    include("connect.php");
                    $sqlSelect = "SELECT * FROM posts WHERE id = $id";
                    $result = mysqli_query($conn,$sqlSelect);
                    while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class="post bg-light p-4 mt-5">
                    <button id="backButton">Back</button>
                    <h1><?php echo $data['title']; ?></h1>
                    <p><?php echo $data['date']; ?></p>
                    <p><?php echo $data['content']; ?></p>
                </div>
            <?php
                    }
                } else {
                    echo "No post found";
                }
            ?>
        </div>
    </div>

    <script>
        // Add event listener to the back button to navigate back to the homepage
        document.getElementById('backButton').addEventListener('click', function() {
            window.location.href = 'index.php'; // Replace 'index.php' with the actual homepage URL
        });
    </script>
    
</body>
</html>
