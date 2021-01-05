<!DOCTYPE html>
<html>
<head>
	<title>My To Do List - JS only</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="ToDoList.css">
</head>
<body>

<div id="myDIV" class="header">
  <h2 style="margin:5px">My To Do List</h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>



<ul id="myUL">
  <li></li>
</ul>

<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

function getvalue()  // functie aangemaakt om de waarde uit het formulier uit de newElement-functie te trekken
{ return document.getElementById("myInput").value; }

// Create a new list item when clicking on the "Add" button
function newElement(given) {
  var li = document.createElement("li");
  if (!given) // javascript if not statement
  	{var inputValue = getvalue();}  // als er geen variabele is meegegeven, dan moet je het uit het formulier halen
  else {inputValue = given} // als de variabele is meegegeven kun je direct verder
  
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}

newElement("check of functie newElement aanroepen lukt.");  //check of een item toevoegen goed gaat


var startlist = [<?php include 'ToDoData.php' ?>]  //Javascript lijst met begin-waardes - wil je in een appart bestand die beschrijfbaar is. en dan als je op add drukt het item aan dat bestand toevoegen.
var li = 0;
//loop voor het aanroepen van newElement met steeds een ander item uit de lijst       
for (li = 0; li < startlist.length; li++) // loop die door de begin-waardes loopt.
	{	console.log(startlist[li]) //check of de loop goed verloopt
		newElement(startlist[li]);  
	}
</script>
<?php
$myfile = fopen("ToDoData.php", "a");
fwrite($myfile, ",\"PHP item\"");
// some code to be executed....
fclose($myfile);
?>

</body>
</html>
