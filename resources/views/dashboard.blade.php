<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Barangay Daang Bakal Health Center</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Mapbox CSS -->
<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet" />
<!-- Mapbox JS -->
<script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

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

    .patients-today {
      color: #103D87;
    }

    .total-patients {
      color:rgb(0, 0, 0);
    }

    .calendar-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .calendar-header {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
    }

    #calendarTable {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
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

    /* Calendar Day Styles */
    #calendarBody td {
      padding: 8px;
    }

    #calendarBody td.today {
      background-color: #3B82F6;
      border-radius: 50%;
      font-weight: bold;
      color : white;
    }
 /* Calendar Button*/
.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
  margin-bottom: 10px;

}

.calendar-header button {
  background-color: #103D87;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 6px;
  cursor: pointer;
}

.calendar-header button:hover {
  background-color: #103D87;
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

#map {
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  height: 40vh;
}

  </style>
</head>
<body>
  <div class="sidebar">
    <div class="sidebar-header"></div>
    <img src="{{ asset('images/logo1.png') }}" alt="Barangay Logo" class="sidebar-logo">
     <h2>Barangay Daang Bakal<br>Health Center</h2>
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('health.records') }}" class="nav-link {{ request()->routeIs('health.records') ? 'active' : '' }}">Patient Health Records</a>
    <a href="{{ route('prediction.model') }}" class="nav-link {{ request()->routeIs('prediction.model') ? 'active' : '' }}">Prediction Model</a>
    <a href="{{ route('reports') }}" class="nav-link {{ request()->routeIs('reports') ? 'active' : '' }}">Reports</a>
    
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="user-info">
        <img src="user-icon.png" alt="User Icon" width="30"> Physician Sheree
      </div>
    </div>

    <div class="overview-title">Dashboard Overview</div>

    <div class="flex-row" style="margin-bottom: 20px;">
      <div class="stat-card">
        <h4>PATIENTS TODAY</h4>
<h2 id="today-count" class="today-patients">0</h2>

      </div>
      <div class="stat-card">
        <h4>TOTAL PATIENTS</h4>
    <h2 id="total-count" class="total-patients">0</h2>
      </div>
    </div>

    <div class="flex-row">
      <div class="flex-col">
        <div class="card">
          <h4>Barangay Daang Bakal</h4>
          <div id="map" style="width: 100%; height: 400px; border-radius: 12px;"></div>
        </div>
        <div class="card">
          <h4>Predicted Flu Cases</h4>
          <img src="flu-chart-placeholder.png" alt="Flu Cases Chart" style="width: 100%; height: auto;">
        </div>
        <div class="card">
          <h4>Latest Patients</h4>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($latestRecords as $index => $record)
                    <tr>
                     <td>{{ $record->id }}</td>
                          <td>{{ \Carbon\Carbon::parse($record->created_at)->format('m/d/y') }}</td>
                          <td>{{ $record->first_name ?? '—' }}</td>
                          <td>{{ $record->last_name ?? '—' }}</td>
                          <td>{{ $record->age ?? '—' }}</td>
                          <td>{{ $record->gender ?? '—' }}</td>
                          <td>{{ $record->address ?? '—' }}</td>

                    </tr>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- MAP -->
<!-- MAP -->
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoiZG1uY2FsbXpuIiwiYSI6ImNtYWY0bG16cTAxd2YycXB0dXQyZ3RrNGMifQ.0jdj2Y4qDnzBn-HrGTRIUw';

  const map = new mapboxgl.Map({
    container: 'map', // Your <div id="map"></div> in HTML
    style: 'mapbox://styles/mapbox/dark-v11',
    center: [121.029, 14.593],
    zoom: 16,
    pitch: 45,
    bearing: -17.6,
    antialias: true
  });

  const bounds = [
    [121.025, 14.590], // Southwest corner
    [121.033, 14.597]  // Northeast corner
  ];

  map.fitBounds(bounds, { padding: 20 });
  map.setMaxBounds(bounds);

  map.on('load', () => {
    // Load Barangay polygon GeoJSON
    map.addSource('daang-bakal', {
      type: 'geojson',
      data: '/geo/BarangayDaangBakalPolygon.geojson'
    });

    // Gray buildings layer (all buildings)
    map.addLayer({
      id: '3d-buildings-gray',
      source: 'composite',
      'source-layer': 'building',
      filter: ['==', 'extrude', 'true'],
      type: 'fill-extrusion',
      minzoom: 15,
      paint: {
        'fill-extrusion-color': '#888888',   // gray color for outside effect
        'fill-extrusion-height': ['get', 'height'],
        'fill-extrusion-base': ['get', 'min_height'],
        'fill-extrusion-opacity': 0.6
      }
    });

    // Normal colored buildings layer (all buildings)
    map.addLayer({
      id: '3d-buildings-normal',
      source: 'composite',
      'source-layer': 'building',
      filter: ['==', 'extrude', 'true'],
      type: 'fill-extrusion',
      minzoom: 15,
      paint: {
        'fill-extrusion-color': '#f5f5dc',  // normal beige color
        'fill-extrusion-height': ['get', 'height'],
        'fill-extrusion-base': ['get', 'min_height'],
        'fill-extrusion-opacity': 0.6
      }
    });

    // Polygon fill on top to visually mask buildings outside polygon
    map.addLayer({
      id: 'daang-bakal-fill',
      type: 'fill',
      source: 'daang-bakal',
      paint: {
        'fill-color': '#ff0026',
        'fill-opacity': 0.1
      }
    });

    // Polygon outline for clarity
    map.addLayer({
      id: 'daang-bakal-outline',
      type: 'line',
      source: 'daang-bakal',
      paint: {
        'line-color': '#5c5d5e',
        'line-width': 2
      }
    });

    // Optional lighting effect
    map.setLight({ anchor: 'viewport', intensity: 0.6 });
  });
</script>
      <!-- Calendar -->
            <div class="calendar-container">
        <div class="calendar-header">
            <button onclick="changeMonth(-1)">&#8592;</button>
            <span id="calendarHeader"></span>
            <button onclick="changeMonth(1)">&#8594;</button>
        </div>
        <table id="calendarTable">
            <thead>
            <tr>
                <th>Su</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th>
            </tr>
            </thead>
            <tbody id="calendarBody"></tbody>
        </table>
        </div>

  <!-- Calendar Script -->
  <script>
  let currentDate = new Date();
  let currentYear = currentDate.getFullYear();
  let currentMonth = currentDate.getMonth();

  function generateCalendar(year, month) {
    const today = new Date();
    const calendarBody = document.getElementById("calendarBody");
    const calendarHeader = document.getElementById("calendarHeader");

    const months = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];
    calendarHeader.innerText = `${months[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    calendarBody.innerHTML = "";

    let row = document.createElement("tr");
    for (let i = 0; i < firstDay; i++) {
      row.appendChild(document.createElement("td"));
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const cell = document.createElement("td");
      cell.innerText = day;

      if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
        cell.classList.add("today");
      }

      row.appendChild(cell);
      if ((firstDay + day) % 7 === 0 || day === daysInMonth) {
        calendarBody.appendChild(row);
        row = document.createElement("tr");
      }
    }
  }

  function changeMonth(offset) {
    currentMonth += offset;
    if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
    } else if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
    }
    generateCalendar(currentYear, currentMonth);
  }

  // Initial load
  generateCalendar(currentYear, currentMonth);
</script>
<!-- Sript dun sa display nung patients today and total patients-->
<script>
  function updatePatientCounts() {
    fetch('/health-records/count-today')
      .then(res => res.json())
      .then(data => {
        document.getElementById('today-count').textContent = data.count;
      });

    fetch('/health-records/count-total')
      .then(res => res.json())
      .then(data => {
        document.getElementById('total-count').textContent = data.count;
      });
  }

  document.addEventListener("DOMContentLoaded", function () {
    updatePatientCounts();
    setInterval(updatePatientCounts, 10000); // Refresh every 10 seconds
  });
</script>


</body>
</html>
