'use strict';



/**
 * add event listener on multiple elements
 */

const addEventOnElements = function (elements, eventType, callback) {
  for (let i = 0, len = elements.length; i < len; i++) {
    elements[i].addEventListener(eventType, callback);
  }
}



/**
 * NAVBAR TOGGLE FOR MOBILE
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("nav-active");
}

addEventOnElements(navTogglers, "click", toggleNavbar);



/**
 * HEADER
 * active header when window scroll down to 100px
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
  } else {
    header.classList.remove("active");
  }
});



/**
 * SLIDER
 */

const sliders = document.querySelectorAll("[data-slider]");

const initSlider = function(currentSlider) {

  const sldierContainer = currentSlider.querySelector("[data-slider-container]");
  const sliderPrevBtn = currentSlider.querySelector("[data-slider-prev]");
  const sliderNextBtn = currentSlider.querySelector("[data-slider-next]");

  let currentSlidePos = 0;

  const moveSliderItem = function () {
    sldierContainer.style.transform = `translateX(-${sldierContainer.children[currentSlidePos].offsetLeft}px)`;
  }

  /**
   * NEXT SLIDE
   */

  const slideNext = function () {
    const slideEnd = currentSlidePos >= sldierContainer.childElementCount - 1;

    if (slideEnd) {
      currentSlidePos = 0;
    } else {
      currentSlidePos++;
    }

    moveSliderItem();
  }

  sliderNextBtn.addEventListener("click", slideNext);

  /**
   * PREVIOUS SLIDE
   */

   const slidePrev = function () {

    if (currentSlidePos <= 0) {
      currentSlidePos = sldierContainer.childElementCount - 1;
    } else {
      currentSlidePos--;
    }

    moveSliderItem();
  }

  sliderPrevBtn.addEventListener("click", slidePrev);

  const dontHaveExtraItem = sldierContainer.childElementCount <= 1;
  if (dontHaveExtraItem) {
    sliderNextBtn.style.display = "none";
    sliderPrevBtn.style.display = "none";
  }

}

for (let i = 0, len = sliders.length; i < len; i++) { initSlider(sliders[i]); }



/**
 * ACCORDION
 */

const accordions = document.querySelectorAll("[data-accordion]");

let lastActiveAccordion = accordions[0];

const initAccordion = function (currentAccordion) {

  const accordionBtn = currentAccordion.querySelector("[data-accordion-btn]");

  const expandAccordion = function () {
    if (lastActiveAccordion && lastActiveAccordion !== currentAccordion) {
      lastActiveAccordion.classList.remove("expanded");
    }

    currentAccordion.classList.toggle("expanded");

    lastActiveAccordion = currentAccordion;
  }

  accordionBtn.addEventListener("click", expandAccordion);

}

for (let i = 0, len = accordions.length; i < len; i++) { initAccordion(accordions[i]); }




// Signin Page
var username = document.getElementById("username");
var password = document.getElementById("password");
var next_btn = document.getElementById("next-btn");
var signin_btn = document.getElementById("signin-btn");

const next = function () {

  username.style.display = "none";
  next_btn.style.display = "none"
  password.style.display = "block";
  signin_btn.style.display = "block";

}


const signin = function () {
  var siginForm = document.getElementById("signin-form");
  if (siginForm) {
    siginForm.submit();
  } else {
    console.error("Element with ID \"signin-form\" does not exist.");
  }
}

// User - Place Orders
var xmlhttp=new XMLHttpRequest();

function getDishInfo() {
  var operation_type = "insert";
  var e = document.getElementById("dish");
  var id = e.value;
  var dish_name = e.options[e.selectedIndex].text;

  var guest = document.getElementById("guest_count");
  var guest_count = guest.value;

  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("table-body").insertAdjacentHTML("afterend",this.responseText);
    }
  }
  // xmlhttp.open("GET","getcd.php?q="+str,true);
  xmlhttp.open("GET","../api/get_price.php?id="+id+"&name="+dish_name+"&guest_count="+guest_count+"&op_type=insert",true);
  xmlhttp.send();

}



/* Event listener */
const parentElement = document.getElementById('table');

parentElement.addEventListener('click', function(event) {
  console.log("clicked on child");
  const targetElement = event.target;

  if (targetElement.classList.contains('item_count')) {
    // Handle click event for the item button
    console.log('Clicked item button:', targetElement.value);
    updateDishInfo(targetElement);
  }
});



/* Function */
function updateDishInfo(targetElement){

    var operation_type = "update";
    var guest_count = targetElement.value;
    // Get HTML of whole row
    var html = targetElement.parentElement.parentElement.outerHTML;

    // Get id
    var id = getLetterBeforePeriod(html);
    function getLetterBeforePeriod(str) {
      const index = str.lastIndexOf('.');
      if (index > 0) {
        return str.charAt(index - 1);
      } else {
        return '';
      }
    }

    // Get Name
    const regex = /\.(.*?)</;
    const match = regex.exec(html);
    if (match) {
      var dish_name = match[1];
    } else {
      // console.log("No match found.");
    }
  

  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
     targetElement.parentElement.parentElement.innerHTML = this.responseText;
    }
  }

  xmlhttp.open("GET","../api/get_price.php?id="+id+"&name="+dish_name+"&guest_count="+guest_count+"&op_type="+operation_type,true);
  xmlhttp.send();
}

setInterval(updateSubTotal,1000);

function updateSubTotal() {
  var table = document.getElementById("table");
  var sumVal = 0;                                       
  for (var i = 1; i < (table.rows.length)-1; i++) 
  {
    sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
  }
  document.getElementById('total').value = sumVal;
} 

// function onClickRemove(deleteButton) {
//   let row = deleteButton.parentElement.parentElement;
//   row.parentNode.removeChild(row);
//   updateSubTotal(); // Call after delete
// }


function insertOrder() {
  var total = document.getElementById("total").value;
  var date = document.getElementById("date").value;
  var time = document.getElementById("time").value;
  var delivery_address = document.getElementById("delivery_address").value;
  var guest_count = document.getElementById("guest_count").value;


  xmlhttp.open("GET","../api/insert_order.php?total="+total+"&date="+date+"&time="+time+"&delivery_address="+delivery_address+"&guest_count="+guest_count,true);
  xmlhttp.send();
}

function approveOrder(id) {
  xmlhttp.open("GET","../../api/approve_order.php?id="+id,true);
  xmlhttp.send();
  // window.location.href = 'approved_orders.php';
}


function payment(id, amount, mode) {
  let paymentURL = '../../payment?price=' + amount + '&id=' + id + '&mode=' + mode;
  window.location.href = paymentURL;
}

let price = new URLSearchParams(window.location.search).get('price');
document.getElementById('amount').placeholder = price;


