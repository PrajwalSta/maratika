// // navbar toggle=========================================navbar toggle=======
// $(document).ready(function () {

//   $('.first-button').on('click', function () {

//     $('.animated-icon1').toggleClass('open');
//   });
//   $('.second-button').on('click', function () {

//     $('.animated-icon2').toggleClass('open');
//   });
//   $('.third-button').on('click', function () {

//     $('.animated-icon3').toggleClass('open');
//   });
// });
// // for increasing counter
// // for increasing counter=================================coutner======================
// // --------------------------====================================================
// // for counter 

// const counte = document.querySelectorAll('.counter');

//      function IncreaseCounter(){
         
//  // var animServicePosition=menu.getBoundingClientRect().top;
//  var screenPosition=500;
//  const speed = 10000; // The lower the slower
//  // console.log(animServicePosition);
//  if(window.scrollY > screenPosition){
     
//      counte.forEach(counter => {
// const updateCount = () => {
//  const target = +counter.getAttribute('data-target');
//  const count = +counter.innerText;

//  // Lower inc to slow and higher to slow
//  const inc = target / speed;

//  // console.log(inc);
//  // console.log(count);

//  // Check if target is reached
//  if (count < target) {
//    // Add inc to count and output in counter
//    counter.innerText = count + .5;
//    // Call function every ms
//    setTimeout(updateCount, 1);
//  } else {
//    counter.innerText = target;
//  }
// };

// updateCount();
// });
     
//  }else{
     
    
    
//  }
//      }
//        window.addEventListener('scroll',IncreaseCounter);


// // for swiper slider=================================swiper======================
// // --------------------------====================================================
// $(document).ready(function(){

// $('.items').slick({
// dots: true,
// infinite: true,
// speed: 2000,
// autoplay: true,
// autoplaySpeed: 10000,
// slidesToShow: 2,
// slidesToScroll: 2,
// responsive: [
// {
// breakpoint: 1024,
// settings: {
// slidesToShow: 2,
// slidesToScroll: 2,
// infinite: true,
// dots: true
// }
// },
// {
// breakpoint: 600,
// settings: {
// slidesToShow: 1,
// slidesToScroll: 1
// }
// },
// {
// breakpoint: 480,
// settings: {
// slidesToShow: 1,
// slidesToScroll: 1
// }
// }

// ]
// });
// });




