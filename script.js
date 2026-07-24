const slides = [

{
image:"images/image1.png",
title:"वेळेत निवारण",
text:"आपल्या सर्व समस्यांचे निवारण ठराविक वेळेत केले जाईल."
},

{
image:"images/image7.png",
title:"स्वच्छता अभियान",
text:"स्वच्छ शहर, सुंदर शहर हेच आमचे ध्येय."
},

{
image:"images/image3.png",
title:"पाणी पुरवठा",
text:"नागरिकांना नियमित व सुरक्षित पाणी पुरवठा."
},

{
image:"images/image4.png",
title:"वृक्षारोपण",
text:"हरित चिखलीसाठी वृक्षारोपण अभियान."
},

{
image:"images/image5.png",
title:"रस्ता विकास",
text:"उत्तम रस्ते, उत्तम सुविधा."
},

{
image:"images/image6.png",
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