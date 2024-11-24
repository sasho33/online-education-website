<?php
include $_SERVER['DOCUMENT_ROOT'] . '/online-education/db/connection.php'; // Include DB connection

// Fetch all news
function getAllNews() {
    return select('news', [], 'NewsID, Title, Content, CreatedAt');
}

// Add a new news item
function addNews($data) {
    return insert('news', $data);
}

// Delete a news item
function deleteNews($newsID) {
    return delete('news', ['NewsID' => $newsID]);
}

// Fetch news by ID
function getNewsByID($newsID) {
    $result = select('news', ['NewsID' => $newsID]);
    return $result ? $result[0] : null;
}

// Update a news item
function updateNews($data, $conditions) {
    return update('news', $data, $conditions);
}

$errors = [];
$title = $content = '';

// Handle form submission for adding or editing news
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_news'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    // Validation
    if (strlen($title) < 3) {
        $errors[] = "News title must be at least 3 characters.";
    }
    if (strlen($content) < 5) {
        $errors[] = "News content must be at least 5 characters.";
    }

    if (empty($errors)) {
        $data = [
            'Title' => $title,
            'Content' => $content
        ];

        if (isset($_POST['news_id'])) {
            // Update news
            $newsID = $_POST['news_id'];
            updateNews($data, ['NewsID' => $newsID]);
        } else {
            // Add new news
            addNews($data);
        }

        echo "<script>
            window.location.href = '" . BASE_URL . "pages/teacher/news.php';
        </script>";
        exit();
    }
}

// Handle delete
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $newsID = $_GET['id'];
    deleteNews($newsID);

    echo "<script>
        window.location.href = '" . BASE_URL . "pages/teacher/news.php';
    </script>";
    exit();
}

// Handle edit
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $newsID = $_GET['id'];
    $newsItem = getNewsByID($newsID);

    if ($newsItem) {
        $title = $newsItem['Title'];
        $content = $newsItem['Content'];
    } else {
        echo "<script>alert('News item not found.');</script>";
    }
}

// Fetch all news
$newsList = getAllNews();
?>
