//focus input on any div click
let DivContainer = document.querySelectorAll(".Input")
DivContainer.forEach((div) => {
    div.addEventListener("click", () => {
        // focus the input inside this div if they are date or time input also focus
        let input = div.querySelector("input");
        if (input) {
            input.focus();
            if (input.type === "date" || input.type === "time") {
                input.showPicker()                    
            }
        }

    });
});
