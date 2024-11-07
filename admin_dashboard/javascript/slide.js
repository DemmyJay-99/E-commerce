
// Wait for DOM to load
document.addEventListener('DOMContentLoaded', () => {
    // Get welcome message and content elements
    const welcomeMessage = document.querySelector('.welcome-message');
    const content = document.querySelector('.content');
  
    // Slide up welcome message after 2 seconds
    setTimeout(() => {
      welcomeMessage.classList.add('slide-up');
      content.style.display = 'block';
      content.style.marginTop = '90px';
      content.style.opacity = '9';
    }, 1000);
  });
  