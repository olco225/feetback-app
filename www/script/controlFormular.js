function handleDeletProjektButtonClick(ProjektId){
    let buttonId = "#delet-button-projekt" + projektId + " a";

    let deletButton = document.querySelector(buttonId);
    deletButton.click();
}
function showControlFormular(projektId ){
    document.getElementById('unclick-background').style.display = 'block';

    let deletProjektButton = document.getElementById("delet-projekt-button");
    //odstránenie predošlého event lisenara gôli stackovaniu
    deletProjektButton.removeEventListener("click", handleDeletProjektButtonClick);

    deletProjektButton.addEventListener("click", handleDeletProjektButtonClick);
}
function hideControlFormular(){
    document.getElementById('unclick-background').style.display = 'none';
}