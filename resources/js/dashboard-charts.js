import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {
    // Gráfico de productos por categoría
    const productsByCategoryCtx = document.getElementById('productsByCategoryChart');

    if (productsByCategoryCtx) {
        const data = JSON.parse(productsByCategoryCtx.dataset.chartData);

        new Chart(productsByCategoryCtx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Productos por Categoría',
                    data: data.values,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribución de Productos por Categoría'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }


    // Gráfico de precio promedio por categoría
    const avgPriceByCategoryCtx = document.getElementById('avgPriceByCategoryChart');

    if (avgPriceByCategoryCtx) {
        const data = JSON.parse(avgPriceByCategoryCtx.dataset.chartData);

        new Chart(avgPriceByCategoryCtx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Precio Promedio por Categoría',
                    data: data.values,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Precio Promedio por Categoría'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
