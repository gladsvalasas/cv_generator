export default class Preloader {
     static idName = "PRELOADER_MAIN";
     #loaderCode = `
            <span class="icon is-large">
                <i class="fas fa-circle-notch fa-spin fa-3x"></i>
            </span>
    `;

    #isLoad = false;

    render(append)
    {
        if (!this.#isLoad) {
            let tmp = document.createElement("div");
            tmp.setAttribute("id", Preloader.idName)
            tmp.style.display = "flex"
            tmp.style.justifyContent = "center"
            tmp.style.padding = "15px"
            tmp.innerHTML = this.#loaderCode

            document.querySelector(append)
                .appendChild(tmp)
            this.#isLoad = true;
        }
    }

    dispatch()
    {
        if (this.#isLoad) {
            document.querySelector("#PRELOADER_MAIN")
                .remove()
            this.#isLoad = false;
        }
    }
}
