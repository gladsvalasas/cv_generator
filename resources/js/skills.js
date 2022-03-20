
try {
    window.addEventListener("DOMContentLoaded",() => {

        [].forEach.call(document.querySelectorAll(".range-main"), (elem)=>{
            /*new RollCounterRange("#"+elem.getAttribute("id"));*/
        })

    });

} catch (e) {
    console.log(e)
}
