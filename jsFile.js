// Loading
// const wheel = document.querySelector('.wheel');

// // Start the animation
// wheel.style.animationPlayState = 'running';

// // Stop the animation
// // wheel.style.animationPlayState = 'paused';

// // Change speed (e.g., double the speed)
// wheel.style.animationDuration = '2s';

let menphone = document.querySelector('.menuphone');

function closemenu() {
   if ( menphone.style.display == "flex") {
      menphone.style.display = "none"
   }
}
 function afficheMenuPhone() {
    if ( menphone.style.display == "none" || menphone.style.display == "" ) {
         menphone.style.display = "flex"
    }
 }


// first price
let sprice = document.getElementById('secondPrice');
sprice.textContent = 8000 + " Dhs";
let contnSprice = sprice.textContent;
let spricetoNumber = parseInt(contnSprice);console.log(spricetoNumber)


let fPrice = document.getElementById('firstPrice');
let contentFprice = spricetoNumber+300+" Dh";
// let tonumber = parseInt(contentFprice);
fPrice.textContent = contentFprice ;
console.log(contentFprice)



// let spriceVl = sprice.textContent+100;
fPrice.style.color = "red";













// scroll header
document.addEventListener('scroll', function() {
   const header = document.querySelector('.header');
   if (window.scrollY > 50) { // Adjust the scroll position threshold as needed
       header.classList.add('blurred');
   } else {
       header.classList.remove('blurred');
   }
});



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















// const scene = new THREE.Scene();
// const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
// const renderer = new THREE.WebGLRenderer();
// renderer.setSize(window.innerWidth, window.innerHeight);
// renderer.setClearColor(0xeeeeee); // Light gray background
// document.body.appendChild(renderer.domElement);

// // Lighting
// const light = new THREE.DirectionalLight(0xffffff, 1);
// light.position.set(5, 5, 5).normalize();
// scene.add(light);

// const ambientLight = new THREE.AmbientLight(0x404040); // Ambient light
// scene.add(ambientLight);

// // Test: Add a basic box geometry
// const geometry = new THREE.BoxGeometry();
// const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
// const cube = new THREE.Mesh(geometry, material);
// scene.add(cube);

// // Load 3D Model
// const loader = new THREE.GLTFLoader();
// loader.load('img/scene.gltf', function (gltf) {
//     console.log('Model loaded:', gltf); // Log loaded model
//     scene.add(gltf.scene);
//     gltf.scene.scale.set(1, 1, 1); // Adjust scale
//     gltf.scene.position.set(0, 0, 0); // Adjust position
// }, undefined, function (error) {
//     console.error('An error happened:', error);
// });

// // OrbitControls
// const controls = new THREE.OrbitControls(camera, renderer.domElement);

// // Camera Position
// camera.position.set(0, 1, 5);
// camera.lookAt(0, 1, 0); // Ensure camera is looking at the model

// // Animation loop
// function animate() {
//     requestAnimationFrame(animate);
//     controls.update(); // Only required if controls.enableDamping = true, or controls.autoRotate = true
//     renderer.render(scene, camera);
// }
// animate();

// // Handle resizing
// window.addEventListener('resize', () => {
//     camera.aspect = window.innerWidth / window.innerHeight;
//     camera.updateProjectionMatrix();
//     renderer.setSize(window.innerWidth, window.innerHeight);
// });


//  loader.load('img/scene.gltf', function(gltf) {
//     scene.add(gltf.scene);
//     gltf.scene.scale.set(1, 1, 1); 
//     gltf.scene.position.set(0, 0, 0);
// }, undefined, function(error) {
//     console.error(error);
// });


