<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookish | Add Product</title>
<link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --wood-dark: #3e261b;
            --wood: #68432e;
            --wood-light: #916744;
            --gold: #d5aa63;
            --cream: #f7f0e5;
            --paper: #fffaf2;
            --text-dark: #35251d;
            --text-muted: #796b60;
            --border-color: #e7d8c5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--text-dark);
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 248px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            color: white;
            background: linear-gradient(145deg, #3e261b, #563722);
            border-right: 1px solid #ffffff18;
            transition: transform .3s ease;
        }

        .brand {
            height: 73px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 26px;
            border-bottom: 1px solid #ffffff17;
            color: var(--gold);
            font-size: 28px;
            font-weight: 700;
        }

        .brand i {
            font-size: 27px;
        }

        .sidebar-nav {
            padding: 20px 15px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 15px 18px;
            margin-bottom: 7px;
            border-radius: 12px;
            color: #f7eee5;
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .nav-link-custom i {
            width: 21px;
            text-align: center;
            color: #d5b080;
            font-size: 17px;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #ffe0a1;
            background: linear-gradient(110deg, #76502f, #593821);
        }

        .nav-link-custom.active {
            border: 1px solid #a77942;
        }

        .nav-divider {
            height: 1px;
            margin: 20px 12px;
            background: #ffffff25;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 15px;
        }

        .sidebar-decoration {
            padding: 0 25px 24px;
            color: #c49a68;
            opacity: .22;
            font-size: 42px;
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 248px;
            right: 0;
            height: 73px;
            z-index: 900;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 35px;
            gap: 24px;
            background: rgba(255, 250, 242, .97);
            border-bottom: 1px solid var(--border-color);
        }

        .icon-button {
            position: relative;
            border: 0;
            background: none;
            color: var(--wood);
            font-size: 18px;
        }

        .notification-dot {
            position: absolute;
            top: 0;
            right: -2px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gold);
        }

        .top-divider {
            width: 1px;
            height: 30px;
            background: var(--border-color);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: white;
            background: linear-gradient(145deg, #d7b78d, #76503a);
        }

        .menu-toggle {
            display: none;
            border: 0;
            background: none;
            color: var(--wood-dark);
            font-size: 21px;
        }

        .main-content {
            min-height: 100vh;
            margin-left: 248px;
            padding: 108px 38px 40px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 23px;
        }

        .page-heading h1 {
            margin: 0 0 5px;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 38px;
            font-weight: 700;
        }

        .page-heading p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .heading-actions {
            display: flex;
            gap: 12px;
        }

        .btn-cancel,
        .btn-save {
            min-height: 48px;
            padding: 0 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-cancel {
            border: 1px solid var(--wood-light);
            color: var(--wood);
            background: transparent;
        }

        .btn-cancel:hover {
            background: #eee1d0;
        }

        .btn-save {
            border: 1px solid var(--wood);
            color: white;
            background: var(--wood);
        }

        .btn-save:hover {
            color: white;
            background: var(--wood-dark);
        }

        .product-card {
            padding: 26px 30px 22px;
            border: 1px solid #ebdfd0;
            border-radius: 15px;
            background: var(--paper);
            box-shadow: 0 15px 45px #55382012;
        }

        .form-column {
            padding-right: 24px;
        }

        .image-column {
            padding-left: 24px;
            border-left: 1px solid var(--border-color);
        }

        .section-title {
            margin-bottom: 15px;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            color: var(--wood-dark);
            font-size: 14px;
            font-weight: 700;
        }

        .required {
            color: #a34c31;
        }

        .form-control,
        .form-select {
            min-height: 51px;
            padding: 12px 15px;
            border: 1px solid #e6d7c5;
            border-radius: 10px;
            color: var(--text-dark);
            background-color: #fffdf9;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--wood-light);
            background: white;
        }

        textarea.form-control {
            min-height: 139px;
            resize: vertical;
            line-height: 1.8;
        }

        .upload-box {
            min-height: 485px;
            padding: 20px 16px;
            border: 1px dashed #c9a985;
            border-radius: 12px;
            background: #fdf9f2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .upload-icon {
            margin: 38px 0 18px;
            color: var(--wood-light);
            font-size: 48px;
        }

        .upload-title {
            margin-bottom: 10px;
            color: var(--wood-dark);
            font-size: 14px;
            font-weight: 700;
            text-align: center;
        }

        .upload-help {
            margin-bottom: 22px;
            color: var(--text-muted);
            font-size: 12px;
            text-align: center;
        }

        .browse-button {
            min-height: 44px;
            padding: 0 22px;
            border: 1px solid var(--wood-light);
            border-radius: 9px;
            color: var(--wood);
            background: transparent;
            font-size: 13px;
            font-weight: 700;
        }

        .browse-button:hover {
            background: #efe2d1;
        }

        .preview-area {
            width: 100%;
            margin-top: 25px;
            padding-top: 17px;
            border-top: 1px solid var(--border-color);
        }

        .preview-label {
            margin-bottom: 12px;
            font-size: 13px;
            font-weight: 700;
        }

        .preview-image {
            display: none;
            width: 105px;
            height: 145px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 5px 14px #3823161c;
        }

        .preview-placeholder {
            width: 105px;
            height: 120px;
            display: grid;
            place-items: center;
            border-radius: 7px;
            background: #f3eadc;
            color: #b7a28b;
            font-size: 38px;
        }

        .notice {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 19px;
            padding: 15px 19px;
            border: 1px solid #f1d9b7;
            border-radius: 10px;
            background: #fff4e3;
            color: #85502b;
            font-size: 13px;
        }

        .notice i {
            font-size: 21px;
        }

        .status-card {
            margin-top: 17px;
            padding: 16px 19px;
            border: 1px solid #e9ddce;
            border-radius: 10px;
        }

        .status-heading {
            margin-bottom: 12px;
            font-size: 14px;
            font-weight: 700;
        }

        .status-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 14px;
            border-radius: 30px;
            color: #147d45;
            background: #d8f5e2;
            font-weight: 700;
        }

        .status-badge i {
            font-size: 9px;
        }

        .status-divider {
            width: 1px;
            height: 24px;
            background: var(--border-color);
        }

        .mobile-actions {
            display: none;
        }

        @media (max-width: 1100px) {
            .sidebar {
                width: 220px;
            }

            .topbar {
                left: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding-right: 24px;
                padding-left: 24px;
            }

            .product-card {
                padding: 23px 20px;
            }

            .form-column {
                padding-right: 15px;
            }

            .image-column {
                padding-left: 15px;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 248px;
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .topbar {
                left: 0;
                height: 65px;
                padding: 0 18px;
                justify-content: space-between;
            }

            .menu-toggle {
                display: inline-block;
            }

            .main-content {
                margin-left: 0;
                padding: 91px 18px 28px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .heading-actions {
                width: 100%;
            }

            .heading-actions button {
                flex: 1;
            }

            .form-column {
                padding-right: 12px;
            }

            .image-column {
                padding-left: 12px;
            }
        }

        @media (max-width: 600px) {
            .main-content {
                padding: 88px 12px 24px;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .page-heading p {
                line-height: 1.7;
            }

            .topbar {
                padding: 0 14px;
            }

            .admin-profile {
                gap: 7px;
                font-size: 12px;
            }

            .admin-avatar {
                width: 34px;
                height: 34px;
            }

            .top-divider {
                display: none;
            }

            .product-card {
                padding: 19px 14px;
            }

            .form-column,
            .image-column {
                padding: 0;
            }

            .image-column {
                margin-top: 8px;
                padding-top: 22px;
                border-top: 1px solid var(--border-color);
                border-left: 0;
            }

            .upload-box {
                min-height: 410px;
            }

            .upload-icon {
                margin-top: 20px;
            }

            .desktop-actions {
                display: none;
            }

            .mobile-actions {
                display: flex;
                gap: 10px;
                margin-top: 18px;
            }

            .mobile-actions button {
                flex: 1;
            }

            .notice {
                align-items: flex-start;
                line-height: 1.7;
            }
        }
    </style>

</head>

<body>


    <main class="main-content">

        <div class="page-heading">
            <div>
                <h1>Add New Product</h1>
                <p>Fill in the details below to add a new book to your store.</p>
            </div>

            <div class="heading-actions desktop-actions">
                <button type="button" class="btn-cancel" id="cancelButton">
                    Cancel
                </button>

                <button type="submit" form="productForm" class="btn-save">
                    <i class="fa-regular fa-floppy-disk me-2"></i>
                    Save Product
                </button>
            </div>
        </div>

        <form id="productForm" method="post" action="{{route('storeProducts')}}" enctype="multipart/form-data">
            @csrf
            <div class="product-card">


<div class="row g-4">

    <div class="col-lg-7 form-column">

        <div class="form-group">
            <label class="form-label" for="productName">
                Product Name <span class="required">*</span>
            </label>
            <input type="text" name="title" class="form-control"
                   id="productName" maxlength="255"
                   value="{{ old('title') }}">
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="authorName">
                Author Name <span class="required">*</span>
            </label>
            <input type="text" name="author" class="form-control"
                   id="authorName" maxlength="255"
                   value="{{ old('author') }}">
            @error('author')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="productPrice">
                        Price (USD) <span class="required">*</span>
                    </label>
                    <input type="number" name="price" class="form-control"
                           id="productPrice" min="0" step="0.01"
                           value="{{ old('price') }}">
                    @error('price')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="bookCondition">
                        Book Condition <span class="required">*</span>
                    </label>
                    <select class="form-select" id="bookCondition"
                            name="condition">
                        <option value="">Select condition</option>
                        <option value="New" @selected(old('condition') == 'New')>New</option>
                        <option value="Used" @selected(old('condition') == 'Used')>Used</option>
                    </select>
                    @error('condition')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="productCategory">
                        Category <span class="required">*</span>
                    </label>
                    <input type="text" name="category" class="form-control"
                           id="productCategory"
                           value="{{ old('category') }}">
                    @error('category')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="productStock">
                        Stock <span class="required">*</span>
                    </label>
                    <input type="number" name="stock" class="form-control"
                           id="productStock" min="0" step="1"
                           value="{{ old('stock') }}">
                    @error('stock')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="productStatus">
                Status <span class="required">*</span>
            </label>
            <select class="form-select" id="productStatus" name="status">
                <option value="">Select Status</option>
                <option value="Active" @selected(old('status') == 'Active')>Active</option>
                <option value="non Active" @selected(old('status') == 'non Active')>Non Active</option>
            </select>
            @error('status')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description"
                      class="form-control" rows="5"
                      placeholder="Enter product description...">{{ old('description') }}</textarea>
            @error('description')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="col-lg-5 image-column">
        <h2 class="section-title">Book Cover Image</h2>

        <div class="upload-box">
            <i class="fa-regular fa-image upload-icon"></i>

            <div class="upload-title">
                Choose a book cover photo
            </div>

            <p class="upload-help">
                JPG, PNG or WEBP · Max 2MB
            </p>

            <input type="file" id="coverInput" name="cover"
                   accept="image/jpeg,image/png,image/webp"  value="{{ old('cover') }}" hidden>

            <button type="button" class="browse-button" id="browseButton">
                <i class="fa-regular fa-folder-open me-2"></i>
                Browse Files
            </button>

            <div class="preview-area">
                <div class="preview-label">Preview</div>

                <div class="preview-placeholder" id="previewPlaceholder">
                    <i class="fa-solid fa-book"></i>
                </div>

                <img src="" alt="Selected book cover preview"
                     class="preview-image" id="coverPreview" >

                @error('cover')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

</div>

        </form>

    </main>

    <!-- <script>
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.getElementById('menuToggle');

        const coverInput = document.getElementById('coverInput');
        const coverPreview = document.getElementById('coverPreview');
        const previewPlaceholder = document.getElementById('previewPlaceholder');

        let selectedImageUrl = null;

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        document.addEventListener('click', (event) => {
            if (
                window.innerWidth <= 800 &&
                !sidebar.contains(event.target) &&
                !menuToggle.contains(event.target)
            ) {
                sidebar.classList.remove('open');
            }
        });

        document.getElementById('browseButton').addEventListener('click', () => {
            coverInput.click();
        });

        coverInput.addEventListener('change', () => {
            const file = coverInput.files[0];

            if (!file) return;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Please choose a JPG, PNG, or WEBP image.');
                coverInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('The image must not exceed 2MB.');
                coverInput.value = '';
                return;
            }

            if (selectedImageUrl) {
                URL.revokeObjectURL(selectedImageUrl);
            }

            selectedImageUrl = URL.createObjectURL(file);
            coverPreview.src = selectedImageUrl;
            coverPreview.style.display = 'block';
            previewPlaceholder.style.display = 'none';
        });

        document.getElementById('productForm').addEventListener('submit', (event) => {
            event.preventDefault();

            if (!event.currentTarget.reportValidity()) return;

            alert(
                'Front-end preview only. Connect this form to your Laravel controller to save the product.'
            );
        });

        function cancelProduct() {
            if (confirm('Discard this new product?')) {
                document.getElementById('productForm').reset();

                if (selectedImageUrl) {
                    URL.revokeObjectURL(selectedImageUrl);
                    selectedImageUrl = null;
                }

                coverPreview.removeAttribute('src');
                coverPreview.style.display = 'none';
                previewPlaceholder.style.display = 'grid';
            }
        }

        document.getElementById('cancelButton')
            .addEventListener('click', cancelProduct);

        document.getElementById('cancelButtonMobile')
            .addEventListener('click', cancelProduct);
    </script>  -->
    <script>
        const coverInput = document.getElementById('coverInput');
        const browseButton = document.getElementById('browseButton');
        const coverPreview = document.getElementById('coverPreview');
        const previewPlaceholder = document.getElementById('previewPlaceholder');

        browseButton.addEventListener('click', function () {
            coverInput.click();
        });

        coverInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) return;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Please choose a JPG, PNG, or WEBP image.');
                this.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('The image must not exceed 2MB.');
                this.value = '';
                return;
            }

            coverPreview.src = URL.createObjectURL(file);
            coverPreview.style.display = 'block';
            previewPlaceholder.style.display = 'none';
        });
        document.getElementById('cancelButton').addEventListener('click', function () {
            if (confirm('Are you sure you want to cancel?')) {
                window.location.href = "{{ route('Product') }}";
            }
        });
    </script>
</body>

</html>
