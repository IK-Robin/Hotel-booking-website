const site_address = document.getElementById('site_address');
const site_title = document.getElementById('site_title');
const general_from = document.getElementById('genereal_from');
console.log(site_title);
const site_address_inp = document.getElementById('site_address_inp');
const site_title_inp = document.getElementById('site_title_inp');
const general_close = document.getElementById('general_close');
const generel_submit = document.getElementById('generel_submit');
const shoutdoWn = document.getElementById('shoutdoWn');
// Define the XHR object globally
let xhr;
let data,contactUs;
// Define booking_get_xhr function globally
function booking_get_xhr(url) {
    xhr = new XMLHttpRequest();
    xhr.open('POST', './ajax/setting.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
}

general_close.addEventListener('click', (ev) => {
    site_address_inp.value = data.site_address;
    site_title_inp.value = data.site_name;
    alerts('error', 'No Change Made');
});

function get_general_data() {
    booking_get_xhr();
    
    xhr.send('getgenerel');
    xhr.onload = function() {
        data = JSON.parse(this.responseText);

        site_address.innerText = data.site_address;
        site_title.innerText = data.site_name;
        site_address_inp.value = data.site_address;
        site_title_inp.value = data.site_name;
 // uncheck the sutdown 

          
        if(data.site_shoutdown ==0){
            shoutdoWn.value = 0;
            shoutdoWn.checked =false;
           
        }
        else{
            shoutdoWn.value = 1;
            shoutdoWn.checked =true;
        }
    }
}
// update the data 

generel_submit.addEventListener('click',()=>{

general_data_update(site_title_inp.value,site_address_inp.value
)

get_general_data();
});

function general_data_update(site_title, site_address){
booking_get_xhr();
xhr.send('stie_title='+site_title+'&site_address='+site_address+'&generel_submit');

xhr.onload = function (){
    if (this.responseText == 1) {
         alerts('success', 'Data update Successfull');
         get_general_data();
    }else{
        alerts('error', 'No Change Made');
    }
}





}


function shoutdoWn_mode (){
    booking_get_xhr();
    xhr.send('shoutdown=' + shoutdoWn.value );
    xhr.onload = function (){
        get_general_data();
        console.log(this.responseText);
        if (this.responseText == 1 && data.site_shoutdown== 1) {
            
            alerts('error', 'Site is open');
            
        }else{
            alerts('success', 'Site is shoutdown');
        }
       
    }
}

shoutdoWn.addEventListener("change",(ev) =>{
    shoutdoWn_mode();
});



// add contact us js 

const contactId = ['address','phone_no','email','facebook','twitter','instragram','linkdin'];

const iframe = document.getElementById('google_map');
// const iframeInp = document.getElementById( "google_map");

const contact_from = document.getElementById('contact_from');


let c_input =[
    "c_address",
    "c_phone",
    "c_email",
    "c_facebook",
    "c_twitter",
    "c_instragram",
    "c_link",
    "google_map_inp"
  ];

function get_contact_us_data(){
    booking_get_xhr();
    xhr.send('get_contact_us_data');
    xhr.onload = function (){
        contactUs = JSON.parse(this.responseText);
       
       console.log(contactUs);
        for (let i = 0; i < contactId.length; i++) {
            document.getElementById(contactId[i]).innerText = contactUs[contactId[i]];
        }

       
        
        c_input.forEach((c_inputs,i) =>{
            const contactInp = document.getElementById(c_inputs);
            let inpObjvalue = Object.values(contactUs);


            contactInp.value = inpObjvalue[i+1];
           
        });

        iframe.src = contactUs.ifram;
      
    }
}

contact_from.addEventListener("submit",ev =>{
    ev.preventDefault();
   

    contactInp_update();
});


function contactInp_update (){
    const index = ['address','phone_no','email','facebook','twitter','instragram','linkdin','google_map'];
    booking_get_xhr();
    let dataString = "";

    for(i=0; i<index.length; i++){
       dataString += index[i] + "=" + document.getElementById(c_input[i]).value +"&";
    }
  dataString+= "contact_upd";

xhr.onload =function(){
   if(this.responseText ==1){
    alerts('success',"data updated");
    get_contact_us_data();
   }else{
    alerts("error","No change made");
   }
}

  xhr.send(dataString);
}




window.addEventListener('load',() =>{
    get_contact_us_data();
    get_general_data();
});
