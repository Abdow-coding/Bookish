<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookish | Edit Product</title>
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

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        .sidebar {
            width: 248px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            color: white;
            background:
                linear-gradient(135deg, rgba(62, 38, 27, .97), rgba(83, 49, 31, .98)),
                repeating-linear-gradient(0deg, transparent 0 35px, #ffffff08 36px);
            display: flex;
            flex-direction: column;
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
            letter-spacing: -.8px;
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
            color: #f7eee5;
            text-decoration: none;
            border-radius: 13px;
            font-size: 14px;
            transition: .2s ease;
        }

        .nav-link-custom i {
            width: 21px;
            font-size: 17px;
            color: #d5b080;
            text-align: center;
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
            background: #ffffff25;
            margin: 20px 12px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 15px;
        }

        .sidebar-decoration {
            padding: 0 25px 24px;
            color: #c49a68;
            opacity: .22;
            font-size: 44px;
        }

        .topbar {
            height: 73px;
            position: fixed;
            top: 0;
            left: 248px;
            right: 0;
            z-index: 900;
            background: rgba(255, 250, 242, .96);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 35px;
            gap: 24px;
        }

        .icon-button {
            background: none;
            border: none;
            color: var(--wood);
            font-size: 18px;
            position: relative;
        }

        .notification-dot {
            position: absolute;
            top: 0;
            right: -2px;
            width: 8px;
            height: 8px;
            background: var(--gold);
            border-radius: 50%;
        }

        .top-divider {
            height: 30px;
            width: 1px;
            background: var(--border-color);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            font-weight: 600;
            font-size: 14px;
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
            background: none;
            border: none;
            color: var(--wood-dark);
            font-size: 21px;
        }

        .main-content {
            margin-left: 248px;
            padding: 112px 38px 40px;
            min-height: 100vh;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 26px;
        }

        .page-heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: 39px;
            font-weight: 700;
            margin: 0 0 7px;
            color: var(--wood-dark);
        }

        .page-heading p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .heading-actions {
            display: flex;
            gap: 12px;
            flex-shrink: 0;
        }

        .btn-cancel,
        .btn-save {
            min-height: 48px;
            padding: 0 23px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            transition: .2s ease;
        }

        .btn-cancel {
            color: var(--wood);
            background: transparent;
            border: 1px solid var(--wood-light);
        }

        .btn-cancel:hover {
            background: #eee1d0;
        }

        .btn-save {
            color: white;
            background: var(--wood);
            border: 1px solid var(--wood);
        }

        .btn-save:hover {
            background: var(--wood-dark);
            color: white;
        }

        .edit-card {
            padding: 28px 30px 22px;
            background: var(--paper);
            border: 1px solid #ebdfd0;
            border-radius: 16px;
            box-shadow: 0 15px 45px #55382012;
        }

        .form-column {
            padding-right: 25px;
        }

        .image-column {
            padding-left: 25px;
            border-left: 1px solid var(--border-color);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--wood-dark);
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
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
            border: 1px solid #e6d7c5;
            border-radius: 10px;
            background-color: #fffdf9;
            color: var(--text-dark);
            padding: 12px 15px;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--wood-light);
            background: white;
        }

        textarea.form-control {
            min-height: 146px;
            resize: vertical;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .cover-box {
            min-height: 390px;
            padding: 18px;
            background: #fcf8f1;
            border: 1px solid #ebdfd0;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cover-preview {
            width: 198px;
            height: 288px;
            object-fit: cover;
            border-radius: 7px;
            box-shadow: 0 9px 20px #38231620;
            background: #eadbc6;
        }

        .change-image {
            width: 100%;
            max-width: 285px;
            min-height: 43px;
            margin-top: 15px;
            border-radius: 9px;
            background: transparent;
            border: 1px solid var(--wood-light);
            color: var(--wood);
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .change-image:hover {
            background: #efe2d1;
        }

        .image-help {
            margin-top: 10px;
            color: var(--text-muted);
            font-size: 12px;
            text-align: center;
        }

        .current-image {
            width: 100%;
            border-top: 1px solid var(--border-color);
            margin-top: 17px;
            padding-top: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-muted);
            font-size: 12px;
        }

        .current-image img {
            width: 49px;
            height: 68px;
            object-fit: cover;
            border-radius: 4px;
        }

        .notice {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 19px;
            margin-top: 20px;
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
            margin-top: 18px;
            padding: 16px 20px;
            border: 1px solid #e9ddce;
            border-radius: 10px;
        }

        .status-heading {
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 12px;
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
            height: 24px;
            width: 1px;
            background: var(--border-color);
        }

        .mobile-save {
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
                padding-left: 25px;
                padding-right: 25px;
            }

            .page-heading h1 {
                font-size: 33px;
            }

            .form-column {
                padding-right: 16px;
            }

            .image-column {
                padding-left: 16px;
            }

            .edit-card {
                padding: 24px 20px;
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                transform: translateX(-100%);
                width: 248px;
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
                padding: 95px 18px 30px;
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
                padding: 88px 12px 25px;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .page-heading p {
                font-size: 13px;
                line-height: 1.7;
            }

            .topbar {
                padding: 0 14px;
            }

            .admin-profile {
                font-size: 12px;
                gap: 7px;
            }

            .admin-avatar {
                width: 34px;
                height: 34px;
            }

            .top-divider {
                display: none;
            }

            .edit-card {
                padding: 19px 15px;
            }

            .form-column,
            .image-column {
                padding: 0;
            }

            .image-column {
                border-left: 0;
                border-top: 1px solid var(--border-color);
                margin-top: 8px;
                padding-top: 22px;
            }

            .form-group {
                margin-bottom: 19px;
            }

            .cover-box {
                min-height: auto;
            }

            .cover-preview {
                width: 175px;
                height: 255px;
            }

            .notice {
                align-items: flex-start;
                line-height: 1.7;
            }

            .desktop-actions {
                display: none;
            }

            .mobile-save {
                display: flex;
                gap: 10px;
                margin-top: 18px;
            }

            .mobile-save button {
                flex: 1;
                min-height: 47px;
            }
        }
    </style>
</head>

<body>
    <main class="main-content">
        <div class="page-heading">
            <div>
                <h1>Edit Product</h1>
                <p>Update product information shown in the storefront.</p>
            </div>

            <div class="heading-actions desktop-actions">
                <a href="{{ route('Product') }}" class="btn-cancel"
                    style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Cancel</a>
                <button type="submit" form="productForm" class="btn-save">
                    <i class="fa-regular fa-floppy-disk me-2"></i>Save Changes
                </button>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="productForm" method="POST" action="{{ route('UpdateProducts', $data->id) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="edit-card">

<div class="row g-4">

    <div class="col-lg-7 form-column">

        <div class="form-group">
            <label class="form-label" for="productName">
                Product Name <span class="required">*</span>
            </label>
            <input type="text" class="form-control" id="productName"
                   name="title" maxlength="255" required
                   value="{{ old('title', $data->title) }}">
            @error('title')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="authorName">
                Author Name <span class="required">*</span>
            </label>
            <input type="text" class="form-control" id="authorName"
                   name="author" maxlength="255" required
                   value="{{ old('author', $data->author) }}">
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
                    <input type="number" class="form-control" id="productPrice"
                           name="price" min="0" step="0.01" required
                           value="{{ old('price', $data->price) }}">
                    @error('price')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="condition">Book Condition</label>
                    <select class="form-select" name="condition" id="condition" required>
                        <option value="New" @selected(old('condition', $data->condition) === 'New')>New</option>
                        <option value="Used" @selected(old('condition', $data->condition) === 'Used')>Used</option>
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
                    <input type="text" class="form-control" id="productCategory"
                           name="category" required
                           value="{{ old('category', $data->category) }}">
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
                    <input type="number" class="form-control" id="productStock"
                           name="stock" min="0" step="1" required
                           value="{{ old('stock', $data->stock) }}">
                    @error('stock')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="status">
                Status <span class="required">*</span>
            </label>
            <select class="form-select" name="status" id="status" required>
                <option value="Active" {{ old('status', $data->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="non Active" {{ old('status', $data->status) == 'Non Active' ? 'selected' : '' }}>Non Active</option>
            </select>
            @error('status')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description"
                      class="form-control" rows="5"
                      placeholder="Enter product description...">{{ old('description', $data->description) }}</textarea>
            @error('description')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="col-lg-5 image-column">
        <h2 class="section-title">Product Cover</h2>

        <div class="cover-box">
            <img id="coverPreview" class="cover-preview"
                 src="{{ asset('assets/images/' . $data->cover) }}"
                 alt="{{ $data->title }} cover">

            <input type="file" id="coverInput" name="cover"
                   accept="image/png,image/jpeg,image/webp" hidden>

            <button type="button" class="change-image" id="changeImageButton">
                <i class="fa-solid fa-rotate me-2"></i>Change Image
            </button>

            <p class="image-help">JPG, PNG or WEBP · Max 2MB</p>

            <div class="current-image">
                <img id="currentCover"
                     src="{{ asset('assets/images/' . $data->cover) }}"
                     alt="Current cover">

                <div>
                    <strong class="d-block mb-1">Current cover image</strong>
                    <span>{{ $data->cover }}</span>
                </div>
            </div>

            @error('cover')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>
    </div>

</div>

        </form>
    </main>

     <script>
        const coverInput = document.getElementById('coverInput');
        const coverPreview = document.getElementById('coverPreview');
        const currentCover = document.getElementById('currentCover');
        let temporaryImageUrl = null;

        document.getElementById('changeImageButton').addEventListener('click', () => coverInput.click());

        coverInput.addEventListener('change', () => {
            const file = coverInput.files[0];
            if (!file) return;

            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please select a JPG, PNG, or WEBP image.');
                coverInput.value = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Image size must not exceed 2MB.');
                coverInput.value = '';
                return;
            }

            if (temporaryImageUrl) URL.revokeObjectURL(temporaryImageUrl);
            temporaryImageUrl = URL.createObjectURL(file);
            coverPreview.src = temporaryImageUrl;
            currentCover.src = temporaryImageUrl;
        });
    </script>
</body>

</html>
