var model = {
    rows: 6,
    cols: 7,
    curPlyr: 0,
    numTurns: 0,
    gameOver: false,
    tiles: [
        ["", "", "", "", "", "", ""],
        ["", "", "", "", "", "", ""],
        ["", "", "", "", "", "", ""],
		["", "", "", "", "", "", ""],
		["", "", "", "", "", "", ""],
		["", "", "", "", "", "", ""],
    ]
};

var view = {
    setX: function (elem) {
        var xImg = "url('x.png')";//Path to X image
        elem.style.backgroundImage = xImg;
    },
    
    setO: function (elem) {
        var oImg = "url('o.png')";//Path to O image
        elem.style.backgroundImage = oImg;
    },
    
    setMsg: function (msg) {
        document.getElementById("msgArea").innerHTML = msg;
    }
};

var controller = {
    handleClick: function (elem) {
        //Check for game over and leave if true
        if(model.gameOver){return;}
        
        //Get element id of clicked dom object
        var indices = [];//Indices for 2d array at model.tiles
        indices.push(elem.id.charAt(0));
        indices.push(elem.id.charAt(1));
		
		//console.log(indices);
		//console.log(elem);
		
		col = parseInt(indices[1]);
		
		var set = false;
		for (var i = 5; i >= 0; i--)
		{
			if (!controller.isClicked([i, col]))
			{
				set = true;
				var real_elem = document.getElementById(i.toString() + col.toString());
				//console.log([i, col]);
				//console.log(real_elem);
				controller.updateView(real_elem);
				controller.updateModel([i,col]);
				break;
			}
		}
		if (!set)
		{
			var errMsg = "This column is full!";
			view.setMsg(errMsg);
			return;
		}
		
		var val = ((model.curPlyr + 1) % 2 == 0) ? "X" : "O";
        controller.checkWin(val);
    },
    
    isClicked: function (arr) {
        return (model.tiles[arr[0]][arr[1]] === "") ? false : true;
    },
    
    checkWin: function(val) {
        var temp = model.tiles;
        var winMsg = "";
		
		for (var i = 0; i < model.rows; i++)
		{
			for (var j = 0; j < model.cols; j++)
			{
				if (model.tiles[i][j] === "" || model.tiles[i][j] === (val === "X" ? "O" : "X"))
				{
					continue;
				}
				var count = 0;
				for (var k = i, l = j; k < i+4 && l < j+4 && k < model.rows && l < model.cols; k++, l++)
				{
					if (model.tiles[k][l] === model.tiles[i][j])
					{
						count++;
					}
				}
				if (count == 4)
				{
					console.log(model.tiles[i][j] + " won via downright");
					model.gameOver = true;//Set game over
					var plyr = (((model.curPlyr + 1) % 2) + 1 == 0 ? "red" : "yellow");//Get winning player
					winMsg = "Congraulations " + plyr + " player, you Win!";//Update view message
					view.setMsg(winMsg);//Set view message
					return;
				}
				count = 0;
				for (var k = i, l = j; k > i-4 && l > j-4 && k >= 0 && l >= 0; k--, l++)
				{
					if (model.tiles[k][l] === model.tiles[i][j])
					{
						count++;
					}
				}
				if (count == 4)
				{
					console.log(model.tiles[i][j] + " won via upright");
					model.gameOver = true;//Set game over
					var plyr = (((model.curPlyr + 1) % 2) + 1 == 0 ? "red" : "yellow");//Get winning player
					winMsg = "Congraulations " + plyr + " player, you Win!";//Update view message
					view.setMsg(winMsg);//Set view message
					return;
				}
				count = 0;
				for (var k = i; k < i+4 && k < model.rows; k++)
				{
					if(model.tiles[k][j] === model.tiles[i][j])
					{
						count++;
					}
				}
				if (count == 4)
				{
					console.log(model.tiles[i][j] + " won via downup");
					model.gameOver = true;//Set game over
					var plyr = (((model.curPlyr + 1) % 2) + 1 == 0 ? "red" : "yellow");//Get winning player
					winMsg = "Congraulations " + plyr + " player, you Win!";//Update view message
					view.setMsg(winMsg);//Set view message
					return;
				}
				count = 0;
				for (var k = j; k < j+4 && k < model.cols; k++)
				{
					if (model.tiles[i][k] === model.tiles[i][j])
					{
						count++;
					}
				}
				if (count == 4)
				{
					console.log(model.tiles[i][j] + " won via right left");
					model.gameOver = true;//Set game over
					var plyr = (((model.curPlyr + 1) % 2) + 1 == 0 ? "red" : "yellow");//Get winning player
					winMsg = "Congraulations " + plyr + " player, you Win!";//Update view message
					view.setMsg(winMsg);//Set view message
					return;
				}
			}
		}
        if(model.numTurns === 42) {//If scratch and no win
            model.gameOver = true;//Set game over
            winMsg = "Draw!";//Update view message
            view.setMsg(winMsg);//Set view message
        }
		
			
        
    },
    
    updateView: function(elem) {
        var msg = "bad value";
        if(model.curPlyr == 0) {//If player 1
            view.setX(elem);    //Set X image
            msg = "Player 2's Turn";
        } else {                //Else player 2
            view.setO(elem);    //Set O image
            msg = "Player 1's Turn";
        }
        view.setMsg(msg);
    },
    
    updateModel: function(indices) {
        model.tiles[indices[0]][indices[1]] = (model.curPlyr == 0) ? "X" : "O";//Set choice in tiles
        model.curPlyr = ++model.curPlyr % 2;//Switch players to next player
        model.numTurns++;//Update number of turns taken
    }
};

