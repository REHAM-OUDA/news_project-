<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-custom { transition: transform 0.2s ease, box-shadow 0.2s ease; border: none; border-radius: 12px; }
        .card-custom:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .icon-box { font-size: 2.5rem; margin-bottom: 15px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">
                <i class="bi bi-newspaper me-2"></i>News System
            </a>
            <div class="d-flex align-items-center ms-auto">
                <span class="text-light me-3 d-none d-sm-inline">
                    <i class="bi bi-person-circle me-1"></i> Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
                </span>
                <a class="btn btn-outline-danger btn-sm px-3" href="logout.php">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="fw-bold text-secondary">Control Panel Dashboard</h2>
                <p class="text-muted">Manage your news categories, articles, and system status easily.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm text-center p-4 border-start border-primary border-4">
                    <div class="card-body">
                        <div class="icon-box text-primary"><i class="bi bi-folder-plus"></i></div>
                        <h5 class="card-title fw-bold">Add Category</h5>
                        <p class="card-text text-muted small">Create new news categories like Sports, Politics, etc.</p>
                        <a href="add_category.php" class="btn btn-primary w-100 stretched-link mt-2">Go to Add</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm text-center p-4 border-start border-info border-4">
                    <div class="card-body">
                        <div class="icon-box text-info"><i class="bi bi-folder2-open"></i></div>
                        <h5 class="card-title fw-bold">View Categories</h5>
                        <p class="card-text text-muted small">Display and manage all categories stored in database.</p>
                        <a href="view_categories.php" class="btn btn-info text-white w-100 stretched-link mt-2">View All</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm text-center p-4 border-start border-success border-4">
                    <div class="card-body">
                        <div class="icon-box text-success"><i class="bi bi-file-earmark-plus"></i></div>
                        <h5 class="card-title fw-bold">Add News</h5>
                        <p class="card-text text-muted small">Publish new articles, upload pictures, and link to categories.</p>
                        <a href="add_news.php" class="btn btn-success w-100 stretched-link mt-2">Add News</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm text-center p-4 border-start border-warning border-4">
                    <div class="card-body">
                        <div class="icon-box text-warning"><i class="bi bi-collection"></i></div>
                        <h5 class="card-title fw-bold">Manage News</h5>
                        <p class="card-text text-muted small">View all active news articles, edit content, or soft-delete them.</p>
                        <a href="view_news.php" class="btn btn-warning text-white w-100 stretched-link mt-2">Manage All</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom h-100 shadow-sm text-center p-4 border-start border-danger border-4">
                    <div class="card-body">
                        <div class="icon-box text-danger"><i class="bi bi-trash3"></i></div>
                        <h5 class="card-title fw-bold">Trash & Deleted News</h5>
                        <p class="card-text text-muted small">Review the repository of articles that have been soft-deleted.</p>
                        <a href="deleted_news.php" class="btn btn-danger w-100 stretched-link mt-2">View Trash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


