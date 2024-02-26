<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="localhost/lab5/Lab5App/Styles/styles.css">
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
