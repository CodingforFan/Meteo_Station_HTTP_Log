function myFunction(variable) {
    var list = document.getElementsByName("sloupce");
    for(i = 0; i < list.length; i++){
	  var h = list[i].getAttribute("value");
    console.log(h);
    list[i].style.maxHeight = "400px";
	  list[i].style.height = h+"px";
    }
}