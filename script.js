
    function lightMode(){
        var element = document.body;
        element.classList.toggle("lightmode");

        var x = document.getElementById("lightmode");
        if (x.innerHTML === "Light Mode") {
            x.innerHTML = "Dark Mode";
        } else {
            x.innerHTML = "Light Mode";
        }
    }

    var changeLocation = function(c){
        if(c=='ny'){
            map.setView(new L.LatLng(40.785091, -73.968285), 13);
        }
        if(c=='nj'){
            map.setView(new L.LatLng(40.241044275602114, -74.48379166590641), 8);
        }
        return;    
    };
    
    
