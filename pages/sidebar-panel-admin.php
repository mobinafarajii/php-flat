<!--<!doctype html>-->
<!--<html lang="en" dir="rtl">-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../css/sidebar-panel-admin.css" />
</head>
<!--<body class="d-flex" >-->
<!---->
<!--    -->
<!--    <main class="main-content">-->
<!---->
<!--    </main>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->






<div class="side-bar " dir="rtl" >
    <div class="top-logo d-flex justify-content-center align-items-center">
        <div class="description d-flex flex-column">
            <p class="fw-bold fs-4 text-light m-0 p-0">TechZone</p>
            <p class="p2-logo m-0 p-0">Admin Panel</p>
        </div>

        <img src="../images/cube-bluebg.png" class="bluebg-cube" />
    </div>
    <ul class="list-unstyled mt-5 p-0">
        <li>
            <button
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
            >
                <i class="bi bi-house"></i>
                <span>داشبورد</span>
            </button>
        </li>
        <li>
            <a
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
                    href="./products-html.php"
            >
                <i class="bi bi-box"></i>
                <span>محصولات</span>
            </a>
        </li>
        <li>
            <a
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0 text-decoration-none"
                    href="categories-html.php"
            >

                <i class="bi bi-grid-fill"></i>
                <span>دسته بندی ها</span>
            </a>
        </li>
        <li>
            <a
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
                    href="./blog-html.php"
            >
                <i class="bi bi-newspaper"></i>
                <span> مقالات وبلاگ</span>
            </a>
        </li>
        <li>
            <button
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
            >
                <i class="bi bi-person"></i>
                <span>کاربران</span>
            </button>
        </li>
        <li>
            <button
                    class="sider-btnn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
            >
                <i class="bi bi-gear"></i>
                <span>تنظیمات</span>
            </button>
        </li>
    </ul>
    <button
            class="sider-btnn logout-btn d-flex gap-2 w-100 p-3 fw-bold cardd text-light text-end border-0"
    >
        <i class="bi bi-box-arrow-in-right"></i>
        <span>خروج</span>
    </button>
</div>

