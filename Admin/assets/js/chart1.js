// <block:setup:1>
// const labels = Utils.months({count: 7});
// const data = {
//   labels: labels,
//   datasets: [{
//     axis: 'y',
//     label: 'My First Dataset',
//     data: [65, 59, 80, 81, 56, 55, 40],
//     fill: false,
//     backgroundColor: [
//       'rgba(255, 99, 132, 0.2)',
//       'rgba(255, 159, 64, 0.2)',
//       'rgba(255, 205, 86, 0.2)',
//       'rgba(75, 192, 192, 0.2)',
//       'rgba(54, 162, 235, 0.2)',
//       'rgba(153, 102, 255, 0.2)',
//       'rgba(201, 203, 207, 0.2)'
//     ],
//     borderColor: [
//       'rgb(255, 99, 132)',
//       'rgb(255, 159, 64)',
//       'rgb(255, 205, 86)',
//       'rgb(75, 192, 192)',
//       'rgb(54, 162, 235)',
//       'rgb(153, 102, 255)',
//       'rgb(201, 203, 207)'
//     ],
//     borderWidth: 1
//   }]
// };
// </block:setup>

// <block:config:0>
// const config = {
//   type: 'line',
//   data: data,
//   options: {
//     indexAxis: 'y',
//     scales: {
//       x: {
//         beginAtZero: true
//       }
//     }
//   }
// };
// </block:config>

// module.exports = {
//   actions: [],
//   config: config,
// };

const ctx = document.getElementById('salesChart').getContext('2d');

        // Initial Data (Basic Test)
        const data = {
            labels: ["Jan", "Feb", "Mar"],
            datasets: [{
                label: 'Sample Data',
                data: [100, 200, 300],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Chart Configuration
        let salesChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });

        // Update Chart Function
        function updateChart() {
            // Simple example to test update function
            salesChart.data.labels = ["Apr", "May", "Jun"];
            salesChart.data.datasets[0].data = [200, 300, 400];
            salesChart.update();
        }