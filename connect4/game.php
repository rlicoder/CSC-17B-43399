<?php

session_start();
require_once('ai.php');
?>
<html lang="en-US">

<head>
    <meta charset="utf-8"/>
    <link href="boardstyle.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="mvc.js"></script>
    <title>connect 4</title>
</head>

<body>
    <div id="gameArea">
        <h2 id="msgArea">&nbsp;</h2>
        <table id="board"></table>
        <input type="button" onclick="window.location.reload();" value="Restart Game" />
    </div>
    <form id="ninja" method="post" style="display:none;">
	<input type="hidden" id="moves" name="moves" required/>
    </form>
	<input type="button" value="execute AI!" onclick="go()"/>
    
    <script>
        //Initialize on load
        window.onload = init;
	
	function go () {
	    document.getElementById("moves").value = controller.getMoves();
	    document.getElementById("ninja").submit();
	}
        
        //Functions
        function init() {
            //Declare and initialize variables
            var row = model.rows, col = model.cols;//Number of rows and columns
            var board = "<caption>Connect 4</caption>";//String for game board
            
            //Build table 
            board +="<tbody>";//Start table body
            for(var i = 0; i < row; ++i) {//For each row in board
                board += "<tr>";//Start each row
                for(var j = 0; j < col; ++j) {//For each col in each row
                    //Construct each tiles id
                    var elemId = i.toString() + j.toString();
                    
                    //Create each game tile as td
                    board += "<td id='" + elemId + "'></td>"
                }
                board += "</tr>";//End of row
            }
            board += "</tbody>";//End table body
            
            //Set board on page
            document.getElementById("board").innerHTML = board;
            
            //Add event listeners for each game tile
            for(var i = 0; i < row; ++i) {
                for(var j = 0; j < col; ++j) {
                    //Construct each tiles id
                    var elemId = i.toString() + j.toString();
                    var elem = document.getElementById(elemId);
                    elem.addEventListener("click", function(){
			if (controller.handleClick(this))
			{
			    var cur = controller.getMoves();
			    
			}
		    });
                }
            }
            //Set initial message
            view.setMsg("Your Turn");
        }
    </script>
    
</body>

</html>