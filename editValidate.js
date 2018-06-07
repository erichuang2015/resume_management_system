function validate(){
    prof=nat=add=stat=skill=exp=edu="";
    profFlag=natFlag=addFlag=statFlag=skillFlag=expFlag=eduFlag=false;
    
    prof=document.getElementById("editForm").profession.value;
    nat=document.getElementById("editForm").nationality.value;
    add=document.getElementById("editForm").presentAdd.value;
    stat=document.getElementById("editForm").statement.value;
    skill=document.getElementById("editForm").skills.value;
    exp=document.getElementById("editForm").workExp.value;
    edu=document.getElementById("editForm").education.value;
    
    profErr=document.getElementById("profErr");
    natErr=document.getElementById("natErr");
    addErr=document.getElementById("addErr");
   // addErr=document.getElementsByName("presentAdd");
    statErr=document.getElementById("statementErr");
    skillErr=document.getElementById("skillErr");
    expErr=document.getElementById("workExpErr");
    eduErr=document.getElementById("eduErr");    

    if(prof < 1){
        profErr.innerHTML="Provide Your Profession";
    }else{
        profFlag=true;
    }
    
    if(nat == ""){
        natErr.innerHTML="Provide Your nationality";
    }else{
        natFlag=true;
    }

    if(add == ""){
        addErr.setAttribute("style","color: Red");
    }else{
        addFlag=true;
    }

    if(stat == ""){
        statErr.innerHTML="Provide self Statement";
    }else{
        statFlag=true;
    }

    if(skill == ""){
        skillErr.innerHTML="Provide skill description";
    }else{
        skillFlag=true;
    }

    if(exp == ""){
        expErr.innerHTML="Provide experience description";
    }else{
        expFlag=true;
    }

    if(edu == ""){
        eduErr.innerHTML="Provide educational qualifications";
    }else{
        eduFlag=true;
    }

    if(profFlag && natFlag && addFlag && statFlag && skillFlag && expFlag && eduFlag)
    {
        return true;
    }else{
        return false;
    }
}