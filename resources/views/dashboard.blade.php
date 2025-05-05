@extends('home')
@section('content')

@php
   $totalUsers = App\Models\User::count();
   $totalCustomers = App\Models\Customer::count();
@endphp

@php
use Illuminate\Support\Facades\DB;

// Get last 12 months data
date_default_timezone_set('Asia/Karachi');
$months = [];
$completeCounts = [];
$incompleteCounts = [];

for ($i = 11; $i >= 0; $i--) {
    $month = date('Y-m', strtotime("-$i months"));
    $months[] = date('M', strtotime("-$i months"));
    
    // Fetch complete and incomplete count from database
    $completeCounts[] = DB::table('customers')->where('status', 'Complete')->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month])->count();
    $incompleteCounts[] = DB::table('customers')->where('status', 'Incomplete')->whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$month])->count();
}
@endphp

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">
      <!-- Card Border Shadow -->
      <div class="col-lg-6 col-sm-6">
        <div class="card card-border-shadow-primary h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-primary">
                  <i class="ti ti-user-circle ti-28px"></i>
                </span>
              </div>
              <h4 class="mb-0">{{ $totalUsers }}</h4>
            </div>
            <p class="mb-1">Total Users</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">{{ $totalUsers }}</span>
              <small class="text-muted">Users Available on this Dashboard</small>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-sm-6">
        <div class="card card-border-shadow-warning h-100">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <div class="avatar me-4">
                <span class="avatar-initial rounded bg-label-warning">
                  <i class="ti ti-users-group ti-28px"></i>
                </span>
              </div>
              <h4 class="mb-0">{{ $totalCustomers }}</h4>
            </div>
            <p class="mb-1">Total Customers</p>
            <p class="mb-0">
              <span class="text-heading fw-medium me-2">{{ $totalCustomers }}</span>
              <small class="text-muted">Users Available on this Dashboard</small>
            </p>
          </div>
        </div>
      </div>
      <!--/ Card Border Shadow -->
    </div>
    <div class="container-xxl flex-grow-1 container-p-y p-0">
      <div class="row g-6">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Customer Chart (Last 12 Months)</h4>
                      <canvas id="statusChart"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- / Content -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('statusChart').getContext('2d');

        const data = {
            labels: @json($months),
            datasets: [
                {
                    label: 'Complete',
                    data: @json($completeCounts),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'In Complete',
                    data: @json($incompleteCounts),
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        new Chart(ctx, config);
    });
</script>


@endsection
