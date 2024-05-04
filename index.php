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

        .post-list {
            margin-top: 50px;
        }

        .post-card {
            position: relative; /* Set position to relative */
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white background */
            backdrop-filter: blur(10px); /* Blurred effect */
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); /* Added shadow effect */
            transition: all 0.3s ease-in-out;
            height: auto; /* Auto height */
            width: 80%; /* Default width */
            margin-left: auto;
            margin-right: auto;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.5); /* Adjusted shadow on hover */
        }

        .post-date {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
            animation: slideInRight 0.5s forwards;
            white-space: nowrap; /* Prevent text wrapping */
        }

        .post-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333; /* Title color */
            animation: fadeInDown 1s forwards;
            white-space: nowrap; /* Prevent text wrapping */
        }

        .post-content {
            font-size: 16px;
            margin-bottom: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            animation: fadeInUp 1s forwards;
        }

        .read-more-btn {
            position: absolute; /* Set position to absolute */
            bottom: 20px; /* 20px from the bottom */
            right: 20px; /* 20px from the right */
        }

        .back-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 700px) {
            .post-card {
                width: 90%; /* Adjusted width */
            }
        }

        @media (max-width: 600px) {
            .read-more-btn {
                bottom: 10px; /* 10px from the bottom */
                right: 10px; /* 10px from the right */
            }
        }
    </style>
</head>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>
    <div class="post-list mt-5">
        <div class="container">
            <?php
                include("connect.php");
                $sqlSelect = "SELECT * FROM posts";
                $result = mysqli_query($conn,$sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
            ?>
            <div class="row mb-4 post-card">
                <div class="col-sm-2 post-date">
                    <?php echo $data["date"]; ?>
                </div>
                <div class="col-sm-3">
                    <h2 class="post-title"><?php echo $data["title"]; ?></h2>
                </div>
                <div class="col-sm-5 post-content">
                    <?php
                        $content = $data["content"];
                        $words = str_word_count($content, 2);
                        $output = implode(' ', array_slice($words, 0, 100));
                        echo $output;
                    ?>
                </div>
                <div class="col-sm-2 read-more-btn">
                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">READ MORE</a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
