<?php $this->view('includes/admin_header'); ?>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            padding: 15px;
        }

        .header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .section {
            padding: 15px 20px;
            border-bottom: 1px solid #f0f0f0;
        }

        .section h2 {
            font-size: 1.2rem;
            color: #007bff;
            margin-bottom: 10px;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 1rem;
            flex-wrap: wrap;
        }

        .info-row .label {
            font-weight: 600;
            color: #555;
        }

        .info-row span {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 0.95rem;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
            font-weight: bold;
        }

        td {
            background: #f9f9f9;
            border-bottom: 1px solid #eee;
        }

        td:last-child {
            text-align: left;
        }

        .summary {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            padding: 20px;
        }

        .btn {
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 25px;
            border: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .flash-button {
            background-color: #007bff;
            animation: flash 1.5s infinite;
        }

        @keyframes flash {
            0%, 100% { background-color: #007bff; color: white; }
            50% { background-color: #0056b3; color: #e9ecef; }
        }

        .btn-primary {
            background: linear-gradient(to right, #007bff, #0056b3);
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #0056b3, #004494);
        }

        .btn-secondary {
            background: linear-gradient(to right, #6c757d, #495057);
        }

        .btn-secondary:hover {
            background: linear-gradient(to right, #495057, #343a40);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 10px;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 8px;
            }

            .btn-container {
                flex-direction: column;
                gap: 10px;
            }

            .btn {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.2rem;
            }

            .section h2 {
                font-size: 1rem;
            }

            .btn {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        div[style="overflow-x: auto;"] {
            margin-top: 15px;
            padding: 5px;
        }

        .slider-upload {
            display: block;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            background: #f8fafc;
        }

        .slider-upload:hover {
            border-color: #2563eb;
            background: #eff6ff;
        }

        .slider-placeholder,
        .slider-file {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: #475569;
        }

        .slider-file {
            color: #2563eb;
        }

        .slider-name {
            font-size: 0.75rem;
            word-break: break-word;
        }
    </style>

    <body id="page-top">
        <div id="wrapper">
            <?php $this->view('includes/headers'); ?>
            <div class="page-heading">
                <div class="container pt-3">

                    <!-- Page Header -->
                    <div class="header pt-3 pb-4 text-uppercase" style="font-size: 1.5rem;">
                        Salon Details
                    </div>

                    <?php
                    /* ---------- Helpers ---------- */
                    function renderError($errors, $key)
                    {
                        return !empty($errors[$key])
                            ? "<div class='text-danger small' id='{$key}-error'>{$errors[$key]}</div>"
                            : '';
                    }
                    ?>

                    <!-- Error Summary -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-warning alert-dismissible fade show text-center m-3 p-2">
                            <strong>Error:</strong>
                            <ul class="m-0 p-0 list-unstyled">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="post"
                        enctype="multipart/form-data"
                        class="form"
                        onsubmit="return handleSubmit(event,this)">

                        <!-- Logo Upload -->
                        <div class="text-center mb-4 mt-4">
                            <h3 class="pb-2" style="font-size:1.4rem;">Logo & Owner Image</h3>

                            <label class="d-inline-block">
                                <img src="<?= ROOT ?>/images/default.avif"
                                    id="logoPreview"
                                    class="img-fluid shadow-lg p-3 mb-2 bg-body rounded-circle"
                                    style="cursor:pointer; width:100px; height:100px; object-fit:cover;">
                                <?= renderError($errors, 'image') ?>

                                <input type="file"
                                    name="image"
                                    hidden
                                    onchange="previewImage(this)">
                            </label>

                            <label class="d-inline-block">
                                <img src="<?= ROOT ?>/images/default.avif"
                                    id="ownerPreview"
                                    class="img-fluid shadow-lg p-3 mb-2 bg-body rounded-circle"
                                    style="cursor:pointer; width:100px; height:100px; object-fit:cover;">
                                <?= renderError($errors, 'user_image') ?>

                                <input type="file"
                                    name="user_image"
                                    hidden
                                    onchange="previewImage(this)">
                            </label>
                        </div>

                        <!-- Store Info -->
                        <div class="row g-3">

                            <?php
                                $fields = [
                                    'store_owner' => 'Store Owner',
                                    'store_name'  => 'Store Name',
                                    'store_phone' => 'Store Phone',
                                    'store_email' => 'Store Email',
                                    'store_address' => 'Store Address',
                                    'city' => 'City',
                                    'state' => 'State',
                                    'country' => 'Country',
                                    'postal_code' => 'Area Code',
                                ];

                                foreach ($fields as $name => $label):
                            ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= renderError($errors, $name) ?>
                                        <input
                                            type="<?= $name === 'store_email' ? 'email' : ($name === 'store_phone' ? 'tel' : 'text') ?>"
                                            name="<?= $name ?>"
                                            id="<?= $name ?>"
                                            value="<?= esc(get_var($name) ?? '') ?>"
                                            class="form-control line-input"
                                            placeholder="<?= $label ?>"
                                            style="font-size:0.8rem;">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Slider Images -->
                        <div class="row mt-3">
                            <?php
                            $existingSliders = isset($row->slider) ? explode(',', $row->slider) : [];
                            for ($i = 0; $i < 3; $i++):
                                $sliderPreview = $existingSliders[$i] ?? '';
                            ?>
                                <div class="col-md-4 mb-3 text-center">
                                    <label class="slider-upload" for="slider_<?= $i+1 ?>">
                                        <div class="slider-placeholder <?= $sliderPreview ? 'd-none' : '' ?>">
                                            <i class="bi bi-cloud-upload fs-2"></i>
                                            <span>Add slider</span>
                                        </div>

                                        <div class="slider-file <?= $sliderPreview ? '' : 'd-none' ?>">
                                            <img src="<?= $sliderPreview ?: ROOT.'/images/default.avif' ?>"
                                                class="img-fluid rounded"
                                                style="width:100%;height:100px;object-fit:cover;">
                                            <span class="slider-name"><?= $sliderPreview ? basename($sliderPreview) : '' ?></span>
                                        </div>
                                    </label>

                                    <input type="file"
                                        id="slider_<?= $i+1 ?>"
                                        name="slider[]"
                                        accept="image/*"
                                        hidden
                                        onchange="handleSliderUpload(this)">
                                </div>
                            <?php endfor; ?>
                        </div>

                        <!-- Textarea -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <?= renderError($errors, 'description') ?>
                                <textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="form-control line-input"
                                    placeholder="Store Description"
                                    style="font-size:0.8rem;"><?= esc(get_var('description') ?? '') ?></textarea>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-secondary">Add Store</button>
                            <a href="<?= ROOT ?>/salons" class="btn btn-secondary">Back</a>
                        </div>

                        <hr class="separator mt-4">

                    </form>
                </div>
            </div>

    <!-- Scripts -->
    <script>
        let logoAdded = false;
        let ownerImageAdded = false;

        function previewImage(input) {
            const file = input.files[0];
            if (!file) return;

            const allowed = ['jpg','jpeg','png','webp','gif'];
            const ext = file.name.split('.').pop().toLowerCase();

            if (!allowed.includes(ext)) {
                alert('Only image files are allowed');
                input.value = '';
                return;
            }

            // ✅ Always get the image inside the same label
            const img = input.closest('label').querySelector('img');
            img.src = URL.createObjectURL(file);

            if (input.name === 'image') logoAdded = true;
            if (input.name === 'user_image') ownerImageAdded = true;
        }

        function handleSliderUpload(input) {
            const file = input.files[0];
            if (!file) return;

            const allowed = ['jpg','jpeg','png','webp','gif'];
            const ext = file.name.split('.').pop().toLowerCase();

            if (!allowed.includes(ext)) {
                alert('Only image files are allowed');
                input.value = '';
                return;
            }

            const wrapper = input.previousElementSibling;
            wrapper.querySelector('.slider-placeholder').classList.add('d-none');
            wrapper.querySelector('.slider-file').classList.remove('d-none');
            wrapper.querySelector('.slider-name').textContent = file.name;
        }

        function handleSliderUpload(input) {
            const file = input.files[0];
            if (!file) return;

            const allowed = ['jpg','jpeg','png','webp','gif'];
            const ext = file.name.split('.').pop().toLowerCase();
            if (!allowed.includes(ext)) { 
                alert('Only image files are allowed'); 
                input.value = ''; 
                return; 
            }

            const wrapper = input.previousElementSibling;
            const placeholder = wrapper.querySelector('.slider-placeholder');
            const fileBox = wrapper.querySelector('.slider-file');

            placeholder.classList.add('d-none');
            fileBox.classList.remove('d-none');

            // Create or update image preview
            let img = fileBox.querySelector('img');
            if(!img) {
                img = document.createElement('img');
                img.className = 'img-fluid rounded';
                img.style.width = '100%';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                fileBox.prepend(img);
            }
            img.src = URL.createObjectURL(file);
            fileBox.querySelector('.slider-name').textContent = file.name;
        }

        function handleSubmit(e, form) {
            e.preventDefault();

            if (!logoAdded) {
                alert('Please upload a logo.');
                return false;
            }

            if (!ownerImageAdded) {
                alert('Please upload owner image.');
                return false;
            }

            const sliders = document.querySelectorAll('input[name="slider[]"]');
            let sliderAdded = false;

            sliders.forEach(input => {
                if (input.files.length > 0) sliderAdded = true;
            });

            if (!sliderAdded) {
                alert('Please upload at least one slider image.');
                return false;
            }

            form.submit();
            return true;
        }
    </script>

<?php $this->view('includes/admin_footer'); ?>
