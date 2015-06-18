var check = {
    elementsMassive: []
    };
check.start = function(){
        //write elements to array
        for(var i = 0; i < document.register.getElementsByTagName("input").length-1; i++){
            this.elementsMassive.push(document.register.getElementsByTagName("input").item(i));
        }
    //check fields on numbers
    check.allLetter();
    //check fields on spaces
    check.space();
    //check passwords
    check.password();

};
check.allLetter = function(){
    var letters = /^[A-Za-z]+$/;
    for(var i = 0; i < 3; i++){
        if(!this.elementsMassive[i].value.match(letters)){
            alert("В полях фамилия, имя, отчество не должно быть цифр!");
            document.register.Complete.value = "FALSE";
            break;
        }
    }
};
check.space = function(){
    var index = 0;
    for(index in this.elementsMassive){
        this.elementsMassive[index].value = this.elementsMassive[index].value.replace(/^\s*/, '').replace(/\s*$/, '');
    }
};
check.password = function(){
  if(this.elementsMassive[11].value != this.elementsMassive[12].value){
        alert("Пароли не совпадают!");
      document.register.Complete.value = "FALSE";
  }
};