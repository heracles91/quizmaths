function searchFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchinput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
  
function sortList() {
    var list, i, switching, b, shouldSwitch;
    list = document.getElementById("myUL");
    switching = true;
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // start by saying: no switching is done:
        switching = false;
        b = list.getElementsByTagName("li");
        // Loop through all list-items:
        for (i = 0; i < (b.length - 1); i++) {
        // start by saying there should be no switching:
        shouldSwitch = false;
        /* check if the next item should
        switch place with the current item: */
        if (b[i].getElementsByTagName("a")[0].innerHTML.toLowerCase() > b[i + 1].getElementsByTagName("a")[0].innerHTML.toLowerCase()) {
            /* if next item is alphabetically
            lower than current item, mark as a switch
            and break the loop: */
            shouldSwitch = true;
            break;
        }
        }
        if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark the switch as done: */
        b[i].parentNode.insertBefore(b[i + 1], b[i]);
        switching = true;
        }
    }
}
//=======================================================================================

function filterSelection(c) {
var x, i;
x = document.getElementsByClassName("filterDiv");
if (c == "all") c = "";
for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
}
}

function w3AddClass(element, name) {
var i, arr1, arr2;
arr1 = element.className.split(" ");
arr2 = name.split(" ");
for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
}
}

function w3RemoveClass(element, name) {
var i, arr1, arr2;
arr1 = element.className.split(" ");
arr2 = name.split(" ");
for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
    arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
}
element.className = arr1.join(" ");
}
//========================================================================================================
window.onscroll = function() {
	scrollFunction()
};

function scrollFunction() {
	if(document.body.scrollTop > 0.1 || document.documentElement.scrollTop > 0.1) {
        document.getElementsByTagName("ul")[1].style.display = "none";
        document.getElementById("compte").style.display = "none";
		document.getElementsByClassName("boutton-menu")[0].style.display = "block";
	} else {
        document.getElementsByTagName("ul")[1].style.display = "block";
        document.getElementById("compte").style.display = "list-item";
		document.getElementsByClassName("boutton-menu")[0].style.display = "none";
	}
}

function displayMenu() {
	document.getElementById("menu").classList.toggle("menu");
}

var searchbutton = document.getElementsByClassName("searchbar")[0];
var searchpage = document.getElementById('search_page');
searchbutton.addEventListener("click", function(){
    fetch("/quizmaths/searchpage.php")
        .then( r => r.text() )
        .then( t => searchpage.innerHTML += t);
    searchbutton.style.display = "none";
    document.getElementsByTagName("main")[0].style.display = "none";
})