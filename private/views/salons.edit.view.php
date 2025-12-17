<?php $this->view('includes/admin_header'); ?>

    <style>
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
                <div class="card shadow-lg">
                    <div class="container">
                        <!-- Page Header -->
                        <div class="header pt-3 pb-4">

                        </div>

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

                        <form method="post" enctype="multipart/form-data" class="form" onsubmit="return handleSubmit(event, this)">

                            <!-- Logo & Owner Image -->
                            <div class="text-center mb-4 mt-4">
                                <h3 class="pb-2" style="font-size:1.4rem;">Logo & Owner Image</h3>

                                <?php $logo = fetch_images($row->image ?? '') ?>
                                <?php $owner = fetch_images($row->user_image ?? '') ?>

                                <label class="d-inline-block me-3">
                                    <img src="<?= $logo ?: ROOT.'/images/default.avif' ?>"
                                        id="logoPreview"
                                        class="img-fluid shadow-lg p-3 mb-2 bg-body rounded-circle"
                                        style="cursor:pointer; width:70px; height:70px; object-fit:cover;">
                                    <?= !empty($errors['image']) ? "<div class='text-danger small'>{$errors['image']}</div>" : '' ?>
                                    <input type="file" name="image" hidden onchange="previewImage(this)">
                                </label>

                                <label class="d-inline-block">
                                    <img src="<?= $owner ?: ROOT.'/images/default.avif' ?>"
                                        id="ownerPreview"
                                        class="img-fluid shadow-lg p-3 mb-2 bg-body rounded-circle"
                                        style="cursor:pointer; width:70px; height:70px; object-fit:cover;">
                                    <?= !empty($errors['user_image']) ? "<div class='text-danger small'>{$errors['user_image']}</div>" : '' ?>
                                    <input type="file" name="user_image" hidden onchange="previewImage(this)">
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
                                    'postal_code' => 'Postal Code',
                                ];
                                foreach ($fields as $name => $label):
                                ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= !empty($errors[$name]) ? "<div class='text-danger small'>{$errors[$name]}</div>" : '' ?>
                                            <input type="<?= $name === 'store_email' ? 'email' : ($name === 'store_phone' ? 'tel' : 'text') ?>"
                                                name="<?= $name ?>"
                                                id="<?= $name ?>"
                                                value="<?= esc(get_var($name, $row->$name ?? '')) ?>"
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
                                    $existingSliders = !empty($row->slider)
                                        ? array_map('trim', explode(',', $row->slider))
                                        : [];
                                ?>

                                <?php for ($i = 0; $i < 3; $i++): ?>
                                    <?php
                                        $sliderPath = $existingSliders[$i] ?? '';
                                        $sliderImg  = $sliderPath ? fetch_images($sliderPath) : '';
                                    ?>

                                    <div class="col-md-4 mb-3">
                                        <label class="slider-upload">

                                            <!-- Placeholder -->
                                            <div class="slider-placeholder <?= $sliderImg ? 'd-none' : '' ?>">
                                                <i class="bi bi-cloud-upload fs-2"></i>
                                                <span>Add slider</span>
                                            </div>

                                            <!-- Image Preview -->
                                            <div class="slider-file <?= $sliderImg ? '' : 'd-none' ?>">
                                                <img
                                                    src="<?= $sliderImg ?: ROOT.'/images/default.avif' ?>"
                                                    class="img-fluid rounded slider-preview"
                                                    style="width:100%; height:120px; object-fit:cover;">
                                                <span class="slider-name">
                                                    <?= $sliderPath ? basename($sliderPath) : '' ?>
                                                </span>
                                            </div>

                                            <!-- Single input -->
                                            <input
                                                type="file"
                                                name="slider[<?= $i ?>]"
                                                accept="image/*"
                                                hidden
                                                onchange="handleSliderUpload(this)">
                                        </label>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <!-- Description -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <?= !empty($errors['description']) ? "<div class='text-danger small'>{$errors['description']}</div>" : '' ?>
                                    <textarea name="description"
                                            id="description"
                                            rows="4"
                                            class="form-control line-input"
                                            placeholder="Store Description"
                                            style="font-size:0.8rem;"><?= esc(get_var('description', $row->description ?? '')) ?></textarea>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="col-12 d-flex justify-content-end gap-2 mt-4 mb-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    Submit
                                </button>
                                
                                <a href="<?= ROOT ?>/salons" class="btn btn-outline-secondary px-4">
                                    Back
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let logoAdded = false;
            let ownerImageAdded = false;

            function previewImage(input) {
                const file = input.files[0];
                if (!file) return;

                const allowed = ['jpg','jpeg','png','webp','gif'];
                const ext = file.name.split('.').pop().toLowerCase();
                if (!allowed.includes(ext)) { alert('Only image files are allowed'); input.value = ''; return; }

                const img = input.closest('label').querySelector('img');
                if(img) img.src = URL.createObjectURL(file);

                if(input.name === 'image') logoAdded = true;
                if(input.name === 'user_image') ownerImageAdded = true;
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

                const wrapper = input.closest('.slider-upload');
                const placeholder = wrapper.querySelector('.slider-placeholder');
                const fileBox = wrapper.querySelector('.slider-file');
                const img = wrapper.querySelector('.slider-preview');
                const name = wrapper.querySelector('.slider-name');

                placeholder.classList.add('d-none');
                fileBox.classList.remove('d-none');

                img.src = URL.createObjectURL(file);
                name.textContent = file.name;
            }

            // function handleSubmit(e, form) {
            //     e.preventDefault();

            //     if (!logoAdded) { alert('Please upload a logo.'); return false; }
            //     if (!ownerImageAdded) { alert('Please upload owner image.'); return false; }

            //     const sliders = document.querySelectorAll('input[name="slider[]"]');
            //     let sliderAdded = false;
            //     sliders.forEach(input => { if(input.files.length>0) sliderAdded = true; });
            //     if (!sliderAdded) { alert('Please upload at least one slider image.'); return false; }

            //     form.submit();
            //     return true;
            // }
        </script>

<?php $this->view('includes/admin_footer'); ?>