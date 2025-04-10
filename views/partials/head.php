<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .tabs a {
            padding: 10px 20px;
            text-decoration: none;
            color: #495057;
            border: 1px solid transparent;
            border-bottom: none;
            margin-right: 5px;
        }
        .tabs a.active {
            color: #0d6efd;
            border-color: #dee2e6 #dee2e6 #fff;
        }
        .tabs a:hover {
            border-color: #e9ecef #e9ecef #dee2e6;
        }
    </style>
</head>
<body>
    <?php require 'nav.php'; ?>
    <?php require 'banner.php'; ?>
    <div class="container mt-4">