<?php

require_once "config.php";
 
$name = $emailaddress=  $message = "";
$name_err = $emailaddress_err = $message_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

  // Check if username is empty
  if(empty(trim($_POST["name"]))){
      $name_err = "Name cannot be blank";
  }
  else{
      $sql = "SELECT id FROM contact WHERE name= ?";
      $stmt = mysqli_prepare($conn, $sql);
      if($stmt)
      {
          mysqli_stmt_bind_param($stmt, "s", $param_name);

          // Set the value of param name
          $param_name = trim($_POST['name']);

          mysqli_stmt_close($stmt);
      }
  }


  // Check for  name
if(empty(trim($_POST['name']) )){
  echo   $message_err = "name cannot be blank";
  }
  else{
    $name = trim($_POST['name']);
  }


// Check for email
if(empty(trim($_POST['emailaddress']))){
echo   $emailaddress_err = "email cannot be blank";
}
else{
  $emailaddress = trim($_POST['emailaddress']);
}

// Check for  message
if(empty(trim($_POST['message']) )){
  echo   $message_err = "message cannot be blank";
  }
  else{
    $message = trim($_POST['message']);
  }


// If there were no errors, go ahead and insert into the database
if(empty($name_err) && empty($emailaddress_err) && empty($message_err))
{
  $sql = "INSERT INTO contact (name, emailaddress, message) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  if ($stmt)
  {
      mysqli_stmt_bind_param($stmt, "sss", $param_name , $param_emailaddress, $param_message );

      // Set these parameters
      $param_name = $name;
      $param_emailaddress = $emailaddress;
      $param_message = $message;

      // Try to execute the query
      if (mysqli_stmt_execute($stmt))
      {
          //echo "success";
      }
      else{
          echo "Something went wrong... cannot redirect!";
      }
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}


?>


<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
<title> Contact form</title>
<body>
<header class=" text-gray-400 bg bg-gray-900 body-font ">
      <div class="container mx-auto flex flex-col flex-wrap items-center p-5 md:flex-row">
        <a class="title-font mb-4 flex items-center font-medium text-gray-900 md:mb-0">
          <svg xmlns="C:\Users\Yagnu\Downloads\Black & White Minimalist Business Logo_adobe_express.svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-10 w-10 rounded-full bg-indigo-500 p-2 text-white" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
          </svg>
          <span class="inline-block rounded bg-primary  text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
            welcome to eS-NewZZ</span>
        </a>
        <nav class="flex flex-wrap items-center justify-center text-base md:mr-auto md:ml-4 md:border-l md:border-gray-400 md:py-1 md:pl-4">
          <a href="http://localhost/demo%20site/" target="_blank" class="mr-5 hover:text-violet-500"> <button>Home</button></a>
          <a href="http://localhost/demo%20site/about%20us.php" target="_blank" class="mr-5 hover:text-violet-500"><button>about us</button></a>
          <a href="http://localhost/demo%20site/tournaments.php" target="_blank" class="mr-5 hover:text-violet-500"><button>Tournaments</button> </a>
          <a href="http://localhost/demo%20site/contact%20us.php" target="_blank" class="mr-5 hover:text-violet-500"><button>contact</button></a>
        </nav>
      
        
          <a href="http://localhost/demo%20site/login.php" target="_blank"><button
      type="button"
      class="inline-block hover:text-violet-500 rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
      Login Here
    </button></a>
          <svg fill="none"  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="ml-1 h-4 w-4" viewBox="0 0 24 24"></svg>
        
          <a href="http://localhost/demo%20site/register.php" target="_blank" ><button class="inline-block hover:text-violet-500 rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Signup now</button></a>
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="ml-1 h-4 w-4" viewBox="0 0 24 24"></svg>
        
          <a href="http://localhost/demo%20site/logout.php" target="_blank" ><button  class="inline-block hover:text-violet-500 rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Logout</button></a>
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="ml-1 h-4 w-4" viewBox="0 0 24 24"></svg>
        </nav>
        
    </header>
    
  <section class="text-gray-600 dark:bg-slate-800 body-font relative">
    <form action="" method = "post">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl dark:text-white text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed dark:text-slate-400 text-base">For Your Help And Support</p>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="name" class="leading-7 text-sm dark:text-slate-400 text-gray-600">Name</label>
              <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="relative">
              <label for="email" class="leading-7 text-sm dark:text-slate-400 text-gray-600">Email</label>
              <input type="email" id="email" name="emailaddress" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-full">
            <div class="relative">
              <label for="message" class="leading-7 text-sm dark:text-slate-400 text-gray-600">Message</label>
              <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
          </div>
          <div class="p-2 w-full">
            <button type ="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit Response</button>
</form>
          </div>
          <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
            <a class="text-indigo-500">esnewzzofficial@email.com</a>
            <p class="leading-normal dark:text-slate-400 my-5">640 rc technical
              <br>opp of sola civil, 380061
            </p>
            <span class="inline-flex">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-4 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-4 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-4 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>

  </section>
  <footer class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">eS-NewZZ</span>
          </a>
          <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">© copyrights reserved eS-NewZZ 2022
            <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" target="_blank" rel="noopener noreferrer">esnewzz@gmail.com</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </footer>
</body>
</head>
</html>






