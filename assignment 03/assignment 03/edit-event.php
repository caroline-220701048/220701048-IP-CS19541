<?php
include 'db.php';

// Get the event ID from the URL
$event_id = $_GET['id'];

// Query to get the event details
$query = "SELECT * FROM events WHERE id = '$event_id'";
$result = mysqli_query($conn, $query);

// Check if the event exists
if (mysqli_num_rows($result) > 0) {
    $event = mysqli_fetch_assoc($result);
} else {
    header('Location: events.php');
    exit;
}

// Update the event details if the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    // Update the event details in the database
    $query = "UPDATE events SET title = '$title', description = '$description', date = '$date', time = '$time', location = '$location', price = '$price' WHERE id = '$event_id'";
    mysqli_query($conn, $query);

    // Redirect to the events page
    header('Location: events.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="date"], input[type="time"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Event</h1>
    </header>
    <main>
        <h2>Edit Event Details</h2>
        <form action="" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $event['title']; ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $event['description']; ?></textarea>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $event['date']; ?>">

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?php echo $event['time']; ?>">

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $event['location']; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $event['price']; ?>">

            <button type="submit" name="submit">Update Event</button>
        </form>
    </main>
</body>
</html>