<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Borrowed</title>
</head>
<body>
<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="#" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">E-Library</span>
            </a>
            <div class="flex items-center lg:order-2">
                <a href="logout.php" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Log out</a>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false" onclick="toggleMobileMenu()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" id="menu-icon">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                    <a href="Main.php" class="bblock py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700" >Home</a>
                    </li>
                    <li>
                    <a href="Book.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Books</a>
                    </li>
                    <li>
                    <a href="User.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">New User</a>

                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Donted</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="lg:hidden" id="mobile-menu" style="display: none;">
        <ul class="flex flex-col mt-4 font-medium">
        <li>
                    <a href="Main.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                    <a href="Book.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"> Books</a>
                    </li>
                    <li>
                    <a href="User.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700"> New User</a>
                    </li>
                    <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Donted</a>
                    </li>
                    
        </ul>
    </div>
</header>
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-white-500 dark:text-gray-400">
        <?php
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "e-library";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to select all books
        $sql = "SELECT ID , User_ID, Name, Book_ID, Title, Borrow_Date, 
                       Return_Date, Author, Publisher FROM borrow_records";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<thead class="text-xs text-gray-900 uppercase bg-blue-700 dark:bg-blue-700 dark:text-gray-50">';
            echo '<tr>';
            echo '<th scope="col" class="px-4 py-3">ID</th>';
            echo '<th scope="col" class="px-4 py-3">User ID</th>';
            echo '<th scope="col" class="px-4 py-3">Name</th>';
            echo '<th scope="col" class="px-4 py-3">Book ID </th>';
            echo '<th scope="col" class="px-4 py-3"> Book Title </th>';
            echo '<th scope="col" class="px-4 py-3">Borrow Date</th>';
            echo '<th scope="col" class="px-4 py-3">Return Date</th>';
            echo '<th scope="col" class="px-4 py-3">Author</th>';
            echo '<th scope="col" class="px-4 py-3">Publisher</th>';
            echo '<th scope="col" class="px-4 py-3">Status</th>';
            echo '<th scope="col" class="px-4 py-3"><span class="sr-only">Actions</span></th>';
            echo '</tr></thead><tbody>';

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr class="border-b dark:border-gray-900">';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['ID'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['User_ID'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Name'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Book_ID'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Title'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Borrow_Date'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Return_Date'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Author'] . '</td>';
                echo '<td class="px-4 py-3 text-sky-500">' . $row['Publisher'] . '</td>';

                
            }
            echo '</tbody></table>';
        } else {
            echo '<p class="text-center text-gray-500">No books found in the library.</p>';
        }

        // Close the connection
        $conn->close();
        ?>
    </table>
</div>
</body>
</html>