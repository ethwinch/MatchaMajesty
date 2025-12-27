// Single Star SVG; formatted
// <svg width=\"24px\" height=\"24px\"><use href=\"#svg-star\"></use></svg>

(async function generateReviews(){
    let reviewList = document.querySelector('.review-list');

    let reviewObjs = await fetch('https://matcha-majesty.github.io/reviewData.json');
    const result = await reviewObjs.json();
    console.log(result);

    let reviewItems = "";
        result.reviewData.forEach((value, index) => {
            console.log(value.store);
            reviewItems += "<div class=\"review-container " + value.stars + " " + value.price + " " + value.flavor + " \"><div class=\"review-img\"><img src=\"" + value.imgSrc + "\" alt=\"" + value.altText + "\"/></div><div class=\"review-text\"><h3>" + value.store + "</h3><h3>" + value.starsSVG + "</h3><p>" + value.reviewPreview + "</p><a href=\"" + value.reviewLink + "\">Read Full Review ➜</a></div></div>"
        });
    reviewList.innerHTML = reviewItems;
})();