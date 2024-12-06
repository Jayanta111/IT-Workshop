<?php
// Start the session and check if the user is logged in
session_start();
if (isset($_SESSION['Id'])) {
    $Id = $_SESSION['Id'];

    // Database connection
    $host = 'localhost';
    $db = 'e-library';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch borrowed books for the logged-in user
    $sql = "SELECT Book_ID ,Title,  Borrow_Date, Borrow_Date ,Author,Publisher
            FROM borrow_records 
            WHERE User_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $Id);
    $stmt->execute();
    $result = $stmt->get_result();

    $borrowedBooks = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $borrowedBooks[] = $row;
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "User not logged in.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
 <!--------------------Header ---------------------->
  
 <header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">E-Library</span>
            <div class="flex items-center lg:order-2">
            <a href="http://localhost/IT%20Workshop/Front-End/index.php" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log out</a>
            <!-- Modal toggle -->
             <!------------------------User Profile--------------------->
<!-- User Profile Toggle Button -->
 <!------------------------User Profile--------------------->
<div class="flex justify-center m-5">
  <button id="userProfileBtn" type="button" class=" hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium round-lg  text-sm px-5 py-2.5 text-center ">
    <img src="http://localhost/IT%20Workshop/Front-End/image/user.png" alt="User Icon" width="20" height="20">
  </button>
</div>

<!-- User Profile Modal -->
<div id="userProfileModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="relative p-6 bg-white rounded-lg shadow dark:bg-gray-800 max-w-lg w-full">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-semibold text-gray-900 dark:text-white">User Profile</h3>
      <button id="closeUserProfile" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <p class="text-gray-500 dark:text-gray-400">Name: <span class="font-bold "><?= htmlspecialchars($user['Name']) ?></span></p>
    <p class="text-gray-500 dark:text-gray-400">Roll No: <span class="font-bold"><?= htmlspecialchars($user['Roll_no']) ?></span></p>
    <p class="text-gray-500 dark:text-gray-400">Registration No: <span class="font-bold"><?= htmlspecialchars($user['Registration_number']) ?></span></p>
    <p class="text-gray-500 dark:text-gray-400">Student Id: <span class="font-bold"><?= htmlspecialchars($user['Id']) ?></span></p>
    <p class="text-gray-500 dark:text-gray-400">Borrow Books: <span class="font-bold"> <a href="#"class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-gray-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">Books</a> </span></p>

    <button id="logoutButton" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
    <a href="http://localhost/IT%20Workshop/Front-End/login.php">Log Out</a></button>
  </div>
</div>

<!------------------------User Profile--------------------->


               <button id="menu-btn" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open main menu</span>
                    <!-- Open icon -->
                    <svg id="menu-open-icon" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <!-- Close icon (hidden by default) -->
                    <svg id="menu-close-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li><a href="Front-End/main/Book/index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Home</a></li>   
                <li><a href="#" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Books</a></li>
                    <li><a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Donate</a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="overflow-x-auto mt-8">
        <h2 class="text-center text-xl font-bold mb-4">Borrowed Books</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-4 py-3">Book Id</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Author</th>
                    <th class="px-4 py-3">Publisher</th>
                    <th class="px-4 py-3">Borrow Date</th>
                    <th class="px-4 py-3">Return Date</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($borrowedBooks)): ?>
                    <?php foreach ($borrowedBooks as $book): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-3"><?= htmlspecialchars($book['Book_ID']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Title']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Author']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Publisher']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Borrow_Date']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Return_Date']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($book['Status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-500">No borrowed books found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

            <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu-2');
    const menuOpenIcon = document.getElementById('menu-open-icon');
    const menuCloseIcon = document.getElementById('menu-close-icon');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden'); // Toggle the visibility of the menu
        menuOpenIcon.classList.toggle('hidden'); // Toggle between the open and close icon
        menuCloseIcon.classList.toggle('hidden');
    });
</script>

  <!--------------------Header ---------------------->


 <!--------------------User Profile ---------------------->
 <script>
// Modal elements
const userProfileBtn = document.getElementById('userProfileBtn');
const userProfileModal = document.getElementById('userProfileModal');
const closeUserProfile = document.getElementById('closeUserProfile');

// Open the modal
userProfileBtn.addEventListener('click', () => {
  userProfileModal.classList.remove('hidden');
  userProfileModal.classList.add('flex');
});

// Close the modal
closeUserProfile.addEventListener('click', () => {
  userProfileModal.classList.add('hidden');
  userProfileModal.classList.remove('flex');
});

// Optional: Close modal when clicking outside the content
userProfileModal.addEventListener('click', (event) => {
  if (event.target === userProfileModal) {
    userProfileModal.classList.add('hidden');
    userProfileModal.classList.remove('flex');
  }
});


</script>
 <!--------------------User Profile ---------------------->
</body>
</html>
