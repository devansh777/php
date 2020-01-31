function hideotherinfo()
{
    x=document.getElementById('other');
    x.style.display="none";
}
function chkaddtional()
{
    x=document.getElementById('other');
    if(x.style.display=="none")
    {
        x.style.display="block";
    }
    else
    {
        x.style.display="none";
    }

}
