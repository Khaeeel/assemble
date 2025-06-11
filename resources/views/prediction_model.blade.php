<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Barangay Daang Bakal Health Center</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
      <div class="searchbar">
        <input type="text" placeholder="Search by recordID, disease, or others...">
      </div>
      <div class="user-info">
        <img src="user-icon.png" alt="User Icon" width="30"> Physician Sheree
      </div>
    </div>

    <div class="overview-title">Prediction Report</div>

    <div class="flex-row">
      <div class="flex-col">
        <div class="card">
          <h4>Barangay Daang Bakal Predicted Cases</h4>
          <img src="map-placeholder.png" alt="Barangay Map" style="width: 100%; height: auto;">
        </div>
      </div>
</script>
</body>
</html>
