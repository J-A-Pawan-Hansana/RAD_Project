
let list = document.querySelectorAll(".navigation li");

function activeLink(){
    list.forEach((item) => {
        item.classList.remove("hovered");

    });
    this.classList.add("hovered");
}


  







list.forEach(item => item.addEventListener("mouseover", activeLink));

let menubtn = document.querySelector(".menubtn");
let navigation = document.querySelector(".navigation");
let head = document.querySelector(".head");
let dashbord = document.querySelector(".dashbord");


menubtn.onclick = function () {
    navigation.classList.toggle("active"); 
    head.classList.toggle("active"); 
    dashbord.classList.toggle("active");
   
}

let profile = document.querySelector('.profile');
document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
}

console.log('main-image:', mainImage);
console.log('sub-image:', subImages);


let mainImage = document.querySelector('.update-product .image-container .main-image img');
let subImages = document.querySelectorAll('.update-product .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      let src = images.getAttribute('src'); 
      mainImage.src = src;
   }
});




