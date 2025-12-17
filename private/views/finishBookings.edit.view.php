<?php $this->view('includes/bookings_header'); ?>
    <!-- Start Main Body Content -->
     <br>
    <main class="page-content section-top-gap-100" id="perspective">
        <div class="content-wrapper">
            <div id="wrapper">
                <section class="section-xs bg-periglacial-blue text-center">
                    <div class="page-header-center">
                        <div class="step-progress">
                            <div class="step-progress-top">
                                <span class="step-progress-number">3</span>
                                <span>of</span>
                                <span class="step-progress-number">3</span>
                            </div>
                        </div>
                    </div>

                    <!-- Shell -->
                    <div class="container d-flex flex-column align-items-center justify-content-center text-center mt-4">
                        <div class="shell mb-4">
                            <h2>Choose Date and Time</h2>
                            <p class="big">
                                To complete your booking, please choose the date and time that fit you best. <br>
                                We aim to provide top-notch therapy services on your selected day.
                            </p>
                        </div>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-warning text-center alert-dismissible fade show col-md-6" role="alert">
                                <strong>Error:</strong> Please correct the errors below!
                            </div>
                        <?php endif; ?> 

                        <!-- Booking Form -->
                        <div class="card shadow-lg p-4 mb-5 bg-white rounded col-12 col-md-6">
                            <div class="container pt-3">
                                <h2 class="today mb-4">Today is <?= date("l") ?>.</h2>
                                <form method="post" id="appointment-form">
                                    <div class="mb-3">
                                        <input
                                            type="date"
                                            class="form-control text-center"
                                            id="appointment_date"
                                            name="appointment_date"
                                            required
                                            value="<?= esc($_POST['appointment_date'] ?? '') ?>"
                                            min="<?= date('Y-m-d') ?>"
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-select text-center" id="appointment_time" name="appointment_time" required>
                                            <option value="" disabled selected>-- Select time --</option>
                                            <?php
                                                $slots = [
                                                    '08:30 - 09:30','09:30 - 10:30','10:30 - 11:30','11:30 - 12:30',
                                                    '12:30 - 13:30','13:30 - 14:30','14:30 - 15:30','15:30 - 16:30','16:30 - 17:30'
                                                ];
                                                // $selectedDate from PHP if posted, else empty string
                                                $selectedDate = $_POST['appointment_date'] ?? '';
                                                foreach ($slots as $slot):
                                                    $isBooked = isset($therapistBookings[$selectedDate]) && in_array($slot, $therapistBookings[$selectedDate]);
                                            ?>
                                                <option value="<?= esc($slot) ?>" <?= $isBooked ? 'disabled style="color:gray;"' : '' ?>>
                                                    <?= esc($slot) ?> <?= $isBooked ? '(Booked)' : '' ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-4">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Toast for JS blocking -->
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
                        <div id="time-toast" class="toast align-items-center text-white bg-danger border-0" role="alert">
                            <div class="d-flex">
                                <div class="toast-body" id="time-toast-body"></div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                            </div>
                        </div>
                    </div>

                    <!-- Therapist working days and bookings data -->
                    <script>
                        const bookedSlots = <?= json_encode($bookings ?? []) ?>;
                        const therapistId = <?= json_encode($therapist->id ?? null) ?>;
                        const therapistSchedule = <?= json_encode([
                            'monday'    => $therapist->monday ?? '',
                            'tuesday'   => $therapist->tuesday ?? '',
                            'wednesday' => $therapist->wednesday ?? '',
                            'thursday'  => $therapist->thursday ?? '',
                            'friday'    => $therapist->friday ?? '',
                            'saturday'  => $therapist->saturday ?? '',
                            'sunday'    => $therapist->sunday ?? '',
                        ]) ?>;
                    </script>

                    <!-- JS Validation and dynamic disabling -->
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const dateInput = document.getElementById('appointment_date');
                            const timeSelect = document.getElementById('appointment_time');
                            const today = new Date().toISOString().split('T')[0];
                            dateInput.setAttribute('min', today);

                            const toastEl = document.getElementById('time-toast');
                            const toastBody = document.getElementById('time-toast-body');
                            const timeToast = new bootstrap.Toast(toastEl);

                            function updateDisabledTimes() {
                                const selectedDate = dateInput.value;
                                // Reset all options first
                                for (let option of timeSelect.options) {
                                    option.disabled = false;
                                    option.textContent = option.textContent.replace(' (Booked)', '');
                                }

                                if (bookedSlots[therapistId] && bookedSlots[therapistId][selectedDate]) {
                                    const bookedTimes = bookedSlots[therapistId][selectedDate];
                                    for (let option of timeSelect.options) {
                                        if (bookedTimes.includes(option.value)) {
                                            option.disabled = true;
                                            option.textContent += ' (Booked)';
                                        }
                                    }
                                }
                            }

                            dateInput.addEventListener('change', updateDisabledTimes);
                            updateDisabledTimes();

                            const form = document.getElementById('appointment-form');
                            form.addEventListener('submit', (e) => {
                                const selectedDate = dateInput.value;
                                const selectedTime = timeSelect.value;

                                if (!selectedTime) return;

                                // Prevent past times for today
                                if (selectedDate === today) {
                                    const now = new Date();
                                    const [start] = selectedTime.split(' - ');
                                    const [sh, sm] = start.split(':').map(Number);
                                    const startTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), sh, sm);

                                    if (now >= startTime) {
                                        e.preventDefault();
                                        toastBody.textContent = 'Please select a future time for today.';
                                        timeToast.show();
                                        return;
                                    }
                                }

                                // Check therapist off day
                                const selectedDayName = new Date(selectedDate).toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();
                                const therapistCode = therapistSchedule[selectedDayName];

                                // If code is explicitly 'off', prevent booking
                                if (therapistCode === 'off') {
                                    e.preventDefault();
                                    toastBody.textContent = `The therapist is off on ${selectedDayName.charAt(0).toUpperCase() + selectedDayName.slice(1)}s. Please choose another day.`;
                                    timeToast.show();
                                    return;
                                }

                                // Block booked slots (paid = 1)
                                const therapistBookings = bookedSlots[therapistId] || {};
                                const bookedTimes = therapistBookings[selectedDate] || [];

                                if (bookedTimes.includes(selectedTime)) {
                                    e.preventDefault();
                                    toastBody.textContent = 'This therapist is already booked for this time. Please choose another time.';
                                    timeToast.show();
                                    return;
                                }
                            });
                        });
                    </script>
                </section>
            </div>
        </div>
    </main>
    <!-- End Main Body Content --
<?php $this->view('includes/bookings_footer'); ?>