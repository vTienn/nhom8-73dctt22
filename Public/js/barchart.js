function drawGroupedBarChart(canvasId, labels, data1, data2, data3) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels, 
            datasets: [
                {
                    label: 'Cử Nhân', 
                    data: data1,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)', 
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Kỹ Sư', 
                    data: data2,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)', 
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                },
                {
                    label: 'Thạc Sĩ', 
                    data: data3,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)', 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right', 
                },
                title: {
                    display: true,
                    text: 'Biểu Đồ Thống Kê Loại Bằng Theo Từng Năm',
                },
            },
            scales: {
                x: {
                    beginAtZero: true, 
                },
                y: {
                    beginAtZero: true, 
                },
            },
        },
    });
}
