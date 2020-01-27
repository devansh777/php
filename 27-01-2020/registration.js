function hideotherinfo()
{
    x=document.getElementById('otherInfo');
    x.style.display="none";
}
function chkaddtional()
{
    x=document.getElementById('otherInfo');
    if(x.style.display=="none")
    {
        x.style.display="block";
    }
    else
    {
        x.style.display="none";
    }

}