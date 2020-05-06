// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var circles = document.getElementsByClassName("CircleJS");
for (var i = 0; i < circles.length; ++i) {
    var circleColor = getRandomColor();
    var Number = circles[i].getAttribute("Number");
    new Chart(circles[i] , {
      type: 'doughnut',
      data: {
        labels: ["Number"],
        datasets: [{
          data: [Number],
          backgroundColor: [circleColor],
          hoverBackgroundColor: [circleColor],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "#FFFFFF",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: true
        },
        cutoutPercentage: 80,
      },
    });
}



function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}