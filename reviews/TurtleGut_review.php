<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>The Turtle Gut | Matcha Majesty Review</title>
        <link rel="icon" type="image/x-icon" href="../assets2/Logo/favicon.png">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" type="text/css" href="../comments.css">
        <script type="text/javascript" src="../script.js"></script>

        <meta name="google-adsense-account" content="ca-pub-5708330331910324"> <!-- Google Adsense Verification -->

        <meta name="keywords" content="matcha, latte, reviews, umami, japanese tea, 抹茶, まっちゃ">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="hero-container">
            <div class="hero-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2F2acee7fe0a41f28b80b9.cdn6.editmysite.com%2Fuploads%2Fb%2F2acee7fe0a41f28b80b945cb38beb0dda914e9932ff3b6c33e6f0fbb7b717c6a%2FIMG_9946_1684360485.jpg%3Fwidth%3D2400%26optimize%3Dmedium&f=1&nofb=1&ipt=dd72aa7b2a72a19f95d7c9ff4f5f20ec41a3e544a031f3796e4cb5a26d0c8819');">
                <div id="navigation"></div>
                <div class="hero-text">
                    <h1>MATCHA MAJESTY</h1>
                    <h2>The Turtle Gut Review</h2>
                </div>
            </div>
        </div>
        <div class="body-text">
            <h1 style="text-align: center; margin-bottom: 0;">The Turtle Gut</h1>
            <p style="text-align: center; margin-top: 0;">7609 New Jersey Ave, Wildwood Crest, NJ 08260</p>
            <h3 style="text-align: center;">
                <svg height="48px" width="48px" version="1.1" id="svg-star" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"> 
                        <path id="svg-star" style="fill:#f0b62d;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path>
                    </g>
                </svg>
            </h3>
            <h3 style="text-align: center;">$6.00 Small</h3>
            <p>I strongly taste both the (whole) milk and the matcha... for some reason they don't blend together at all, tasting very separated.
                It tastes very bitter/umami but in a poor, grassy way.<p>
            <p>My review would probably be harsher but despite the poor flavor, it's an ice cold drink and it's very hot today. I also haven't had any caffeine in almost a week so this satisfies that craving.</p>
            <p>There is an option to get it with syrup/flavoring, but I always prefer my matcha lattes with just milk as I don't enjoy that saccharine taste. It seems they rely on the syrup to mask the matcha taste/provide most of the flavor.</p>
            <div class="img-container">
                <img style="max-width: 98%;" src="../assets2/TurtleGut.jpg" alt="A dark, murky green matcha latte with some ice."/> <!--https://i.postimg.cc/wjcpTFQc/Turtle-Gut.avif-->
            </div>
        </div>



        <!-- AD SPACE -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5708330331910324"
            crossorigin="anonymous"></script>
        <!-- banner-ad -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-5708330331910324"
            data-ad-slot="6285450821"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


        <!-- REVIEW COMMENTS -->
         <div class="page-content">
            
            <div class="write_comment" page-id="1">
                <form id="comment-form" action="../insert.php" method="POST" autocomplete="off">
                    <input name="display_name" type="text" placeholder="Enter your Name" required>
                    <textarea name="comment" placeholder="Start writing your review here..." required></textarea>
                    <input type="submit" value="Publish Comment"/>
                </form>
            </div>
            <div class="comments">
                <?php
                    // Grab all comments for THIS page based on page ID
                    $stmt = $pdo->prepare('SELECT * FROM comments WHERE page_id = ? ORDER BY submit_date DESC'); // sanitize/prepare statement
                    $stmt->execute([$_GET['page_id']]);
                    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach($comments as $comment){
                        if($comment['parent_id'] == $parent_id){
                            $html .= '
                            <div class="comment">
                                <div class="icon">
                                    <span style="background-color:' . $comment['display_name'] . '">' . htmlspecialchars(strtoupper(substr($comment['display_name'], 0, 1)), ENT_QUOTES) . '</span>
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
                ?>
            </div>
            <!--
            <div class="comments"></div>
            <script src="populate_comments">const comments_page_id = 1;</script>
            -->
         </div>



        <div id="footer"></div>
    </body>
</html>

 <script type="text/javascript" src="../loadHeaderFooter.js"></script>