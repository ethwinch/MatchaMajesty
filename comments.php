<?php
// Connect to the SQL database
$servername = 'localhost';
$username = 'root';
$password = '';
$database_name = 'review_comments';

// Establish Connection to DB
$conn = new mysqli($servername, $username, $password, $database_name);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Assign a unique color to each user
function color_from_string($string){
    $colors = []; // list hex colors
    $colorIndex = hexdec(substr(sha1($string), 0, 10)) % count($colors); // find color based on string
    return $colors[$colorIndex]; // return hex color
}

// Populate the comments and replies via loop
function show_comments($comments, $parent_id = -1){
    $html='';
    if($parent_id != -1){
        // if comment is a reply, sort them by submit_date
        array_multisort(array_column($comments, 'submit_date'), SORT_ASC, $comments);
    }
    // iterate through comments
    // use htmlspecialchars to prevent XSS
    foreach($comments as $comment){
        if($comment['parent_id'] == $parent_id){
            $html .= '
            <div class="comment">
                <div class="icon">
                    <span style="background-color:' . color_from_string($comment['display_name']) . '">' . htmlspecialchars(strtoupper(substr($comment['display_name'], 0, 1)), ENT_QUOTES) . '</span>
                </div>
                <div class="con>
                    <div>
                        <h3 class="name">' . htmlspecialchars($comment['display_name'], ENT_QUOTES) . '</h3>
                    </div>
                    <p class="content">' . nl2br(htmlspecialchars($comment['content'], ENT_QUOTES)) . '</p>
                    <a class="reply_comment_btn" href="#" data-comment-id="' . $comment['id'] . '">Reply</a>' . show_write_comment_form($comment['id']) . '
                    <div class="replies">
                    ' . show_comments($comments, $comment['id']) . '
                    </div>
                </div>
            </div>
            ';
        }
    }
    return $html;
}


// Write Comment Form Template
function show_write_comment_form($parent_id = -1){
    $html = '
    <div class="write_comment" data-comment-id="' . $parent_id . '">
        <form autocomplete="off">
            <input name="name" type="text" placeholder="Your Name" required>
            <textarea name="comment" placeholder="Start writing your review here..." required></textarea>
            <button type="submit">Publish Comment</button>
        </form>
    </div>
    ';
    return $html;
}



// Page ID to insert comments on correct page
if(isset($_GET['page_id'])){
    if(isset($_POST['name'], $_POST['content'])){
        $date = date('Y-m-d H:i:s'); // get current date
        $stmt = $pdo->prepare('INSERT INTO comments (page_id, parent_id, display_name, content, submit_date) VALUES (?,?,?,?,?)');
        $stmt->execute([$_GET['page_id'], $_POST['parent_id'], $_POST['name'], $_POST['content'], $date]);
        // Success MSG
        exit('Your review has been published!');
    }
    // Get reviews by Page ID in order of submission date
    $stmt = $pdo->prepare('SELECT * FROM comments WHERE page_id = ? ORDER BY submit_date DESC'); // sanitize/prepare statement
    $stmt->execute([$_GET['page_id']]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get total # of comments
    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_comments FROM comments WHERE page_id = ?');
    $stmt->execute([$_GET['page_id']]);
    $comments_info = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
    exit('ERROR: No page ID specified');
}

?>

<div class="comment_header">
    <span class="total"><?=$comments_info['total_comments']?> Reviews</span>
    <a href="#" class="write_comment_btn" data-comment-id="-1">Write your Review</a>
</div>

<?=show_write_comment_form()?>

<?=show_comments($comments)?>