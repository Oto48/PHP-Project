const form = document.getElementById('form');
const sku = document.getElementById('sku');
const name = document.getElementById('name');
const price = document.getElementById('price');
const type = document.getElementById('productType');
const attribute = document.getElementById('attribute')


type.addEventListener("change", function(){
    if(this.value === "DVD"){
        attribute.innerHTML = (`
        <p>Please, provide Size in MB</p>
        <div class="input-control">
         <label for="size">Size</label>
         <input type="number" name="size" id="size" step="0.1" min="0">
         <div class="error"></div>
        </div>
       `);
    }
    if(this.value === 'Book'){
        attribute.innerHTML = (`
        <p>Please, provide Weight in KG</p>
        <div class="input-control">
         <label for="weight">Weight</label>
         <input type="number" name="weight" id="weight" step="0.1" min="0">
         <div class="error"></div>
        </div>
       `);
    }
    if(this.value === 'Furniture'){
        attribute.innerHTML = (`
        <p>Please, provide Height Width and Length</p>
        <div class="input-control">
         <label for="height">Height</label>
         <input type="number" name="height" id="height" step="0.1" min="0">
         <div class="error"></div>
        </div>

        <div class="input-control">
         <label for="width">Width</label>
         <input type="number" name="width" id="width" step="0.1" min="0">
         <div class="error"></div>
        </div>

        <div class="input-control">
         <label for="length">Length</label>
         <input type="number" name="length" id="length" step="0.1" min="0">
         <div class="error"></div>
        </div>
       `);
    }
});


const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {

    let valid = true;

    const checkValidation = input => {
        if (typeof(input) != 'undefined' && input != null){
            const inputValue = input.value.trim();
            if(inputValue === ''){
                valid = false;
                setError(input, 'Please, submit required data');
            }else{
                setSuccess(input);
            }
        }
    }

    const isValidData = (input, regex) => {
        const re = regex;
        if(input.value !== "" && !re.test(String(input.value).toLowerCase())){
            valid = false;
            setError(input, 'Please, provide the data of indicated type');
        }
    }


    checkValidation(sku);
    checkValidation(price);
    checkValidation(type);
    checkValidation(name);
    checkValidation(document.getElementById("size"));
    checkValidation(document.getElementById("weight"));
    checkValidation(document.getElementById("height"));
    checkValidation(document.getElementById("width"));
    checkValidation(document.getElementById("length"));

    // input contains only letters numbers and dash. cannot start with dash.
    isValidData(sku, (/^[A-Za-z0-9]+(-[A-Za-z0-9]+)*$/))
    // input contains only letters numbers and dash
    isValidData(name, (/^[0-9A-Za-z\s\-]+$/))

    if(!valid){
        return false;
    }

};