<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments Report</title>
  <!-- ::::::::::::::Favicon icon:::::::::::::: -->
    <link rel="shortcut icon" href="<?=ROOT?>/assets/images/logo/logo_design.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <style>
    body { background-color: #f8f9fa; }
    .table th, .table td { font-size: 0.8rem; vertical-align: middle; }
    .btn-print { margin-bottom: 1rem; }
  </style>
</head>
<body>
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="mb-0">Appointments Report</h3>
      <div>
        <a href="<?= ROOT ?>/dashboard" class="btn btn-secondary btn-sm">Back</a>
        <button onclick="printReport()" class="btn btn-secondary btn-sm">Print</button>
        <button onclick="exportExcel()" class="btn btn-success btn-sm">Export to Excel</button>
        <button onclick="exportPDF()" class="btn btn-danger btn-sm">Export to PDF</button>
      </div>
    </div>

    <div id="report">
      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>Therapist</th>
            <th>Service</th>
            <th>Amount (50%)</th>
            <th>Status</th>
            <th>Time</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($appointments)) : ?>
            <?php foreach ($appointments as $i => $app) : ?>
              <tr>
                <td><?= $i + 1 ?></td>
                <td>
                  <?= htmlspecialchars($app->name) ?><br>
                  <small><?= htmlspecialchars($app->email) ?></small>
                </td>
                <td>
                  <?= htmlspecialchars($app->name_) ?> <?= htmlspecialchars($app->surname_) ?><br>
                </td>
                <td><?= htmlspecialchars($app->services_) ?></td>
                <td>R<?= number_format((float)$app->amount, 2) ?></td>
                <td><?= ($app->paid == 1) ? 'Paid' : 'Not Paid' ?></td>
                <td><?= htmlspecialchars($app->appointment_time) ?></td>
                <td><?= htmlspecialchars($app->appointment_date) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="7" class="text-center text-muted">No appointments found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function printReport() {
      window.print();
    }

    function exportExcel() {
      const table = document.querySelector("table");
      const wb = XLSX.utils.table_to_book(table, {sheet: "Report"});
      XLSX.writeFile(wb, 'appointments_report.xlsx');
    }

    function exportPDF() {
      const element = document.getElementById("report");
      html2pdf().from(element).save("appointments_report.pdf");
    }
  </script>
</body>
</html>
