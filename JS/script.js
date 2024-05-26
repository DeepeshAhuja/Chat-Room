






// ADD Messages to database
window.onkeydown=(e)=>{
    if(e.key=="Enter"){
        update()
    }
}
function update(){
    let msg = input_msg.value;
    input_msg.value = "";
    fetch(`addMsg.php?msg=${msg}`).then(
        r=>{
            if(r.ok){
                return r.text();
            }
        }
    ).then(
        d=>{
            console.log("msg has been added")
        }
    )
}