/********************************************************************************** Scroll oprtion*/
window.onscroll = function() 
{
    var header = document.getElementById("header");
    var scrollButton = document.getElementById("scrollButton");
    if (window.pageYOffset > 0) 
    { 
        header.classList.add("scrolled"); 
        scrollButton.style.display = 'block';
    }
    else 
    { 
        header.classList.remove("scrolled");
        scrollButton.style.display = 'none';
    }
    scrollButton.addEventListener('click', function() 
    {
        window.scrollTo 
        ({
            top: 0,
            behavior: 'smooth'
        });
    });
}
/********************************************************************************** Show and hide profile*/
function afficherProfile() 
{
    var profile = document.getElementById("profile");
    profile.style.visibility = "visible";
    
    var quitBtn = document.getElementById("quitMenu");
    quitBtn.onclick = function() 
    {
      profile.style.visibility = "hidden";
    }
  }
  