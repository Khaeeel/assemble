<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Barangay Daang Bakal Health Center</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

     body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #AEC4F5;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #ffffff;
      height: 100vh;
      padding: 20px;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      font-family: 'Poppins', sans-serif;
      align-items: center;
    }

    
      .sidebar .nav-link {
        color: #103D87; /* this sets the font color */
      }

    .nav-link {
      display: block;
      padding: 10px 15px;
      color: #333;
      margin-bottom: 10px;
      border-radius: 8px;
      text-decoration: none;
    }
/* Eto yong hover dun sa may sidebar*/
    .nav-link.active,
    .nav-link:hover {
      background-color:rgb(149, 173, 252);
      color: white;
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 20px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .searchbar input {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 300px;
    }

    .user-info {
      font-size: 14px;
    }

    .overview-title {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .flex-row {
      display: flex;
      gap: 20px;
    }

    .flex-col {
      flex: 1;
    }

    .stat-card {
      flex: 1;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    .stat-card h4 {
      margin: 0;
      color: #555;
    }

    .stat-card h2 {
      margin-top: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border-bottom: 1px solid #eee;
      text-align: left;
      background-color: #CDE0FF;
    }

    th {
      background-color: #f9f9f9;
    }


.nav-link.active {
    font-weight: bold;
    background-color:#103D87 ;
}
.overview-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 600; /* Semi-bold */
    font-size: 32px;
    color: #103D87;
}

.sidebar-logo {
    width: 60px;
  height: auto;
  display: block;
  margin: 0 auto 10px auto;
}
.sidebar h2 {
  font-family: 'Poppins', sans-serif;
  color: #103D87;
  font-weight: 600;
  font-size: 18px;
  margin: 0;
  line-height: 1.2;
}

.sidebar-header {
  display: flex;
  align-items: center;
  padding: 10px;
  gap: 10px; /* Adds space between logo and text */
}
/* Size nung Chart */
.chart-canvas {
  width: 100% !important;
  height: auto !important;
  max-height: 300px;
}

#genderSummary {
  margin: 10px auto 0 auto; /* top auto left/right */
  font-weight: bold;
  width: fit-content; /* shrink to fit text */
  text-align: center;
}



  </style>
</head>
<body>
  <div class="sidebar">
    <div class="sidebar-header"></div>
    <img src="<?php echo e(asset('images/logo1.png')); ?>" alt="Barangay Logo" class="sidebar-logo">
     <h2>Barangay Daang Bakal<br>Health Center</h2>
    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">Dashboard</a>
    <a href="<?php echo e(route('health.records')); ?>" class="nav-link <?php echo e(request()->routeIs('health.records') ? 'active' : ''); ?>">Patient Health Records</a>
    <a href="<?php echo e(route('prediction.model')); ?>" class="nav-link <?php echo e(request()->routeIs('prediction.model') ? 'active' : ''); ?>">Prediction Model</a>
    <a href="<?php echo e(route('reports')); ?>" class="nav-link <?php echo e(request()->routeIs('reports') ? 'active' : ''); ?>">Reports</a>
    
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="searchbar">
        <input type="text" placeholder="Search by recordID, disease, or others...">
      </div>
      <div class="user-info">
        <img src="user-icon.png" alt="User Icon" width="30"> Physician Sheree
      </div>
    </div>

    <div class="overview-title">Dashboard Overview</div>

<div class="flex-row">
  <div class="flex-col">
    <div class="card">
      <h4>Age Group Distribution</h4>
      <canvas id="ageChart" class="chart-canvas"></canvas>
    </div>
   
    <div class="card">
      <h4>Gender Distribution</h4>
      <div id="genderSummary" style="margin-top: 10px; font-weight: bold;"></div>
      <canvas id="genderChart" class="chart-canvas"></canvas>
    </div>
    
    
<div class="card">
  <h4>Cases by Diagnosis</h4>

  <select id="diagnosisSelect">
    <option value="all">All Diagnoses</option>
    <?php $__currentLoopData = array_keys($diagnosisBreakdown); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnosis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($diagnosis); ?>"><?php echo e($diagnosis); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>

  <!-- Totals will be inserted here -->
  <div id="diagnosisTotals" style="margin: 15px 0; font-weight: bold; text-align: center;"></div>

  <canvas id="diagnosisChart" class="chart-canvas"></canvas>
</div>


  <canvas id="diagnosisChart" class="chart-canvas"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script id="data-json" type="application/json">
  <?php echo json_encode([
    'ageGroupsTotals' => $ageGroupsTotals ?? [],
    'genderTotals' => $genderTotals ?? [],
    'diagnosisBreakdown' => $diagnosisBreakdown ?? (object)[],
  ]); ?>

</script>

<script>
  const data = JSON.parse(document.getElementById('data-json').textContent);

  const ageData = Object.values(data.ageGroupsTotals);
  const ageLabels = Object.keys(data.ageGroupsTotals);

  const genderData = Object.values(data.genderTotals);
  const genderLabels = Object.keys(data.genderTotals);

  const diagnosisBreakdown = data.diagnosisBreakdown;
  const ageLabelsForDiagnosis = Object.keys(data.ageGroupsTotals);
</script>


  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>


  // --- Age Group Chart ---
// Register the plugin globally (optional but good practice)
Chart.register(ChartDataLabels);

const ageCtx = document.getElementById('ageChart').getContext('2d');

new Chart(ageCtx, {
  type: 'bar',
  data: {
    labels: ageLabels,
    datasets: [{
      label: `Number of Patients (Total: ${ageData.reduce((a, b) => a + b, 0)})`,
      data: ageData,
      backgroundColor: '#3498db'
    }]
  },
  options: {
    plugins: {
      datalabels: {
        anchor: 'end',
        align: 'top',
        color: '#000', // Text color
        font: {
          weight: 'bold'
        },
        formatter: function(value) {
          return value;
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
  plugins: [ChartDataLabels] // Attach plugin to the chart instance
});


  // --- Gender Chart ---
      const genderCtx = document.getElementById('genderChart').getContext('2d');



    const genderLabelsWithCount = genderLabels.map((label, i) => `${label}: ${genderData[i]}`);

    new Chart(genderCtx, {
      type: 'pie',
      data: {
        labels: genderLabelsWithCount,  // use labels with counts here
        datasets: [{
          data: genderData,
          backgroundColor: ['#2980b9', '#e74c3c']
        }]
      },
      options: {
    plugins: {
      legend: {
        position: 'bottom'
      },
      datalabels: {
        color: '#ffffff',
        font: {
          weight: 'bold',
          size: 14
        },
        formatter: (value) => value
      }
    }
  },
  plugins: [ChartDataLabels]
    });
</script>
<!-- Cases by Diagnosis Chart -->
<script>
  const diagnosisCtx = document.getElementById('diagnosisChart').getContext('2d');

  // Define base colors for each disease
  const diseaseColors = {
    'Diarrhea': '#3498db',
    'Flu': '#2ecc71',
    'Dengue': '#f1c40f',
    'Chickenpox': '#e67e22',
    'Fever': '#9b59b6',
    'sssss': '#e74c3c'
  };

  // Calculate and display total number of patients per diagnosis
  function updateDiagnosisTotals(selectedDiagnosis) {
    const totalsDiv = document.getElementById('diagnosisTotals');
    let html = '';

    function getTotal(diagnosis) {
      return Object.values(diagnosisBreakdown[diagnosis]).reduce((sum, ageGroup) => {
        return sum + (ageGroup['Male'] || 0) + (ageGroup['Female'] || 0);
      }, 0);
    }

    if (selectedDiagnosis === 'all') {
      diagnoses.forEach(diagnosis => {
        const total = getTotal(diagnosis);
        html += `Total Number of Patients with ${diagnosis}: ${total}<br>`;
      });
    } else {
      const total = getTotal(selectedDiagnosis);
      html = `Total Number of Patients with ${selectedDiagnosis}: ${total}`;
    }

    totalsDiv.innerHTML = html;
  }


  // Helper to get lighter variant for Female
  function getColorVariant(hex, isFemale) {
    const lighten = (hex, amt) => '#' + hex.replace(/^#/, '').replace(/../g, c =>
      ('0' + Math.min(255, Math.max(0, parseInt(c, 16) + amt)).toString(16)).slice(-2)
    );
    return isFemale ? lighten(hex, 40) : hex;
  }

  const diagnoses = Object.keys(diagnosisBreakdown);

  // Initialize Chart.js
  let diagnosisChart = new Chart(diagnosisCtx, {
    type: 'bar',
    data: {
      labels: ageLabelsForDiagnosis,
      datasets: []
    },
    options: {
      responsive: true,
      scales: {
        x: { stacked: true },
        y: { stacked: true, beginAtZero: true }
      },
      plugins: {
        tooltip: { mode: 'index', intersect: false },
        legend: { position: 'top' },
        datalabels: { display: false }  // Disable numbers inside bars
      }
    },
    plugins: [] // Don't include ChartDataLabels here
  });

  // Builds datasets with gender-specific color variations
  function getDatasets(selectedDiagnosis) {
    let datasets = [];

    if (selectedDiagnosis === 'all') {
      diagnoses.forEach(diagnosis => {
        ['Male', 'Female'].forEach(gender => {
          const isFemale = gender === 'Female';
          const color = getColorVariant(diseaseColors[diagnosis] || '#cccccc', isFemale);
          const data = ageLabelsForDiagnosis.map(ageGroup =>
            diagnosisBreakdown[diagnosis][ageGroup]?.[gender] || 0
          );
          datasets.push({
            label: `${diagnosis} - ${gender}`,
            data: data,
            backgroundColor: color
          });
        });
      });
    } else {
      ['Male', 'Female'].forEach(gender => {
        const isFemale = gender === 'Female';
        const color = getColorVariant(diseaseColors[selectedDiagnosis] || '#cccccc', isFemale);
        const data = ageLabelsForDiagnosis.map(ageGroup =>
          diagnosisBreakdown[selectedDiagnosis][ageGroup]?.[gender] || 0
        );
        datasets.push({
          label: `${selectedDiagnosis} - ${gender}`,
          data: data,
          backgroundColor: color
        });
      });
    }

    return datasets;
  }

  // Initialize chart
  diagnosisChart.data.datasets = getDatasets('all');
  diagnosisChart.update();
  updateDiagnosisTotals('all');
  // Dropdown change listener
  document.getElementById('diagnosisSelect').addEventListener('change', function () {
    const selectedDiagnosis = this.value;
    diagnosisChart.data.datasets = getDatasets(selectedDiagnosis);
    diagnosisChart.update();
    updateDiagnosisTotals(selectedDiagnosis);
  });
</script>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\AssembleP2\resources\views\reports.blade.php ENDPATH**/ ?>