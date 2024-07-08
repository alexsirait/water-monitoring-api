window.onclick = function(event){
    openCloseDropdown(event)
}

function closeAllDropdown() {
    let dropdowns =  document.getElementsByClassName('dropdown-expand')
    for(let i = 0; i < dropdowns.length; i++){
        dropdowns[i].classList.remove('dropdown-expand')
    }
}

function openCloseDropdown(event){
    if(!event.target.matches('.dropdowns-toggle')){
        closeAllDropdown()
    } else {
        let toggle = event.target.dataset.toggle
        let content = document.getElementById(toggle)
        if(content.classList.contains('dropdown-expand')){
            closeAllDropdown()
        }else{
            closeAllDropdown()
            content.classList.add('dropdown-expand')
        }
    }
}

let arrow = document.querySelectorAll('.icon-links')
for (let i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener('click', (e)=>{
        let arrowParent = e.target.parentElement.parentElement.parentElement;
        // let arrowParent = e.target;
        // // console.log(arrowParent);
        // // return;
        arrowParent.classList.toggle('showMenu')
    })  
}

let sidebar = document.querySelector('.sidebar');
let sidebarBtn = document.querySelector('.bar_menu');
// console.log(sidebarBtn);
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle('closes')
})

jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});
