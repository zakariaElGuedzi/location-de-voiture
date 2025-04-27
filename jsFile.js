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

   (document.querySelectorAll('.faq-question')).forEach(question => {
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







function closemenu() {
   if ( (document.querySelector('.menuphone')).style.display == "flex") {
      (document.querySelector('.menuphone')).style.display = "none"
      document.body.style.overflow = 'auto'; // or 'initial'
      document.querySelector(".Homeinputs").style = "z-index:2"


   }
}
 function afficheMenuPhone() {
    if ( (document.querySelector('.menuphone')).style.display == "none" || (document.querySelector('.menuphone')).style.display == "" ) {
         (document.querySelector('.menuphone')).style.display = "flex"
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
const { inputField2, inputField3 } = newFunction();

function newFunction() {
    const LieuPrisenEnCharge = document.querySelector('.LieuPrisenEnCharge');
    const DatePrisencharge = document.querySelector('.DatePrisencharge');
    const DateRestitution = document.querySelector('.DateRestitution');
    const HeurePriseencharge = document.querySelector(".HeurePriseencharge");
    const LieuRestitution = document.querySelector(".LieuRestitution");

    const inputField1 = LieuPrisenEnCharge.querySelector('input');
    const inputField2 = DatePrisencharge.querySelector('input');
    const inputField3 = DateRestitution.querySelector('input');
    const inputField4 = HeurePriseencharge.querySelector('input');
    const inputField5 = LieuRestitution.querySelector('input');
    const mediaQuery = window.matchMedia("(max-width: 468px)");

    LieuPrisenEnCharge.addEventListener('click', function () {
        inputField1.focus();
    });
    DatePrisencharge.addEventListener('click', function () {
        if (mediaQuery.matches) {
            inputField2.focus();
            console.log("Using focus on mobile");

        } else {
            inputField2.showPicker();
        }
    });
    DateRestitution.addEventListener('click', function () {
        if (mediaQuery.matches) {
            inputField3.focus();
            console.log("Using focus on mobile");

        } else {
            inputField3.showPicker();
        }
    });
    HeurePriseencharge.addEventListener('click', function () {
        if (mediaQuery.matches) {
            inputField4.focus();
            console.log("Using focus on mobile");

        } else {
            inputField4.showPicker();
        }
    });
    LieuRestitution.addEventListener('click', function () {
        inputField5.focus();
    });

    let date1;
    inputField2.addEventListener("change", function () {
        date1 = inputField2.value;
        console.log(date1);
        DatePrisencharge.classList.remove("inputError");

    });
    inputField3.addEventListener("change", function () {
        if (!date1) {
            // alert("Veuillez choisir une date de prise en charge")
            inputField3.value = '';
            DatePrisencharge.classList.add("inputError");
        }
    });
    return { inputField2, inputField3 };
}

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

// date before today


    document.getElementById('DateDepart').setAttribute('min', new Date().toISOString().split('T')[0]);



// loader

window.addEventListener("beforeunload", function() {
    // Show the loader
document.getElementById("loader").style.visibility = "visible";
});

// Also, hide the loader after the page is fully loaded
window.addEventListener("load", function() {
document.getElementById("loader").style.visibility = "hidden";
});





//stikcy wtsp button
let toggleButtonWtsp = document.querySelector(".IconWtspShow");
let contentWtspMessagerie = document.querySelector(".contentMessagerie");
let sender = document.getElementById("sendFun");
toggleButtonWtsp.addEventListener("click",()=> {
    contentWtspMessagerie.classList.toggle("contentMessagerieflex")
})

//function send msg
sender.addEventListener("click",()=>{
    let phoneNumber = 212668455918;
    let contentMessage = document.getElementById("contentMsg").value;
    console.log(contentMessage) 
    let url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(contentMessage)}`;
    window.open(url, "_blank");

    //get time 
    const d =  new Date();
    let zoneTimeH = d.getUTCHours();
    let zoneTimeM = d.getUTCMinutes();

    let Hismsgerie = document.querySelector(".messagesHis");

    let newMsg = document.createElement("div") ;
    newMsg.classList.add("newMsgStyle")
    newMsg.innerHTML= `<p class='p-0 m-0 py-1 px-1 bg-success'>${contentMessage}</p><p class='p-0 m-0 h-100 d-flex bg-dark pb-1 text-secondary timemsgSended'>${zoneTimeH}:${zoneTimeM}</p>` ; 
    Hismsgerie.appendChild(newMsg);

})




//animation flyer Home Page
let imgFlyer = document.getElementById("imgContentFlyers");
let list = imgFlyer.classList;
let arrClassesFlyer = ["daciaLoganFlyer","tipoFlyer","tucsonFlyer","golfFlyer","jeepFlyer"];
let nextFlyImg = document.getElementById("nextFlyerVeh");
let previousFlyImg = document.getElementById("previousFlyerVeh");


nextFlyImg.addEventListener("click",() => {
  let currentIndex = arrClassesFlyer.findIndex(className => list.contains(className));
  list.remove(...arrClassesFlyer); // Remove all related classes
  list.add(arrClassesFlyer[(currentIndex + 1) % arrClassesFlyer.length]); // Add the next class
  console.log(1)
});

function chngflyer() {
    let currentIndex = arrClassesFlyer.findIndex(className => list.contains(className));
  list.remove(...arrClassesFlyer); // Remove all related classes
  list.add(arrClassesFlyer[(currentIndex + 1) % arrClassesFlyer.length]); // Add the next class
  console.log(1)
}

previousFlyImg.addEventListener("click",() => {
      let currentIndex2 = arrClassesFlyer.findIndex(className => list.contains(className));
      list.remove(...arrClassesFlyer); // Remove all related classes
      list.add(arrClassesFlyer[(currentIndex2  +2) % arrClassesFlyer.length]); // Add the next class
      console.log(2)

   }) ;

//exacute automatic
window.setInterval(chngflyer, 2500); 
