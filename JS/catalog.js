var arrItem =[]; 

var allItem = [];
allItem[0]=['<img src="../Images/cake1.jpeg" style=width:150px; height: 150px; >',"עוגת שוקולד", "₪ 150", '<button onclick="removeItem( 0)" >הסר מהסל</button>'];
allItem[1]=['<img src="../Images/cake2.jpeg" style=width:150px; height: 150px; >',"עוגת גבינה","₪ 150", '<button onclick="removeItem(1)">הסר מהסל</button>'];
allItem[2]=['<img src="../Images/cake3.jpeg" style=width:150px; height: 150px; >',"עוגת פירות יער","₪ 200", '<button onclick="removeItem(2)">הסר מהסל</button>'];
allItem[3]=['<img src="../Images/cake4.jpeg" style=width:150px; height: 150px; >',"עוגת טירמיסו","₪ 200", '<button onclick="removeItem(3)">הסר מהסל</button>'];
allItem[4]=['<img src="../Images/dessert1.jpeg" style=width:150px; height: 150px; >',"קינוח כוסות לוטוס","₪ 100", '<button onclick="removeItem(4)">הסר מהסל</button>'];
allItem[5]=['<img src="../Images/dessert2.jpeg" style=width:150px; height: 150px; >',"פבלובה","₪ 150", '<button onclick="removeItem(5)">הסר מהסל</button>'];
allItem[6]=['<img src="../Images/dessert3.jpeg" style=width:150px; height: 150px; >',"קינוח כוסות תותים","₪ 100", '<button onclick="removeItem(6)">הסר מהסל</button>'];
allItem[7]=['<img src="../Images/dessert4.jpeg" style=width:150px; height: 150px; >',"מקרונים","₪ 150", '<button onclick="removeItem(7)">הסר מהסל</button>'];
allItem[8]=['<img src="../Images/bread1.jpeg" style=width:150px; height: 150px; >',"לחם שיפון","₪ 50", '<button onclick="removeItem(8)">הסר מהסל</button>'];
allItem[9]=['<img src="../Images/bread2.jpeg" style=width:150px; height: 150px; >',"לחם מחמצת","₪ 50", '<button onclick="removeItem(9)">הסר מהסל</button>'];
allItem[10]=['<img src="../Images/bread3.jpeg" style=width:150px; height: 150px; >',"לחם אגוזים","₪ 50", '<button onclick="removeItem(10)">הסר מהסל</button>'];
allItem[11]=['<img src="../Images/bread4.jpeg" style=width:150px; height: 150px; >',"לחם כוסמין","₪ 50", '<button onclick="removeItem(11)">הסר מהסל</button>'];


  
 function addItem(index){
	 arrItem.push(allItem[index]);
 }
  
 function addToCart(){
	window.alert("המוצר התווסף לסל הקניות ");
 }
  
 function removeItem(index){
	arrItem.pop(arrItem[index]);
 } 
  
function off()
{
	document.getElementById("overlayf").style.display = "none";
}

//print arrItem  in the sale page
function yes() 
{
    if(arrItem.length=='0')
    {
         window.alert("טרם נבחרו מוצרים לרכישה" );
    }
    else {
    
           document.getElementById("overlayf").style.display = "block";
           window.addEventListener("click", function tableItem()
           {
  
           var  html = "<table><tr>";
   
           for (var i=0; i<arrItem.length; i++)
           	{
        		for( var j=0;j<4;j++)
            		{
	            		html+="<td>" + arrItem[i][j]+"</td>";
	            	}
        	 html += "</tr> <br> <tr>";
            }
             html += "</tr></table>";
             document.getElementById("item").innerHTML = html;
           } );
        }
}
  
function TPrice(){
	var total=0;
	for (var i=0; i<arrItem.length; i++)
	{
		var num = parseInt(arrItem[i][2].replace(/[^0-9]/g,''));
		total+=num;
	}
	document.getElementById("pcc").value = total * 0.75;
	document.getElementById("pc").value = total * 0.75;
}


 