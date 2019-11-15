$(document).ready(function(){
var counter = 2;
$("#addButton").click(function()
{
if(counter>3)
{
document.getElementById("recomend").innerHTML="Only 3 entries are made!!!";
return false;
}
var newTextBoxDiv=$(document.createElement('div')).attr("id",'TextBoxDiv'+counter);
newTextBoxDiv.after().html('<label>Entry '+counter+':</label>'+'<input type="text" name="textbox'+counter+'" id="textbox'+counter+'" class="form-control" required/>');
newTextBoxDiv.appendTo("#TextBoxesGroup");
counter++;
});
$("#removeButton").click(function(){
if(counter==1){
document.getElementById("recomend").innerHTML="Atleast 1 exam should be attended";
return false;
}
counter--;
$("#TextBoxDiv"+counter).remove();
});
$("#get").click(function(){
var msg = new Array(4);
var sum = 0;
var mx=document.getElementById("target").value;
var max = mx*15;
for(i=1;i<counter;i++)
{
msg[i]=$('#textbox'+i).val();
if(msg[i]<80){
msg[i]=((parseInt(msg[i])+20)*.9)+10;
max=max-msg[i];
}
else
{
msg[i]=((100)*.9)+10;
max=max-msg[i];
}
}
sum = counter;
if(counter==2)
{

max=((max-10)/.9)-20;
max=max/2;
max=Math.round(max);
}
if(counter==3)
{
sum-=2;
max=((max-10)/.9)-20;
max=Math.round(max);
}
if(counter==4&&max<0)
document.getElementById("recomend").innerHTML="Target+ achieved!!!";
else if(max>=0&&counter<4)
{
document.getElementById("recomend").innerHTML="Get equal to or above "+max+" in next "+sum+" exam(s) to reach target";
if((counter==3)&&(max<50))
document.getElementById("recomend").innerHTML="A pass mark can help you mantain your internals!!!";
}
else if((counter==3)&&(max<0||max<50))
document.getElementById("recomend").innerHTML="YOu have missed your target";
else 
document.getElementById("recomend").innerHTML="Target cannot be reached!!!";
});
});
