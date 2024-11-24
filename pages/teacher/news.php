<?php include '../partials/header.php'; 
include '../../db/controllers/news.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: " . BASE_URL . "index.php");
    exit();
}


?>

<!-- Main Container -->
<div class="container">
    <div class="row flex-nowrap">
        <!-- Sidebar -->
        <?php include '../partials/sidebar.php'; ?>
        <!-- Content Area -->
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="content">
                <div class="manage-student_wraper">
                    <h3 class="teacher-dashboard-header">News & Announcements</h3>

                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= BASE_URL; ?>pages/teacher/news.php">
  

    <div class="mb-3">
        <label for="newsTitle" class="form-label">News Title</label>
        <input type="text" name="title" class="form-control" id="newsTitle"
            value="<?= htmlspecialchars($title); ?>" required>
    </div>
    <div class="mb-3">
        <label for="newsContent" class="form-label">News Content</label>
        <textarea name="content" class="form-control" id="newsContent" rows="3"
            required><?= htmlspecialchars($content); ?></textarea>
    </div>
    <button type="submit" name="post_news" class="btn btn-info">
        <?= isset($_GET['action']) && $_GET['action'] === 'edit' ? 'Update News' : 'Post News'; ?>
    </button>
    <?php if (isset($_GET['action']) && $_GET['action'] === 'edit'): ?>
    <a href="<?= BASE_URL; ?>pages/teacher/news.php" class="btn btn-secondary">Cancel</a>
    <?php endif; ?>
</form>



                    <!-- Posted News List -->
                    <div class="mt-4">
                        <h5>Recent Announcements</h5>
                        <ul class="list-group">
                            <?php foreach ($newsList as $news): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?= htmlspecialchars($news['Title']); ?></strong>
                                    <br>
                                    <?= htmlspecialchars($news['Content']); ?>
                                    <small class="text-muted d-block"><?= htmlspecialchars($news['CreatedAt']); ?></small>
                                </div>
                                <div>
                                    <a href="?action=edit&id=<?= $news['NewsID']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                                    <a href="?action=delete&id=<?= $news['NewsID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this news?');"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php 

include '../partials/footer.php'; ?>