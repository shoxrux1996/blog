function handler(value){
    var type_option = document.getElementById('subType');
    var l=type_option.length;           
    for(var i=0;i<l;i++){
        type_option.remove(0);
        }   

    for(index in subtypes) {
        if(parents[index]==value){
            var option = document.createElement("option");
            option.text = subtypes[index];
            option.value = index;
            type_option.add(option);
        }
    }
}
