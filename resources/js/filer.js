const fileInput = document.querySelector('#avatar-upload input[type=file]');
fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#avatar-upload .file-name');
        fileName.textContent = fileInput.files[0].name;
    }
}

const codeTest = document.querySelector("#invite");
const company_id = document.querySelector("#company");

codeTest.onkeypress = () => {
    if (codeTest.value.length < 6) return;
    axios.get("/api/invites/checkInvite?code="+codeTest.value+"&company_id="+company_id.value)
        .then((response)=>{
            //console.log(response);
            if (response.data.success) {
                document.querySelector("#registerButton").removeAttribute("disabled");
                document.querySelector("#company_message > strong").innerHTML = "";
                codeTest.classList.remove("is-danger");
                codeTest.classList.add("is-success");
            }
            else {
                document.querySelector("#registerButton").setAttribute("disabled", true)
                document.querySelector("#company_message > strong").innerHTML = response.data.error.message;
                codeTest.classList.remove("is-success");
                codeTest.classList.add("is-danger");

            }
        })
}
