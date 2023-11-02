/*Nav Bar */
const toggle =  document.getElementById('toggle-button');
const naviList = document.getElementById('navi-list');

toggle.addEventListener('click', () => {
    naviList.classList.toggle('active');
});

/* Banner */
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("banner");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

/* Quantity counter*/
var increment = function increment(){
  document.getElementById("quantity").stepUp(1);
}

var decrement = function decrement(){
  document.getElementById("quantity").stepDown(1);
}

document.getElementById("increment").addEventListener("click", increment, false);
document.getElementById("decrement").addEventListener("click", decrement, false);

/*newsletter*/
function newsletter() {
  var email = document.getElementById("newsletter-email").value;
  var alertTag = true;
  if (email ==  ""){
    alertTag = false;
  }
  if (alertTag == true){
    alert("Thank you for subscribing! We shall contact you at "+ email);
  }
  if(alertTag == false){
    alert("Please fill in your email");
  }

}


