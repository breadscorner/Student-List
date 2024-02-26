<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            font-family: sans-serif;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            border: 1px solid #ddd;
        }
        th {
            color: navy;
            text-transform: uppercase;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Add border bottom */
        }
        tr:nth-child(2n) {
            background-color: rgb(200 200 255 / 0.5);
        }
        .create-form {
            display: flex;
            align-items: center;
            width: fit-content; /* Set width to fit content */
        }
        .create-form input[type="text"] {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: auto;
        }
        .create-form input[type="submit"] {
            padding: 8px 20px;
            background-color: navy;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: auto; /* Align button to the right */
        }
        .create-form input[type="submit"]:hover {
            background-color: #001f3f;
        }
    </style>
</head>
<body>
    <header>
        <h1>COMP 4515 Lab 5</h1>
    </header>
    <main>
        <h2>Student List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Student list rows will be populated here -->
            </tbody>
            <tfoot>
                <!-- Create form row -->
                <tr>
                   <form action="/students/create" method="POST">
                     <!-- Input field for Name -->
                     <input type="text" name="name" placeholder="Enter Name" required>

                     <!-- Input field for Email -->
                     <input type="text" name="email" placeholder="Enter Email" required>
        
        
                     <!-- Submit button -->
                     <input type="submit" value="Create">
                    </form>
                </tr>

            </tfoot>
        </table>
    </main>
</body>
</html>
