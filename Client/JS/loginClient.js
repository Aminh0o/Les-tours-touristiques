function updateNavMenu() 
{
    var navList = document.getElementById("navList");
  
    // If user is not logged in, show Login link
    if (!isLoggedIn()) 
    {
      navList.innerHTML = 
      `
        <li><a href="#" id="navHome"><p>Home</p></a></li>
        <li><a href="#explore" id="navExplore"><p>Explore</p></a></li>
        <li><a href="#places" id="navPlace"><p>Places</p></a></li>
        <li><a href="#about" id="navAbout"><p>About</p></a></li>
        <li><a href="#contact" id="navContact"><p>Contact</p></a></li>
        <li><a href="loginClient.html" id="navLogin"><p>Login</p></a></li>
      `;
    } 
    else 
    {
      navList.innerHTML = 
      `
        <li><a href="#" id="navHome"><p>Home</p></a></li>
        <li><a href="#explore" id="navExplore"><p>Explore</p></a></li>
        <li><a href="#places" id="navPlace"><p>Places</p></a></li>
        <li><a href="#about" id="navAbout"><p>About</p></a></li>
        <li><a href="#contact" id="navContact"><p>Contact</p></a></li>
        <li><a href="#" id="navNotif"><p>Notifs</p></a></li>
        <li><a href="logoutClient.php" id="navLogin"><p>Logout</p></a></li>
      `;
    }
  }
  