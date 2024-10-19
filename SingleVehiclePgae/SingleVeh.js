// const Filter2 = document.querySelector(".Filter2")
// Filter2.addEventListener("click",function(e){
//     console.log(e.target);
// })

// Filtre Input focus finma werkti f div

let sec1LV = document.querySelector(".sec1LV")

if(sec1LV){
const LieuPrisenEnCharge = document.querySelector('.LieuPrisenEnCharge');
const DatePrisencharge = document.querySelector('.DatePrisencharge');
const DateRestitution = document.querySelector('.DateRestitution');
const HeurePriseencharge = document.querySelector(".HeurePriseencharge")
const HeureRestitution = document.querySelector(".HeureRestitution")

const inputField1 = LieuPrisenEnCharge.querySelector('input');
const inputField2 = DatePrisencharge.querySelector('input');
const inputField3 = DateRestitution.querySelector('input');
const inputField4 = HeurePriseencharge.querySelector('input');
const inputField5 = HeureRestitution.querySelector('input');
const mediaQuery = window.matchMedia("(max-width: 468px)");

LieuPrisenEnCharge.addEventListener('click', function() {
    inputField1.focus();
});
DatePrisencharge.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField2.focus();
        console.log("Using focus on mobile");

    }else{
        inputField2.showPicker();
    }
});
DateRestitution.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField3.focus();
        console.log("Using focus on mobile");

    }else{
        inputField3.showPicker();
    }
});
HeurePriseencharge.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField4.focus();
        console.log("Using focus on mobile");

    }else{
        inputField4.showPicker();
    }
});
HeureRestitution.addEventListener('click', function() {
    inputField5.showPicker();
});

// Button Modifier f  Filter
const ModifierFiltre = document.querySelector(".BtnModifier")
const oldSearchBar = document.querySelector(".divCordoneLV")
const NewSearchBar = document.querySelector(".divCordoneLV2")
const RemoveModifierFilter = document.querySelector(".rmvModifierFilt")

ModifierFiltre.addEventListener('click', function() {
    oldSearchBar.style.display = "none"
    NewSearchBar.style.display = "flex"
})

RemoveModifierFilter.addEventListener('click', function() {
    oldSearchBar.style.display = "flex"
    NewSearchBar.style.display = "none"
})
}


// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        
  
        form.classList.add('was-validated')
      }, false)
    })
  })()

  let Parcours = document.querySelector(".Parcours")

  if(Parcours){
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('DateDepart').setAttribute('min', today);
  }

  function setMinEndDate() {
    const DatePrisencharge = document.querySelector('.DatePrisencharge');
    const DateRestitution = document.querySelector('.DateRestitution');

    let startDate = DatePrisencharge.value
    if (startDate) {
        const start = new Date(startDate);        
        start.setDate(start.getDate() + 4);
        const minEndDate = start.toISOString().split('T')[0];
        DateRestitution.setAttribute('min', minEndDate);
        if (DateRestitution.value < startDate) {
            DateRestitution.value = '';
        }
    }

}