/*
=============================================================================================
==========================================SCRIPT==========================================
=============================================================================================
*/
function checker(){
  var checkbox = document.querySelector("input[name=nightmodecheckbox]");
  //Cookie
  let theme="light";
  checkbox.addEventListener('change', function() {
    if(checkbox.checked){
      theme="dark";
      setNightMode();
    }else{
      theme="light";
      unsetNightMode();
  }
  var cookies = document.cookie;
  if(cookies.includes("theme")==true){
    document.cookie="theme="+theme+" ; path=/";
  }else{
    document.cookie="theme="+theme+" ; path=/";
  }
  })
}


function setNightMode(){
  //Body
  document.body.classList.add('dark-theme');
  //Sliders (Jade, Omaima, Kevin)
  var x = document.getElementsByClassName("block");
  for(i=0; i < x.length; i++) {
    x[i].classList.add("dark-theme");
  }
  //Header
  var y = document.getElementsByTagName("header");
  y[0].classList.add("dark-theme");
  //H1
  var z = document.getElementsByTagName("h1");
  for(i=0; i < z.length; i++) {
    z[i].classList.add("dark-theme");
  }
  //A
  var s = document.getElementsByTagName("a");
  for(i=0; i < s.length; i++) {
    s[i].classList.add("dark-theme");
}
}


function unsetNightMode(){
  //Body
  document.body.classList.remove('dark-theme');
  //Sliders (Jade, Omaima, Kevin)
  var x = document.getElementsByClassName("block");
  for(i=0; i < x.length; i++) {
    x[i].classList.remove("dark-theme");
  }
  //Header
  var y = document.getElementsByTagName("header");
  y[0].classList.remove("dark-theme");
  //H1
  var z = document.getElementsByTagName("h1");
  for(i=0; i < z.length; i++) {
    z[i].classList.remove("dark-theme");
  }
  //A
  var s = document.getElementsByTagName("a");
  for(i=0; i < s.length; i++) {
    s[i].classList.remove("dark-theme");
  }
}