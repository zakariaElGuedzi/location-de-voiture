//animation flyer Home Page
document.addEventListener("DOMContentLoaded", function() {

let imgFlyers = document.getElementById("imgContentFlyers");
let list = imgFlyers.classList;
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

previousFlyImg.addEventListener("click", () => {
    let currentIndex = arrClassesFlyer.findIndex(className => list.contains(className));
    list.remove(...arrClassesFlyer); // Remove all related classes
    list.add(arrClassesFlyer[(currentIndex - 1 + arrClassesFlyer.length) % arrClassesFlyer.length]); // Correct previous
    console.log(2);
  });

  window.setInterval(chngflyer, 2500); 
})
//exacute automatic
