function buttonClick() {
  console.log('a');
  const target1 = document.getElementById("menu1");
  target1.classList.toggle("open");
  const target2 = document.getElementById("menu2");
  target2.classList.toggle("open2");
  const nav = document.getElementById("menu-one");
  nav.classList.toggle("in");
  const cont = document.getElementById("content");
  cont.classList.toggle("out");
};

// function heartClick(){
//   const like = document.getElementsByClassName("like");
//   like.classList.toggle("change");
// };

// function heartClick() {
//   const like = document.querySelectorAll(".like");
//   like.forEach(function (target) {
//     target.classList.toggle("change");
//   })
// };
// function heartClick() {
//   var like = document.querySelectorAll(".like");
//   like.forEach(function (target) {
//     target.addEventListener('click', function () {
//       target.classList.toggle("change")
//     });
//   })
// };
