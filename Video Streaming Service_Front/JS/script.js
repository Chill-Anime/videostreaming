
document.addEventListener('DOMContentLoaded', function() {

    const heroContent = document.querySelector('.Hero_content');
    
    const slideIndex = 0;
    
   
    function nextSlide() {

      slideIndex++;
      
      if (slideIndex >= heroContent.children.length) {
        slideIndex = 0; 
      }
      
      const translation = -slideIndex * 100;
      
      heroContent.style.transform = 'translateX(' + translation + '%)';
    }
    
    const interval = setInterval(nextSlide, 3000); // Change slide every 3 seconds
    
    // Pause the auto slide when hovering over the carousel
    heroContent.addEventListener('mouseenter', function() {
      clearInterval(interval);
    });
    
    // Resume the auto slide when mouse leaves the carousel
    heroContent.addEventListener('mouseleave', function() {
      interval = setInterval(nextSlide, 3000);
    });
  });
  