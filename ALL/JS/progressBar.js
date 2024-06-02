// Animate all progress bars
animateProgressBars();

// Function to animate progress bars
function animateProgressBars() {
  // Get all progress bars
  var progressBars = document.querySelectorAll('.progress-bar');

  // Loop through each progress bar and set its width based on its data-progress attribute
  for (var i = 0; i < progressBars.length; i++) {
    var progressBar = progressBars[i];
    var progress = progressBar.getAttribute('data-progress');
    animateProgressBar(progressBar, progress);
  }
}

// Function to animate a single progress bar
function animateProgressBar(progressBar, progress) {
  // Set the progress bar width to 0
  progressBar.style.width = '0%';

  // Animate the progress bar width based on its data-progress attribute
  var width = 0;
  var interval = setInterval(function() {
    if (width >= parseInt(progress)) {
      clearInterval(interval);
    } else {
      width++;
      progressBar.style.width = width + '%';
    }
  }, 10);
}
