// Load Nav
async function loadHTML(elementID, filePath){
    try{
        // fetch external HTML file
        const response = await fetch(filePath);

        // Error Handeling if file is not found
        if(!response.ok){
            console.log(`Failed to load file: ${response.statusText}`);
        }

        // Extract HTML from response
        const html = await response.text();

        // Insert HTML
        const element = document.getElementById(elementID);

        // Error handeling in case element ID not found
        if(element){
            element.innerHTML = html;
        }else{
            console.log(`Element ID ${elementID} not found.`);
        }
    }catch(error){
        console.error('Error loading content: ', error);
    }
}


// Load Footer



// Load Nav and Footer after DOM loads
document.addEventListener('DOMContentLoaded', () => {
    loadHTML('navigation', '/navigation.html');
    loadHTML('footer', '/footer.html');

    //loadHTML('navigation', '../navigation.html');
    //loadHTML('footer', '../footer.html');
})