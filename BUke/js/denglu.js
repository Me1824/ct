$(function(){


	var lis=document.getElementById("u1").getElementsByTagName('li');
    var divs=document.getElementById("tab").getElementsByTagName('div');
    // alert(1);
    	for(var i=0;i<lis.length;i++)
    	{
    		lis[i].id=i;
    		lis[i].onclick=function(){
    			for(var j=0;j<lis.length;j++)
    				{
    					lis[j].className="";
    					divs[j].style.display="none";
    				}
    		this.className="selected";
    		divs[this.id].style.display="block";
    			}
    	}
});