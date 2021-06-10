var insession = false;

function convertDate(currentdate)
{
    var datetime = "";
    datetime += currentdate.getFullYear();
    datetime += "-";
    if (currentdate.getMonth()+1 < 10)
    {
	datetime += "0";
    }
    datetime +=  currentdate.getMonth() + 1;
    datetime += "-";
    if (currentdate.getDate() < 10)
    {
	datetime += "0";
    }
    datetime += currentdate.getDate();
    datetime += " ";

    datetime += currentdate.getHours();
    datetime += ":";
    if (currentdate.getMinutes() < 10)
    {
	datetime += "0";
    }
    datetime += currentdate.getMinutes();
    datetime += ":";
    if (currentdate.getSeconds() < 10)
    {
	datetime += "0";
    }
    datetime += currentdate.getSeconds();

    return datetime;
}

function startSession()
{
    var currentdate = new Date(); 

    document.getElementById("starttime").innerHTML = convertDate(currentdate);
    document.getElementById("endtime").innerHTML = "";
    insession = true;
};

function endSession()
{
    if (insession == false)
    {
	alert("You are currently not in a session");
	return;
    }
    var currentdate = new Date();
    document.getElementById("endtime").innerHTML = convertDate(currentdate);
    insession = false;
}