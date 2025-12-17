<div class="container">
  <div class="row">
    <?php if (!empty($rows)): ?>
      <?php
        date_default_timezone_set('Africa/Johannesburg');
        $today = strtolower(date('l'));
        $todayDate = date('Y-m-d');

        $todayCodeMap = [
          'monday'    => 'mo',
          'tuesday'   => 'tu',
          'wednesday' => 'we',
          'thursday'  => 'th',
          'friday'    => 'fr',
          'saturday'  => 'st',
          'sunday'    => 'sn'
        ];
        $expectedCode = $todayCodeMap[$today]; 
      ?>

      <?php foreach ($rows as $row): 
        $isAvailableToday = isset($row->$today) && $row->$today === $expectedCode;
        $bookedSlots = $bookings[$row->id][$todayDate] ?? [];

        $isBusy = false;
        $busySlotTime = '';
        $now = time();

        $therapistBookings = $bookings[$row->id] ?? [];

        foreach ($therapistBookings as $appointmentDate => $slots) {
          foreach ($slots as $slot) {
            $slot = trim($slot);
            if (strpos($slot, '-') === false) continue;

            [$start, $end] = array_map('trim', explode(' - ', $slot));
            $startTime = strtotime("$appointmentDate $start");
            $endTime   = strtotime("$appointmentDate $end");

            if ($now >= $startTime && $now < $endTime) {
              $isBusy = true;
              $busySlotTime = "$start - $end";
              break 2;
            }
          }
        }
      ?>

        <div class="col-sm-6 col-md-4 mb-1">
          <form method="post">
            <div class="card h-100 text-center shadow-sm">
              <img src="<?= get_image($row->image, $row->gender) ?>"
                  class="card-img-top rounded-circle mx-auto mt-1"
                  style="width:155px; height:50px;"
                  alt="<?= esc($row->name) ?>">

              <div class="card-body">
                <h5 class="card-title" style="font-size: 1rem;">
                  <?= esc($row->name . ' ' . $row->surname) ?>
                </h5>

                <span class="pb-1" style="font-size: 0.7rem;">Weekday Availability</span>

                <ul class="list-inline" style="padding-left: 0; margin-bottom: 10px;">
                  <?php foreach ($todayCodeMap as $day => $code): ?>
                    <?php
                      $isActive = isset($row->$day) && $row->$day === $code;
                      $badgeClass = $isActive ? 'bg-success' : 'bg-secondary';
                      $badgeText = $isActive ? $code : 'off';
                    ?>
                    <li class="list-inline-item" style="margin-right: 5px;">
                      <span class="badge <?= $badgeClass ?>" style="font-size: 0.6rem; padding: 0.30em 0.6em;">
                        <?= $badgeText ?>
                      </span>
                    </li>
                  <?php endforeach; ?>
                </ul>

                <input type="hidden" name="name_" value="<?= esc($row->name) ?>">
                <input type="hidden" name="surname_" value="<?= esc($row->surname) ?>">
                <input type="hidden" name="therapist_id" value="<?= esc($row->id) ?>">

                <?php if ($isAvailableToday): ?>
                  <?php if ($isBusy): ?>
                    <button type="button" class="btn btn-sm text-white" style="background-color: red;" disabled>
                      Therapist Busy
                    </button>
                    <?php if (!empty($busySlotTime)): ?>
                      <div style="font-size: 0.75rem; color: red; margin-top: 5px;">
                        Busy from <?= $busySlotTime ?>
                      </div>
                    <?php endif; ?>
                  <?php else: ?>
                    <button type="submit" class="btn btn-sm btn-primary">
                      Continue <i class="ion-ios-arrow-thin-right"></i>
                    </button>
                  <?php endif; ?>
                <?php else: ?>
                  <button type="button" class="btn btn-sm btn-secondary" disabled>
                    Off Day
                  </button>
                <?php endif; ?>
              </div>
            </div>
          </form>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center pb-4" style="font-size: 5rem;">&#128526;</div>
      <div class="col-12 text-center text-danger">
        <h4>No <?= esc(ucfirst($mode)) ?> therapists found.</h4>
      </div>
    <?php endif; ?>
  </div>
</div>
