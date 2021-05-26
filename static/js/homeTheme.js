function themeChanger(){
    
    var date = new Date();
    var hour = date.getHours();
    var element = document.getElementById('header-section');
    
    if(hour > 18){
        element.classList.add("dark-mode");
        element.classList.remove("light-mode");
    }

    else if(hour > 6){
        element.classList.add("light-mode");
        element.classList.remove("dark-mode");
    }

    setTimeout(themeChanger, 10000);

}