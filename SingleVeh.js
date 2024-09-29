// Filtre Input focus finma werkti f div
const parentDiv1 = document.querySelector('.LieuPrisenEnCharge');
const parentDiv2 = document.querySelector('.DatePrisencharge');
const parentDiv3 = document.querySelector('.DateRestitution');

const inputField1 = parentDiv1.querySelector('input');
const inputField2 = parentDiv2.querySelector('input');
const inputField3 = parentDiv3.querySelector('input');

parentDiv1.addEventListener('click', function() {
    inputField1.focus();
});
parentDiv2.addEventListener('click', function() {
    inputField2.showPicker();
});
parentDiv3.addEventListener('click', function() {
    inputField3.showPicker();
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

