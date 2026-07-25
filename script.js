const slides = [

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957340/image1_aefnp9.jpg",
title:"वेळेत निवारण",
text:"आपल्या सर्व समस्यांचे निवारण ठराविक वेळेत केले जाईल."
},

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957341/image7_kwhkgm.jpg",
title:"स्वच्छता अभियान",
text:"स्वच्छ शहर, सुंदर शहर हेच आमचे ध्येय."
},

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957340/image3_iccewo.jpg",
title:"पाणी पुरवठा",
text:"नागरिकांना नियमित व सुरक्षित पाणी पुरवठा."
},

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957341/image4_srvv92.png",
title:"वृक्षारोपण",
text:"हरित चिखलीसाठी वृक्षारोपण अभियान."
},

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957341/image5_sv4mjs.jpg",
title:"रस्ता विकास",
text:"उत्तम रस्ते, उत्तम सुविधा."
},

{
image:"https://res.cloudinary.com/m6uaa6eo/image/upload/v1784957341/image6_o3ueg5.jpg",
title:"नागरिक सेवा",
text:"पारदर्शक व जलद नागरिक सेवा."
}

];

let index = 0;

const card = document.querySelector(".slider-card");
const title = document.getElementById("slideTitle");
const text = document.getElementById("slideText");

// First slide
card.style.backgroundImage = `url('${slides[0].image}')`;

setInterval(() => {

    index = (index + 1) % slides.length;

    card.style.backgroundImage = `url('${slides[index].image}')`;

    title.innerText = slides[index].title;

    text.innerText = slides[index].text;

},5000);