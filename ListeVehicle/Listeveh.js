// const Filter2 = document.querySelector(".Filter2")
// Filter2.addEventListener("click",function(e){
//     console.log(e.target);
// })

// Filtre Input focus finma werkti f div
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

LieuPrisenEnCharge.addEventListener('click', function() {
    inputField1.focus();
});
DatePrisencharge.addEventListener('click', function() {
    inputField2.showPicker();
});
DateRestitution.addEventListener('click', function() {
    inputField3.showPicker();
});
HeurePriseencharge.addEventListener('click', function() {
    inputField4.showPicker();
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

