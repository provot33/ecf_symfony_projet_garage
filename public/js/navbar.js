function setActive() {
    linkObj = document.getElementById('navbarSupportedContent');
    linkObj = linkObj.getElementsByTagName('a');
    for(i=0;i<linkObj.length;i++) { 
      if(document.location.href.indexOf(linkObj[i].href)>=0) {
        linkObj[i].classList.add("active");
      } 
    }
  }
  
  window.onload = setActive;
