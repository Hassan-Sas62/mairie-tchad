<h2 class="mt-5">Statistiques générales</h2>
<canvas id="dashboardChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Messages', 'Actualités', 'Documents'],
            datasets: [{
                label: 'Nombre',
                data: [{{ $messagesCount }}, {{ $actualitesCount }}, {{ $documentsCount }}],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.7)',   // vert
                    'rgba(23, 162, 184, 0.7)',  // bleu
                    'rgba(255, 193, 7, 0.7)'    // jaune
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>