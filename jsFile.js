// Loading
// const wheel = document.querySelector('.wheel');

// // Start the animation
// wheel.style.animationPlayState = 'running';

// // Stop the animation
// // wheel.style.animationPlayState = 'paused';

// // Change speed (e.g., double the speed)
// wheel.style.animationDuration = '2s';


// FAQ Question Home page
   // Sélectionne tous les éléments avec la classe faq-question
   const questions = document.querySelectorAll('.faq-question');

   questions.forEach(question => {
       question.addEventListener('click', () => {
           // Sélectionne la réponse associée à cette question
           const answer = question.nextElementSibling;

           // Alterne l'affichage de la réponse (show/hide)
           if (answer.style.display === 'block') {
               answer.style.display = 'none';
           } else {
               answer.style.display = 'block';
           }
       });
   });






let menphone = document.querySelector('.menuphone');

function closemenu() {
   if ( menphone.style.display == "flex") {
      menphone.style.display = "none"
      document.body.style.overflow = 'auto'; // or 'initial'
      document.querySelector(".Homeinputs").style = "z-index:2"


   }
}
 function afficheMenuPhone() {
    if ( menphone.style.display == "none" || menphone.style.display == "" ) {
         menphone.style.display = "flex"
         document.body.style.overflow = 'hidden';
         document.querySelector(".Homeinputs").style = "z-index:0"

    }
 }


// scroll header
    // document.addEventListener('scroll', function() {
    //    const header = document.querySelector('.header');
    //    if (window.scrollY > 50) { // Adjust the scroll position threshold as needed
    //        header.classList.add('blurred');
    //    } else {
    //        header.classList.remove('blurred');
    //    }
    // });

//searchbar
const LieuPrisenEnCharge = document.querySelector('.LieuPrisenEnCharge');
const DatePrisencharge = document.querySelector('.DatePrisencharge');
const DateRestitution = document.querySelector('.DateRestitution');
const HeurePriseencharge = document.querySelector(".HeurePriseencharge")
const LieuRestitution = document.querySelector(".LieuRestitution")

const inputField1 = LieuPrisenEnCharge.querySelector('input');
const inputField2 = DatePrisencharge.querySelector('input');
const inputField3 = DateRestitution.querySelector('input');
const inputField4 = HeurePriseencharge.querySelector('input');
const inputField5 = LieuRestitution.querySelector('input');
const mediaQuery = window.matchMedia("(max-width: 468px)");

LieuPrisenEnCharge.addEventListener('click', function() {
    inputField1.focus();
});
DatePrisencharge.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField2.focus();
    }else{
        inputField2.showPicker();
    }
});
DateRestitution.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField3.focus();
    }else{
        inputField3.showPicker();
    }
});
HeurePriseencharge.addEventListener('click', function() {
    if(mediaQuery.matches){
        inputField4.focus();
    }else{
        inputField4.showPicker();
    }
});
LieuRestitution.addEventListener('click', function() {
    inputField5.focus();
});

let date1
inputField2.addEventListener("change",function(){
    date1 = inputField2.value;
    console.log(date1);
    DatePrisencharge.classList.remove("inputError")

})
inputField3.addEventListener("change",function(){
    if(!date1){
        // alert("Veuillez choisir une date de prise en charge")
        inputField3.value = ''
        DatePrisencharge.classList.add("inputError")
    }
})

function setMinEndDate() {
    // Get the value of the start date
    // const startDate = document.getElementById('startDate').value;
    let startDate = inputField2.value
    if (startDate) {
        // Create a new Date object from the start date
        const start = new Date(startDate);
        
        // Add 4 days to the start date
        start.setDate(start.getDate() + 4);

        // Format the new date to YYYY-MM-DD (required format for input type="date")
        const minEndDate = start.toISOString().split('T')[0];
        
        // Set the min attribute of the end date input
        inputField3.setAttribute('min', minEndDate);
    }
}
// function search(){
// if(inputField1.value == ""){
//         LieuPrisenEnCharge.classList.add("inputError");
//     }elseif(inputField2.value == ""){
//         LieuPrisenEnCharge.classList.add("inputError");

//     }elseif(inputField3.value == ""){
//         LieuPrisenEnCharge.classList.add("inputError");

//     }elseif(inputField4.value == ""){
//         LieuPrisenEnCharge.classList.add("inputError");

//     }elseif(inputField5.value == ""){
//         LieuPrisenEnCharge.classList.add("inputError");
//     }else{
//         alert("Recherche effectuée avec succès")
//     }
// }

