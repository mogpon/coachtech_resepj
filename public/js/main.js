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

function inputDate() {
  const inputValue = document.getElementById( "inputDate" ).value;
  document.getElementById( "date" ).innerHTML = inputValue;
}

function inputTime(obj) {
  var idx = obj.selectedIndex;
  var text = obj.options[idx].text;;
  document.getElementById('time').textContent = text;
}
function inputNumber(obj) {
  var idx2 = obj.selectedIndex;
  var text2 = obj.options[idx2].text;;
  document.getElementById('number').textContent = text2;
}



