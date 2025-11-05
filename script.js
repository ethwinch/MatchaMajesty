
    let themeMode = localStorage.getItem("themeColor", "dark"); // assign themeColor as dark as default
    const updateTheme = () => {
        if (themeMode == "light"){
            themeMode = "dark";
        }else{
            themeMode = "light";
        }
        localStorage.setItem("themeColor", themeMode);
        toggleTheme();
    };

    function toggleTheme(){
        let element = document.body;
        element.classList.toggle("themeColor");

        let x = document.getElementById("themeColor");
        if (x.innerHTML === "Light Mode") {
            x.innerHTML = "Dark Mode";
        } else {
            x.innerHTML = "Light Mode";
        }
    };

    /* Make theme persistant */
    function themeCheck(){
        let themeMode = localStorage.getItem("themeColor");
        let x = document.getElementById("themeColor");
        if(themeMode == "light"){
            toggleTheme();
        }
    };
    window.onload = themeCheck;







    

    let changeLocation = function(c){
        if(c=='ny'){
            map.setView(new L.LatLng(40.785091, -73.968285), 13);
        }
        if(c=='nj'){
            map.setView(new L.LatLng(40.241044275602114, -74.48379166590641), 8);
        }
        return;    
    };
    
    
