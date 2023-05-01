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
    var logoHeader = document.getElementById("logoHeader");
    if (window.pageYOffset > 0) { logoHeader.src = "icons/logoo2.png";} 
    else { logoHeader.src = "icons/logoo1.png";}
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
/***********************************************************************************/
function AvisLeftAndRightScroll() 
{
  const container = document.querySelector('.avis-card-placement');
  const previousButton = document.querySelector('.previous');
  const nextButton = document.querySelector('.next');
  
  let scrollPosition = 0;
  
  previousButton.addEventListener('click', () => {
    scrollPosition -= container.offsetWidth * 2 ;
    container.scroll({
      left: scrollPosition,
      behavior: 'smooth'
    });
  });
  
  nextButton.addEventListener('click', () => {
    scrollPosition += container.offsetWidth * 2 ;
    container.scroll({
      left: scrollPosition,
      behavior: 'smooth'
    });
  });
}
/********************************************************************************************** search function*/
function searchSections(event) 
{
  event.preventDefault();
  
  var searchInput = document.getElementById("searchInput").value.toLowerCase();

  var topPlacesSection = document.getElementById("places");
  var topAttractionsSection = document.getElementById("top-attractions");

  var topPlacesContent = topPlacesSection.innerText.toLowerCase();
  var topAttractionsContent = topAttractionsSection.innerText.toLowerCase();

  var options = 
  {
    behavior: "smooth",
    block: "center",
    inline: "center"
  }

  if (topPlacesContent.includes(searchInput))  { topPlacesSection.scrollIntoView(options); } 
  else if (topAttractionsContent.includes(searchInput)) { topAttractionsSection.scrollIntoView(options); } 

  return false;
}