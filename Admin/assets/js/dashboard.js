// Toggle menu
document.addEventListener("DOMContentLoaded", () => {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');

    const darkMode = document.querySelector('.dark-mode');

    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    });

    // darkMode.addEventListener('click', () => {
    //     document.body.classList.toggle('dark-mode-variables');
    //     darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    //     darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
    // });
});
// Timestamp of this ^ : 1:11:54

// Line Chart



Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
    <td>${order.productName}</td>
    <td>${order.productNumber}</td>
    <td>${order.paymentStatus}</td>
    <td class="${order.status === 'Declined' ?
    'danger' : order.status === 'Pending' ? 'warning'
    : 'success'}">${order.status}</td>
    <td class="primary">Details</td>
    `;
    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr);
});



// Chart
const ctx = document.getElementById('performanceChart').getContext('2d');

        const data = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Category 1',
                    data: [400, 200, 300, 250, 300, 200, 150, 400, 350, 300, 350, 320],
                    backgroundColor: 'rgba(0, 200, 255, 0.7)',
                    stack: 'stack1',
                },
                {
                    label: 'Category 2',
                    data: [100, 80, 100, 120, 150, 100, 70, 100, 120, 180, 120, 80],
                    backgroundColor: 'rgba(128, 0, 255, 0.7)',
                    stack: 'stack1',
                },
                {
                    label: 'Category 3',
                    data: [100, 80, 100, 120, 150, 100, 70, 100, 120, 180, 120, 80],
                    backgroundColor: 'rgba(176, 0, 255, 0.7)',
                    stack: 'stack1',
                },
                {
                    label: 'Trend Line',
                    data: [300, 250, 290, 270, 310, 250, 200, 350, 310, 280, 330, 300],
                    type: 'line',
                    borderColor: 'black',
                    borderWidth: 1,
                    pointRadius: 0,
                    borderDash: [5, 5],
                    fill: false,
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        max: 500
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        };

        new Chart(ctx, config);


// Timestamp of this ^ : 37:20 