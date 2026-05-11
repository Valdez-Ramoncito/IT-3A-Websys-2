<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --forest:   #2d4a3e;
            --moss:     #4a7c59;
            --sage:     #8db596;
            --bark:     #6b4c3b;
            --parchment:#f4f0e8;
            --cream:    #faf8f3;
            --muted:    #7a8c80;
            --border:   #d6cfc2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            color: var(--forest);
            min-height: 100vh;
        }

        nav {
            background-color: var(--forest);
            padding: 0 2.5rem;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav .brand {
            font-family: 'Lora', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--parchment);
            letter-spacing: 0.04em;
        }

        nav a {
            font-size: 0.85rem;
            color: var(--sage);
            text-decoration: none;
            font-weight: 400;
            letter-spacing: 0.03em;
        }

        nav a:hover {
            color: var(--parchment);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .page-header {
            margin-bottom: 2.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1.5rem;
        }

        .page-header h1 {
            font-family: 'Lora', serif;
            font-size: 1.9rem;
            font-weight: 600;
            color: var(--forest);
            margin-bottom: 0.3rem;
        }

        .page-header p {
            font-size: 0.88rem;
            color: var(--muted);
            font-weight: 300;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 1.4rem 1.6rem;
        }

        .stat-card .label {
            font-size: 0.78rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.5rem;
        }

        .stat-card .value {
            font-family: 'Lora', serif;
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--forest);
        }

        .stat-card .sub {
            font-size: 0.78rem;
            color: var(--moss);
            margin-top: 0.3rem;
        }

        .chart-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 2rem;
        }

        .chart-card .chart-title {
            font-family: 'Lora', serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--forest);
            margin-bottom: 1.5rem;
        }

        canvas {
            width: 100% !important;
        }
    </style>
</head>
<body>

<nav>
    <span class="brand">&#9641; Grove Dashboard</span>
</nav>

<div class="container">

    <div class="page-header">
        <h1>Monthly Sales Overview</h1>
        <p>Tracking revenue across all recorded periods</p>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <div class="label">Total Revenue</div>
            <div class="value">${{ number_format($data->sum(), 2) }}</div>
            <div class="sub">All time</div>
        </div>
        <div class="stat-card">
            <div class="label">Months Tracked</div>
            <div class="value">{{ $labels->count() }}</div>
            <div class="sub">Data points</div>
        </div>
        <div class="stat-card">
            <div class="label">Monthly Average</div>
            <div class="value">${{ $labels->count() > 0 ? number_format($data->sum() / $labels->count(), 2) : '0.00' }}</div>
            <div class="sub">Per month</div>
        </div>
    </div>

    <div class="chart-card">
        <div class="chart-title">Sales by Month</div>
        <canvas id="salesChart" height="90"></canvas>
    </div>

</div>

<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const labels = @json($labels);
    const data = @json($data);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Sales ($)',
                data: data,
                borderColor: '#4a7c59',
                backgroundColor: 'rgba(74, 124, 89, 0.08)',
                borderWidth: 2,
                pointBackgroundColor: '#2d4a3e',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                fill: true,
                tension: 0.35
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#2d4a3e',
                    titleFont: { family: 'DM Sans', size: 12 },
                    bodyFont: { family: 'DM Sans', size: 12 },
                    padding: 10,
                    callbacks: {
                        label: function(ctx) {
                            return ' $' + parseFloat(ctx.raw).toFixed(2);
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        color: '#7a8c80',
                        font: { family: 'DM Sans', size: 12 }
                    },
                    border: { color: '#d6cfc2' }
                },
                y: {
                    grid: { color: '#f0ece4' },
                    ticks: {
                        color: '#7a8c80',
                        font: { family: 'DM Sans', size: 12 },
                        callback: function(val) {
                            return '$' + val;
                        }
                    },
                    border: { dash: [4, 4], color: 'transparent' }
                }
            }
        }
    });
</script>

</body>
</html>
